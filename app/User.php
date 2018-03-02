<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    function posts(){
        return  $this->hasMany('App\Post');
    }

    function friendsOfMine(){
        return $this->belongsToMany('App\User', 'friends' ,'user_id' ,'friend_id');
    }

    function friendOf(){
        return $this->belongsToMany('App\User', 'friends' ,'friend_id' ,'user_id');
    }

    function friends(){
        return $this->friendsOfMine->merge($this->friendOf);
    }

    function chat(){
        return  $this->hasMany('App\Chat');
    }

}
