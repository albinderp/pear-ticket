<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Client;
use App\Ticket;
use App\Reply;
Use Exception;
use DB;

class Collector extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collects all e-mails from accounts provided in the smtp table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $smtp = DB::table('smtp')->get();
        $errors = array();

        foreach ($smtp as $connection)
        {

          // Try connection. Catch exceptions to output them later.
          try {
          $client = new Client([
              'host'          => $connection->host,
              'port'          => $connection->port,
              'encryption'    => $connection->encryption,
              'validate_cert' => $connection->verify,
              'username'      => $connection->username,
              'password'      => $connection->password,
              'protocol'      => 'imap'
          ]);

          $client->connect();
        } catch (Exception $e) {
          $errors[] = $e->getMessage();
        }

          // Check whether the client connected - true/false
          if ($client->isConnected())
          {
            $this->info('Connected successfully to: ' . $connection->username);
          } else {
            $this->error('Unable to connect to: ' . $connection->username);
            foreach ($errors as $key => $error)
            {
              $this->error($error);
            }
            continue;
          }

          // Retrieve all unread messages from  the INBOX folder.
          $emails = $client->getUnseenMessages($client->getFolder('INBOX'));

          foreach ($emails as $email)
          {
            // Get array of email.
            $sender = $email->getFrom();
            if(preg_match('(re:|RE:|Re:|fw:|FW:|Fw:)', $email->getSubject()))
            {
              // Check if the previous preg_match also has a ticket id.
              if(preg_match('/\[#(.*?)\]/', $email->getSubject(), $matches))
              {
                $reply = new Reply();
                $reply->ticketId = $matches[1];
                $reply->body = $email->getTextBody();
                $reply->sender = $sender[0]->mail;
                $reply->name = $sender[0]->personal;
                $reply->attachment = '0';
                $reply->save();
                continue;
              } else {
                $this->error('Unable to save message subject "' . $email->getSubject() . '" because it has no ticket id associated with it!');
                continue;
              }
            }

            if(Ticket::where('subject' , 'LIKE', '%' . $email->getSubject() . '%')->where('body', '=', $email->getTextBody())->where('sender', '=', $sender[0]->mail)->exists())
            {
              continue;
            }

            $ticketId = $this->generateTicketId();
            // Create new ticket.
            $ticket = new Ticket();
            $ticket->ticketId = $ticketId;
            $ticket->subject = $email->getSubject();
            $ticket->body = $email->getTextBody();
            $ticket->sender = $sender[0]->mail;
            $ticket->name = $sender[0]->personal;
            $ticket->attachments = '0';
            $ticket->assignedTo = '0';
            $ticket->status = '1';
            $ticket->priority = '1';
            $ticket->save();
            sleep(1);
          }
        }
    }

    public function generateTicketId()
    {
      $ticketId = mt_rand(10000, 20000);

      if($this->ticketIdExists($ticketId))
      {
        return $this->generateTicketId();
      }

      return $ticketId;
    }

    public function ticketIdExists($ticketId) {
      return Ticket::where('ticketId', '=', $ticketId)->exists();
    }
}
