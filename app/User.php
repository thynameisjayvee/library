<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books(){
      return $this->belongsToMany('App\Book');
    }

    public function roles(){
      return $this->belongsToMany('App\Role');;
    }

    public function user_id(){
      return $this->id;
    }

    public function hasRole($role){
      $roles = Auth::User()->roles;

      foreach ($roles as $user_role) {
        if($role == $user_role->id)
          return true;
      }

    }
}
