
/*Alert action delete*/
function confirmdelete(msg){
	if (window.confirm(msg)){
		return true;
	}
	return false;
}

/*Function use ckeditor and ckfinder*/
function ckeditor(name, config, toolbar){

	config = {};
	config.entities_latin = false;
	config.filebrowserBrowseUrl ='/laravel1/public/editor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/laravel1/public/editor/ckfinder/ckfinder.html';


	if(toolbar == 'standard'){
		config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		'/',
		'/',
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Source,Save,NewPage,Print,Templates,Copy,Paste,PasteText,PasteFromWord,Replace,SelectAll,Scayt,Form,Radio,TextField,Textarea,Button,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,CreateDiv,Blockquote,JustifyRight,BidiLtr,BidiRtl,Language,Unlink,Anchor,TextColor,BGColor,Maximize,ShowBlocks,About,Cut,Checkbox,HiddenField,ImageButton,Select';

	}if(toolbar =='basic'){
		config.toolbarGroups = [
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];

		config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,Find,Replace,SelectAll,Scayt,Form,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Blockquote,Indent,CreateDiv,JustifyRight,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,Image,Table,Smiley,SpecialChar,PageBreak,Iframe,TextColor,BGColor,ShowBlocks,About,Maximize,PasteFromWord,Checkbox,HorizontalRule';


	}if(toolbar == 'full'){
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];
	}

	return  CKEDITOR.replace(name, config, toolbar);
}




/*Show images before uploads*/
$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {

		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }

		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		});
	});


/*Jquery action tables User*/
    var id=[];

	/*Show User informations*/
	function view_user(id){
	    $('#view_user').each(function(i){
			id[i] = $(this).val();

			$.ajax({
			    url: '/laravel1/admin/user/information',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){
			    	if(result.errorview ==true){ /*If has error view*/
			    		$('#view_error_view').modal('show');
			    	}else{
			    		$('#viewModal').modal('show');
				        console.log(result.user_social.provider);
				        console.log(result.info);
				      	/*Check Name*/
				      	if(!isNaN(result.info.name)){
				      		var name=result.info.name_social;
				      	}else{
				      		var name=result.info.name;
				      	}
				      	/*Check Level*/
		                if(result.info.level == '0'){
		                	var level = "Super Admin";
		                }else if(result.info.level == '1'){
		                	var level = "Admin";
		                }else{
		                	var level = "Member";
		                }
		                /*Check Email*/
		                if((result.info.email)!=null && isNaN(result.info.email)){
		                	var email = result.info.email;
		                }else{
		                	var email=result.info.email_social;
		                	email = email.substring(0, email.indexOf('.') + '.'.length);
		                }
		                /*Provider*/
		                if(result.user_social.provider!=null){
		                	provider=result.user_social.provider;
		                }else{
		                	provider="None";
		                }
		                /*End check*/
				        $("#view_titlename").text(name);
				        $("#view_username").text(name);
				        $("#view_userlevel").text(level);
				        $("#view_useremail").text(email);
				        $("#view_userprovider").text(provider);
			    	}
			    }
			})
		})
	}

	/*Edit*/

	function edit_user(id){
	    $('#edit_user').each(function(i){
	    	$.ajax({
	        url: '/laravel1/admin/user/edit',
	        type:"GET",
	        data: {"id":id},
		        success: function(result){
		        	if(result.errorview ==true){ /*If has error view*/
			    		$('#view_error_edit').modal('show');
			    	}else{
	    			$('#editModal').modal('show');
		        	console.log(result);
		          //console.log(result);/**/
		            $("#old_id").val(result.info.id);
		            $("#old_name").val(result.info.name);
		            $("#old_email").val(result.info.email);
			        }
		   		}
		   	})
	    	$("#validate_edit_user").validate({
				rules:{
					password:{
						required:true,
						minlength:6
					},
					password_confirmation:{
						required:true,
						minlength:6
					}
				},
				submitHandler:function(){
					$.ajaxSetup({
			   		headers: {
			        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.ajax({
						'url' : '/laravel1/admin/user/edit',
						'data': {
							'old_id' : $('#old_id').val(),
							'name' : $('#old_name').val(),
							'email' : $('#old_email').val(),
							'password':$('#old_password').val(),
							'password_confirmation':$('#old_password_confirmation').val()
						},
						'type' :'POST',
						success: function(data){
						console.log(data);
						if(data.error_register ==true){
							$('.error').hide();
							if(data.messages.email != undefined){
								$('.errorEmail').show().text(data.messages.email[0]);
							}
							if(data.messages.password != undefined){
								$('.errorPassword').show().text(data.messages.password[0]);
							}
							if(data.messages.password_confirmation != undefined){
								$('.errorPassword_confirmation').show().text(data.messages.password_confirmation[0]);
							}
						}else{
							window.location.href ="/laravel1/admin/user/show"
						}
						}
					});
				}
		    })
	   	})

	}

	/*Edit*/
	function delete_user(id){
		$('#delete_user').each(function(i){
			id[i] = $(this).val();

			$.ajax({
			    url: '/laravel1/admin/user/information',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){
			    	if(result.errorview ==true){ /*If has error view*/
			    		$('#view_error_view').modal('show');
			    	}else{
			    		$('#deleteModal').modal('show');

    			    	$('#deleteModal').find('#confirmdelete').on('click',function(){
							$.ajaxSetup({
							    headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							    }
							});
							$.ajax({
								url: '/laravel1/admin/user/delete',
								method: "POST",
								data:{id:id},

								success:function(){
									$('#deleteModal').modal('hide');
									for(var i=0; i<id.length; i++)
							    	{
							    		$('tr#'+id+'').css('background-color', '#ccc');
							        	$('tr#'+id+'').fadeOut(1000);
							        }
								}
							})
						})
			    	}
			    }
			});
	    })
	}
/*	/*Delete*/
/*	$('#delete_button').click(function(){
		$(':checkbox:checked').each(function(i){
			id[i] = $(this).val();
		});
		if(id.length === 0) //If you have not checked yet
		{
			alert("You didnt choose any category");
		}
		else{
			$('#delete_user').modal('show');
			console.log(id);
			$('#delete_user').find('#confirmdelete').on('click',function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/user/delete/'+id,
					method: "POST",
					data:{id:id},

					success:function(){
						$('#delete_user').modal('hide');
						for(var i=0; i<id.length; i++)
				    	{
				    		$('tr#'+id[i]+'').css('background-color', '#ccc');
				        	$('tr#'+id[i]+'').fadeOut(1000);
				        }
					}
				})
			})
		}
	})
*/