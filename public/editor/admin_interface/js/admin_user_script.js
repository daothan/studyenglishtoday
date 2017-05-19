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
				        //console.log(result.user_social.provider);
				        //console.log(result.info);
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
		                	provider="Super Admin";
		                }
		                /*End check*/
				        $("#view_titlename").text(name);
				        $("#view_username").text(name);
				        $("#view_userlevel").text(level);
				        $("#view_useremail").text(email);
				        $("#view_userprovider").text(provider);
				        /*Show time created*/
				        var d = new Date();
							var my_date_format = function(input){
							  var d = new Date(Date.parse(input.replace(/-/g, "/")));

							  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

							  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
							  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
							  return (time + " " + date);

							};
						$("#view_usercreated").text(my_date_format(result.info.created_at));
			    	}
			    }
			})
		})
	}

	/*Add User*/
	$('#add_user, #add_user_header').click(function(){
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
						//console.log(data);
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
		        	//console.log(result);
		            //console.log(result);/**/
		            $("#old_id").val(result.info.id);
		            $("#old_name").val(result.info.name);
		            $("#old_email").val(result.info.email);
		            $("#old_level").val(result.info.level);
			        }
		   		}
		   	});
	    	$("#validate_edit_user").validate({
				rules:{
					old_password:{
						required:true,
						minlength:6
					},
					old_password_confirmation:{
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
							'level' : $('#old_level').val(),
							'password':$('#old_password').val(),
							'password_confirmation':$('#old_password_confirmation').val()
						},
						'type' :'POST',
						success: function(data){
						//console.log(data);
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