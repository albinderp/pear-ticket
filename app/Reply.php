<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  public $table = 'tickets_replies';
  public $timestamps = true;
  protected $fillable = ['ticketId', 'body', 'attachment'];
}
