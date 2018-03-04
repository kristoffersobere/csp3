@extends('layouts.chatlayout')
@section('title')
Cloud9|Chat
@endsection
@section('main_content')
<div class="container-fluid" >
<div class="menu">
            <div class="back"> <a href="{{url('/home')}}"><i class="fa fa-chevron-left"></i> <img src="{{$friend->profile_pic}}" draggable="false" style="height: 40px;width: 40px;" /></a></div>
            <div class="name">{{$friend->name}}</div>
           {{--  <div class="last">18:09</div> --}}
        </div>
    


    <ol class="chat" id="reloadchat">
      @forelse($chats as $chat)
    @if ($chat->user_id != Auth::user()->id)
    <li class="other">
        <div class="avatar"><img src="{{$friend->profile_pic}}" draggable="false" style="height: 40px;width: 40px;"/></div>
      <div class="msg">
        <strong>{{$chat->chat}}</strong>
         <p>{{$friend->name}}</p>
        <time>{{$chat->updated_at}}</time>
      </div>
    </li>
    @else
    <li class="self">
        <div class="avatar"><img src="{{Auth::user()->profile_pic}}" draggable="false" style="height: 40px;width: 40px;"/></div>
      <div class="msg">
        <strong>{{$chat->chat}}</strong>
         <p>{{Auth::user()->name}}</p>
        <time>{{$chat->updated_at}}</time>
      </div>
    </li>
    @endif
   {{--  <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
        <p>Qué contexto de Góngora? <emoji class="suffocated"/></p>
        <time>20:18</time>
      </div>
    </li>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <p>El que mandó Marialu</p>
        <p>Es para mañana...</p>
        <time>20:18</time>
      </div>
    </li>
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
        <p><emoji class="scream"/></p>
        <p>Pásamelo! <emoji class="please"/></p>
        <time>20:18</time>
      </div>
    </li>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <img src="https://i.imgur.com/QAROObc.jpg" draggable="false"/>
        <time>20:19</time>
      </div>
    </li>
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
        <p>Gracias! <emoji class="hearth_blue"/></p>
        <time>20:20</time>
      </div>
    </li>
        <div class="day">Hoy</div>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <p>Te apetece jugar a Minecraft?</p>
        <time>18:03</time>
      </div>
    </li>
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
        <p>Venga va, hace ya mucho que no juego...</p>
        <time>18:07</time>
      </div>
    </li>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <p>Ehh, me crashea el Launcher... <emoji class="cryalot"/></p>
        <time>18:08</time>
      </div>
    </li>
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
        <p><emoji class="lmao"/></p>
        <time>18:08</time>
      </div>
    </li>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <p>Es broma</p>
        <p>Ataque Moai!</p>
        <p><span><emoji class="moai"/></span><span><emoji class="moai"/></span><span><emoji class="moai"/></span><span><emoji class="moai"/></span><span><emoji class="moai"/></span><span><emoji class="moai"/></span></p>
        <time>18:09</time>
      </div>
    </li>
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
      <div class="msg">
          <p>Copón</p>
        <p><emoji class="funny"/></p>
        <time>18:08</time>
      </div>
    </li>
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
      <div class="msg">
        <p>Hey there's a new update about this chat UI with more responsive elements! Check it now:</p>
        <p><a href="https://codepen.io/Varo/pen/YPmwpQ" target="parent">Chat UI 2.0</a></p>
        <time>18:09</time>
      </div>
    </li> --}}
    
    @empty
    Say Hi!..
    @endforelse
    </ol>
    <form>
     {{ csrf_field() }}
    <input class="textarea" id="textmsg" type="text" placeholder="Type here!"/><button href="#sendmsg" type="button" data-id="{{$friend->id}}" id="sendmsg" class="emojis"><i class="fas fa-envelope"></i></button >
    </form>
    </div>
    @endsection