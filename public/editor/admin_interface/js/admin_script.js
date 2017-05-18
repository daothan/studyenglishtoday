
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

	/*Add User*/
	$('#add_user').click(function(){
		$('#addModal').modal('show');

		$("#validate_add_user").validate({
			rules:{
				add_name:{
					required:true,
					maxlength:50
				},
				add_email:{
					required:true,
					email:true
				},
				add_password:{
					required:true,
					minlength:6
				},
				add_password_confirmation:{
					required:true,
					minlength:6
				}
			},
			messages:{
				add_name:{
					required: "Please enter username.",
				},
				add_password:{
					required: "Please enter password.",
					minlength: "Password must be more than 6 characters."
				}
			},
			submitHandler:function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					'url' : '/laravel1/admin/user/add',
					'data': {
						'add_name' : $('#add_name').val(),
						'add_email' : $('#add_email').val(),
						'add_password':$('#add_password').val(),
						'add_password_confirmation':$('#add_password_confirmation').val()
					},
					'type' :'POST',
					success: function(data){
						if(data.error_add_user ==true){
						console.log(data);
							$('.error').hide();
							if(data.messages.add_name != undefined){
								$('.errorName_add').show().text(data.messages.add_name[0]);
							}
							if(data.messages.add_email != undefined){
								$('.errorEmail_add').show().text(data.messages.add_email[0]);
							}
							if(data.messages.add_password != undefined){
								$('.errorPassword').show().text(data.messages.add_password[0]);
							}
							if(data.messages.add_password_confirmation != undefined){
								$('.errorPassword_confirmation_add').show().text(data.messages.add_password_confirmation[0]);
							}
						}else{
							setTimeout(function() { $('#addModal').modal('hide');}, 200);
							setTimeout(function() { window.location.href = "/laravel1/admin/user/show";}, 500);
						}
					}
				})
			}
		})
	})
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
						if(data.error_edit ==true){
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

	/*Delete*/
	function delete_user(id){
		$('#delete_user').each(function(i){
			id[i] = $(this).val();

			$.ajax({
			    url: '/laravel1/admin/user/delete_view',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){
			    	if(result.errorview ==true){ /*If has error view*/
			    		$('#view_error_delete').modal('show');
			    	}else{
			    		$('#deleteModal').modal('show');
			    		/*Check Name*/
			    		if(!isNaN(result.info.name)){
				      		var name=result.info.name_social;
				      	}else{
				      		var name=result.info.name;
				      	}
			    		$('.name_delete').show().text(name);
			    		/*End check name*/
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

/*Cate script*/

	/*Show Cate informations*/
	function view_cate(id){
	    $('#view_cate').each(function(i){
			id[i] = $(this).val();
			var parent = $('#parent_category').val();
			if(parent==""){
				var parent_cate = "None";
			}else{
				var parent_cate=parent;
			}
			console.log(parent_cate);
			$.ajax({
			    url: '/laravel1/admin/cate/catedetail',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){

		    		$('#viewcateModal').modal('show');
			        console.log(result);

			        $("#view_titlename").text(result.name);
			        $("#view_catename").text(result.name);
			        $("#view_cateorder").text(result.order);
			        $("#view_cateparent").text(parent_cate);
			        $("#view_catekeyword").text(result.keywords);
			        $("#view_catedescription").text(result.description);
			    }
			})
		})
	}

	/*Add Cate*/
	$('#add_cate').click(function(){
		$('#addcateModal').modal('show');

		$("#validate_add_cate").validate({
			rules:{
				add_parent:{
					required:true
				},
				add_name:{
					required:true,
					maxlength:50
				},
				add_order:{
					required:true,
					number: true
				},
				add_keywords:{
					required:true,
					minlength:6,
					maxlength:60
				},
				add_description:{
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
					'url' : '/laravel1/admin/cate/add',
					'data': {
						'add_parent':$('#add_parent').val(),
						'add_name' : $('#add_name').val(),
						'add_order' : $('#add_order').val(),
						'add_keywords':$('#add_keywords').val(),
						'add_description':$('#add_description').val()
					},
					'type' :'POST',
					success: function(data){
						if(data.error_add_cate ==true){
						console.log(data.error_add_cate);
							$('.error').hide();
							if(data.messages.add_name != undefined){
								$('.errorName_add').show().text(data.messages.add_name[0]);
							}
							if(data.messages.add_order != undefined){
								$('.errorOrder_add').show().text(data.messages.add_order[0]);
							}
							if(data.messages.add_keywords != undefined){
								$('.errorKeyword_add').show().text(data.messages.add_keywords[0]);
							}
							if(data.messages.add_description != undefined){
								$('.errorDescription_add').show().text(data.messages.add_description[0]);
							}
						}else{
							setTimeout(function() { $('#addcateModal').modal('hide');}, 200);
							setTimeout(function() { window.location.href = "/laravel1/admin/cate/show";}, 500);
						}
					}
				})
			}
		})
	});

	/*Edit Cate*/
	function edit_cate(id){
		$('#edit_cate').each(function(i){
			$.ajax({
				url:'/laravel1/admin/cate/edit',
				type: "GET",
				data:{"id":id},
					success: function(result){
						if(result.erroredit ==true){
							$('#view_error_edit').modal('show');
						}else{
							$('#editcateModal').modal('show');
							console.log(result);

							/*Send values to edit cate form*/
							$('#old_parent').val(result.parent_id);
							$('#old_order').val(result.order);
							$('#old_name_cate').val(result.name);
							$('#old_keyword').val(result.keywords);
							$('#old_description').val(result.description);
						}
					}
			});

		})
	}


