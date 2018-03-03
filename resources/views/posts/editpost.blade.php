@extends('partials.applayout')
@section('title')
 Cloud9|Edit Post
@endsection

@section('main_content')
<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create post</h1>
    		
    			<form action="/post/{{$post->id}}" method="POST" accept-charset="UTF-8">
					{{csrf_field()}}
					{{ method_field('PUT') }} {{-- if using resources --}}
    		    
    		    {{-- <div class="form-group has-error">
    		        <label for="slug">Slug <span class="require">*</span> <small>(This field use in url path.)</small></label>
    		        <input type="text" class="form-control" name="slug" />
    		        <span class="help-block">Field not entered!</span>
    		    </div> --}}
    		    
    		    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="title" value="{{$post->title}}" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="content">Content</label>
    		        <textarea rows="5" class="form-control" name="content">{{$post->content}} </textarea>
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Submit
    		        </button>
    		      
    		    </div>
    		    
    		</form>
		</div>


@endsection