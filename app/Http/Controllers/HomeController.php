<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $update = file_get_contents('https://raw.githubusercontent.com/albinderp/pearticket-update-check/master/version') > env('APP_VERSION') ? true : false;
      $data = [
        'title' => 'Dashboard Overview',
        'tickets' => Ticket::orderBy('created_at', 'DESC')->get(),
        'count' => Ticket::where('status', '<', '3')->count(),
        'update' => $update,
      ];
        return view('home', $data);
    }

    public function ticket()
    {
      return view('ticket');
    }
}
