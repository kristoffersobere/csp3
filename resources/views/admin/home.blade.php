@extends('partials.applayout')

@section('title')
Home
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="row">
       
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">   <h2>List</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <input type="hidden" value="{{$i=0}}">
                    @foreach($posts as  $post)

                <div class="panel panel-default">

                   <div class="panel-heading">
                    <button class="delPost" type="button">X</button> 
                    <a href="#" class="pull-right"><strong>View all</strong></a>
                    <div class="clearfix"></div>
                    {{-- <a href='{{url("post/$post->id/edit")}}' class="pull-right"><button class="btn btn-warning">Edit this Bruhh</button></a>  --}}

                    <h4>{{$post->title}}</h4>
                   </div>

                    <div class="panel-body">
                      <small>by {{$post->user->name}}</small>
                        @if($post->user->profile_pic)
                        <img src="{{$post->user->profile_pic}}" style="height: 150px;width: 150px;" class="img-circle pull-right">
                        @else
                        <img src="//placehold.it/150x150" class="img-circle pull-right">
                        @endif
                       <p class="content">{{ str_limit($post->content, 400) }}</p>
                      <div class="clearfix"></div>
                      <hr>
                      <div class="well" id="ulol{{$i}}">

                     
                        @foreach($post->comment as $comment)
                         <div class="row comments panel">

                
                          @if($comment->user->profile_pic)
                          <img src="{{$comment->user->profile_pic}}" style="height: 40px;width: 40px;" class="img-circle pull-left">
                          @else
                           <img src="//placehold.it/40x40" class="img-circle pull-left">
                          @endif

                         {{--  <img src="//placehold.it/40x40" class="img-circle pull-left"> --}}
                          <p class="comment">
                            <div class="ex">
                                <a type="button" class="delComment delComment{{$comment->id}}" data-index="{{$comment->id}}" data-id="{{$i}}"><i class="fas fa-times pull-right"></i></a>

                            </div>
                          <a href="#">{{$comment->user->name}}: </a> 
                          {{$comment->content}}<br>
                          </p>

                        </div>
                        @endforeach
             
                      </div>
                      
                      <hr>
                      {{-- <form action='{{ action('CommentsController@store') }}' method="POST">
                      <div class="input-group">
                        <div class="input-group-btn">
                        <button class="btn btn-default">+1</button>
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-share"></i></button>
                        </div>
                        <input type="hidden" name="postid" value="{{$post->id}}">
                        <input class="form-control" placeholder="Add a comment.." type="text" name="comments">
                      </div>
                      </form> --}}
                      
                    </div>
                 </div>

        <input type="hidden" value="{{$i++}}">
                @endforeach 
                {{ $posts->links()}}
              
                    
                </div>
            </div>
        </div> {{-- col-8 --}}
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">   
                	<h4>Nav</h4>
                 
                    <a href=""><li>Add User </li></a>
                    <a href=""><li>Edit User </li></a>
                    <a href=""><li>Delete User </li></a>
                    
                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
