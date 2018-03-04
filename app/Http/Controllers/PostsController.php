<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;

class PostsController extends Controller
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


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Auth::user();
        $friends = Auth::user()->friends()->sortBy('name');
        $countfriends = $friends->count();

        return view('/home')->with('posts',$posts->posts)->with('friends',$friends)->with('cfriends',$countfriends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_post = new Post();
        $new_post->title = $request->title;
        $new_post->content = $request->content;
        $new_post->user_id = Auth::user()->id;
        $new_post->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.editpost')->with('post',$post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_posts = Post::find($id);
        $new_posts->title = $request->title;
        $new_posts->content = $request->content;
        $new_posts->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $delpost = Post::find($id);
        $delpost->delete();
        return 'deleted';
    }
}
