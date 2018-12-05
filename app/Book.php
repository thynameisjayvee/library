<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = [
      'title', 'author', 'synopsis', 'img_url', 'quantity',
  ];

  public function categories(){
    return $this->belongsToMany('App\Category');
  }

  public function users(){
    return $this->belongsToMany('App\User');
  }
}
