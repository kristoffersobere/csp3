@extends('partials.applayout')

@section('title')
    Blog
@endsection


@section('main_content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel paneload">
            <div class="panel-heading text-center">

                <h2><a href="{{url('post/create')}}"><button class="btn btn-info" >Create a New Article</button></a></h2>

                

            </div>

        <div class="panel-body">
                <h3 >List of Articles</h3>

                


              <input type="hidden" value="{{$i=0}}">
                @foreach($posts as  $post)

                <div class="panel panel-default">
                   <div class="panel-heading"><a href="#" class="pull-right"><strong>View all</strong></a> <h4> {{ str_limit($post->title, 20) }}</h4></div>
                    <div class="panel-body">
                        <small>by {{$post->user->name}}</small>
                      <img src="//placehold.it/150x150" class="img-circle pull-right"> <p class="content">{{ str_limit($post->content, 400) }}</p>
                      <div class="clearfix"></div>
                      <hr>
                      <div class="well reloadcomments" id="reloadcomments{{$i}}" >
                     
                         @foreach($post->comment as $comment)
                  
                        <div class="row comments ">
                    
                          <img src="//placehold.it/40x40" class="img-circle pull-left">
                          <p class="comment">
                          <a href="#">{{$comment->user->name}}</a> 
                          {{$comment->content}}<br>
                          </p>

                        </div>
                           
                        @endforeach
             
                      </div>
                      
                      <hr>
                      <form method="POST">
                        {{ csrf_field() }}
                      <div class="input-group">
                        <div class="input-group-btn">
                        <button class="btn btn-default">+1</button>
                        <button class="btnComment coms btn" value="{{$i}}" type="button"><i class="glyphicon glyphicon-share"></i></button>
                        </div>
                        <input type="hidden" class="post_id{{$i}}" name="postid" value="{{$post->id}}">
                        <input class="textComments{{$i}} coms form-control"  placeholder="Add a comment.." type="text"  required>
                      </div>
                      </form>
                      
                    </div>
                 </div>
                 <input type="hidden" value="{{$i++}}">
                @endforeach       
                  {{ $posts->links()}}
        </div>

        </div>
    </div>

</div>




@endsection