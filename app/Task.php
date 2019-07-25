<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'name',
    'description',
    'start_at',
    'end_at',
    'user_id',
    'status'
  ];

  public function user () {
      return $this->belongsTo('App\User');
  }
}
