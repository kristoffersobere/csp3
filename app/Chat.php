<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable =[
    	'user_id','friend_id','chat'
    ];
     function user(){
    	return	$this->belongsTo('App\User');
    }

}
