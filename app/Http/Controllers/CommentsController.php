<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use Session;

class CommentsController extends Controller
{
	 public function __construct()
    {
        //$this->middleware('auth');

        // $this->middleware('auth');

        $this->middleware('log', ['only' => [
            'auth',
            'auth:admins',
        ]]);

        // $this->middleware('auth:admins', ['except' => [
        //     'show',
            
        // ]]);

        //    $this->middleware('auth:admins');
    }

    public function index(){
        
        return view('/');
    } 

    public function destroy($id){
        
        $del = Comment::find($id);
        $del->delete();
         return 'Done';
    }

    public function store(Request $request){
        //return $request->all();
    	$comment = new Comment();
    	$comment->content = $request->comments;
    	$comment->post_id = $request->postid;
    	$comment->user_id = Auth::user()->id;
    	$comment->save();
        return 'Done';
    	//return redirect('/');
    }
}
