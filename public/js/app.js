$(document).ready(function(){
	$('#fadein').fadeOut(1);
    $('#fadein').removeClass('hidden');
    $('#fadein').fadeIn(3000);

///////////for modal
	  $( "#addPost" ).click(function() {
	 	 	$('#myModal').modal('show');
	  });

	 $('.delpost').click(function(){
	 	var id = $(this).attr('data-index');
	 	 var token = $(this).data('token');
	 	// console.log(id);
	 	var url = "http://localhost:8000/post/";

	 		$.ajax({
	 			type: 'post',//pra sa resource na route
				url : url+id,
			
					
				//pra sa resource na route
        		data: {_method: 'delete', _token :token},

			
				success:function(data){
					console.log(data);
				$("#reloadadminpost").load(location.href + " #reloadadminpost");
				//$("#ulol"+div_id).load(location.href + " #ulol"+div_id+">*");
				}
			});

	 });


/////////ajax for delete comment
	  $(".delComment").click(function(){
	  		var id = $(this).attr('data-index');
	  		var div_id = $(this).attr('data-id');
		  	// $('#myModal').modal('show');
		  	// $('#btnAdd').hide('400');
		  	// $('.modal-body').text(id);
			//console.log(div_id)
		  	$.ajax({
				method: 'get',
				url : 'comments/delete/'+id,
				data: {

				},
				success:function(data){
				$("#ulol"+div_id).load(location.href + " #ulol"+div_id+">*");
				}
			});

	  });

	  /////////ajax for delete friend
	  $(".delFriend").click(function(){
	  		var f_id = $(this).attr('data-index');
	  		//console.log(f_id);
	  		$.ajax({
				method: 'get',
				url : 'addfriend/delete/'+f_id,
				data: {

				},
				success:function(data){
	
		  		$("#friendslist").load(location.href + " #friendslist"+">*");
				}
			});

		  

	  });

	    /////////ajax for delete user
	  $(".deluser").click(function(){
	  		var id = $(this).attr('data-index');
	  		var url = "http://kristoffersobere-csp3.herokuapp.com/admin/delete-user/";
	  		//console.log(id);
	  		$.ajax({
				method: 'get',
				url : url+id,
				data: {

				},
				success:function(data){

				//console.log(data);
		  		$("#reloadadminuser").load(location.href + " #reloadadminuser"+">*");
				}
			});

		  

	  });


/////////ajax for add comment
	  $('.btnComment').click(function(){

    		var	id =(this.value);
    		var text =  $('.textComments'+id).val();
    		var post =  $('.post_id'+id).val();

	  		$.ajax({
				method: 'post',
				url : 'comments',
				data: {
					comments: text,
					_token:$('input[name=_token]').val(),
					postid: post

				},
				success:function(data){
					console.log(data);
					  $('.textComments'+id).val('');
					  $("#reloadcomments"+id).load(location.href + " #reloadcomments"+id+">*");				
				}
			});
	  });

	  /////////ajax for snd msg
	  $('#sendmsg').click(function(){
	 	var friend_id = $(this).attr('data-id');
	  	var msg = $('#textmsg').val();
    		//console.log(friend_id);

	  		$.ajax({
				method: 'post',
				url : 'sendmsg',
				data: {
					msg: msg,
					_token:$('input[name=_token]').val(),
					friend_id: friend_id

				},
				success:function(data){
					console.log(data);
					$('#textmsg').val('');
					$("#reloadchat").load(location.href + " #reloadchat"+">*");
								
				}
			});
	  });

	   $('.chat').click(function(){

    	
	  });

/////////ajax for search user
	  $('#searchuser').keyup(function(){
	  	text = (this.value);

	  	$.ajax({
	  		method:'get',
	  		url:'search/'+text,
	  		data:{
	  			text:text
	  		},success:function(data){

	  			
	  			$.each(data, function (index,value) {
				   $('#searchbody').text(value.name);
				   $('#searchbody').append('<a href="#" id="addasfriend" data-index='+'"'+value.id+'"'+'  data-name='+'"'+value.name+'"'+'><button type="button" class="btn btn-primary pull-right">AddFriend</button></a>');
				   //$('select.mrdDisplayBox').addOption(value.Id, value.Id + ' - ' + value.Number, false);
				});
	  		}
	  	});
	  });

	  ///para lumabas ung append data
			  $('#searchbody').on('click', '#addasfriend', function() {
		   		 var id = $(this).attr('data-index');
		   		 var name = $(this).attr('data-name');
		   		$('#myModal').modal('show');
		   		$('#btnAdd').hide('400');
		   		$('#btnDelete').hide('400');
		  	 	$('.modal-footer').hide('400');
		 
		  	 	$('.modal-body').text('Add '+name+' as Friend?');
		  	 	$('.modal-body').append('<p><button id="adduser" data-dismiss="modal" data-index='+'"'+id+'"'+' class="btn btn-primary btn-block">Add</button></p>');
		  }); 

			  $('.modal-body').on('click', '#adduser', function() {
		   		 var id = $(this).attr('data-index');
		   		 
		   		 $.ajax({
		  		method:'post',
		  		url:'addfriend',
		  		data:{
		  			_token:$('input[name=_token]').val(),
		  			id:id
		  		},success:function(data){
		  				console.log(data);
		  				$("#friendslist").load(location.href + " #friendslist"+">*");	
			  		}
			  	});
		  }); 

});/// end  
setInterval(function(){
		$("#reloadchat").load(location.href + " #reloadchat"+">*");
				  
			},3000);