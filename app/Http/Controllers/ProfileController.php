<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Auth;
use App\User;

class ProfileController extends Controller
{
    function index(){
    $user = User::find(Auth::user()->id);
    return view('profile/index')->with('user',$user);
    }

    function update(Request $request){
   		$user = User::find(Auth::user()->id);
        $user->name = $request->first_name;

        if (Input::hasFile('profile_pic')) {
        	$file = Input::file('profile_pic');
        	$file->move(public_path(). '/uploads/', $file->getClientOriginalName());
        	$url = URL::to("/") . '/uploads/'. $file->getClientOriginalName();
        }
        $user->profile_pic = $url;
        $user->save();

        return redirect('home');
    }

    function searchUser($text){
      
        $text;

        $result  = User::where('name', 'LIKE', '%'.$text.'%')->get();

        return $result;


    }


}
