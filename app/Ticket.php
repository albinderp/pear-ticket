<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $table = 'tickets';
    public $timestamps = true;
    protected $fillable = ['subject', 'body', 'sender', 'attachments', 'assignedTo', 'status', 'priority'];
}
