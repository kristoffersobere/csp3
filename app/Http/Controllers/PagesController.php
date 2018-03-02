<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;

class PagesController extends Controller
{
    function wall(){
    $posts = Post::orderBy('created_at', 'desc')
    ->paginate(2);

    return view('welcome')->with('posts',$posts);
    }
    function index(){

    return redirect('login');
    }
}