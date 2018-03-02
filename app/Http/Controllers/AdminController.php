<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        return view('admin.home')->with('posts',$posts);
    }
}
