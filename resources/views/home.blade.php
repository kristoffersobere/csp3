@extends('partials.applayout')

@section('title')
 Cloud9|Home
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">   <h2><a href="{{url('post/create')}}"><button class="btn btn-info" >Create a New Article</button></a></h2></div>

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
                    <a href="#" class="pull-right"><strong>View all</strong></a>
                    <div class="clearfix"></div>
                    <a href='{{url("post/$post->id/edit")}}' class="pull-right"><button class="btn btn-warning">Edit this Bruhh</button></a> 

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
              
                    
                </div>
            </div>
        </div> {{-- col-8 --}}

         <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading" >
              <label>Search People :
              <input type="text" name="" id="searchuser"></label>
             </div>
             <div class="panel-body" id="searchbody">
                Type a name
             </div>     
          </div>
        </div>


        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading" >
              <p>You have {{$cfriends}} Friends</p>
             </div>
             <div id="friendslist" class="panel-body" style="overflow-y:scroll; height:50%">
             @forelse($friends as $friend)
              <div class="panel">
               <div class="row">
                  <div class="col-xs-2">
                   
                   {{--    <img src="//placehold.it/40x40" class="img-circle pull-left"> --}}
                      @if($friend->profile_pic)
                      <img src="{{$friend->profile_pic}}" style="height: 40px;width: 40px;" class="img-circle pull-left">
                      @else
                      <img src="//placehold.it/40x40" class="img-circle pull-left">
                      @endif
          
                  

                    </div>
                  <div class="col-xs-6"><p class="pull-left"> {{$friend->name}}</p></div>
                  <div class="col-xs-2"><a href='{{route("chat.show",$friend->id)}}' class="chat"><i class="fas fa-comments"></i></a></div>
                  <div><a href="#" class="delFriend" data-index="{{$friend->id}}"><i class="fas fa-times"></i></a></div>
                
               </div>
              </div>
             @empty
             <p>You dont HAVE ANY FRIENDS U LONER!</p>
             @endforelse
          </div>
          </div>
        </div>



    </div>  {{-- end ofrow --}}
</div>

<!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                         {{--  <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                          </div> --}}
                          <div class="modal-body text-center">
                            
                          </div>
                         {{--  <div class="modal-footer">
                           
                            <button type="button" class="btn btn-primary" id="btnAdd" data-dismiss="modal">Add</button>
                            <button type="button" class="btn btn-warning" id="btnDelete" data-dismiss="modal">Delete</button>
                          </div> --}}
                        </div>

                      </div>
                    </div>
@endsection
