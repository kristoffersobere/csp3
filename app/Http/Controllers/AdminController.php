<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class AdminController extends Controller
{
    
    public function __construct()
    {
         $this->middleware('auth:admins');
    }

   
    public function index()
    {
    	$posts = Post::orderBy('created_at', 'desc')
    		->paginate(2);
        $users = User::all();
        return view('admin.home')->with('posts',$posts)->with('users',$users);
    }

    public function deleteUser($id)
    {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return 'deleted';
    }
}
