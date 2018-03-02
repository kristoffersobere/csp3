<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //return view('chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->all();
        $chat = new Chat();
        $chat->user_id = Auth::user()->id;
        $chat->friend_id = $request->friend_id;
        $chat->chat = $request->msg;
        $chat->save();
        return 'msg sent';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
  
  
 

    public function show($id)
    {   
        $friend = User::find($id);
        return view('chat.index')->with('friend', $friend);
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    } 
    public function getChat($id)
    {
        $friend = User::find($id);
        
        $chats = Chat::where(function ($query) use ($id){
            $query->where('user_id', '=' ,Auth::user()->id)->where('friend_id','=',$id);
        })->orWhere(function($query) use ($id){
            $query->where('user_id', '=', $id)->where('friend_id','=',Auth::user()->id);
        }) ->orderByRaw('updated_at - created_at')
                ->get();
          return view('chat.index')->with('friend', $friend)->with('chats',$chats);
    }
}
