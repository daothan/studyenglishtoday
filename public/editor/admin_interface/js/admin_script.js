
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

/*Ajax view information User Log Header Bar*/
	function view_user_login(id){
		$('#viewloginModal').modal('show');
		//console.log(id);
		$.ajax({
			url:'/laravel1/admin/user/information',
			type:"GET",
			data:{"id":id},
			success:function(result){
				console.log(result);
				/*Check Level*/
				if(result.info.level=='0'){
					var level="Super Admin";
				}else{
					var level="Admin";
				}
				/*End check level*/
				/*Provider*/
                if(result.info.provider!=null){
                	provider=result.info.provider;
                }else{
                	provider="Super Admin";
                }
                /*End check*/

				$("#view_title_login").text(result.info.name);
				$(".view_username").text(result.info.name);
				$(".view_userlevel").text(level);
				$(".view_useremail").text(result.info.email);
				$(".view_userprovider").text(provider);

				/*Show date created*/
				var d = new Date();
					var my_date_format = function(input){
					  var d = new Date(Date.parse(input.replace(/-/g, "/")));

					  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

					  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
					  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
					  return (time + " " + date);

					};
				$(".view_usercreated").text(my_date_format(result.info.created_at));
			}
		})
	}

	/*Ajax edit login user*/
	function edit_user_login(id){
		$('#editloginModal').modal('show');
			$.ajax({
		        url: '/laravel1/admin/user/edit',
		        type:"GET",
		        data: {"id":id},
					success:function(result){
						//console.log(result.info);

						$("#old_id_login").val(result.info.id);
			            $("#old_name_login").val(result.info.name);
			            $("#old_email_login").val(result.info.email);
			            $("#old_level_login").val(result.info.level);
					}
			});
			$("#validate_edit_user_login").validate({
				rules:{
					old_password_login:{
						required:true,
						minlength:6
					},
					old_password_confirmation_login:{
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
							'old_id' : $('#old_id_login').val(),
							'name' : $('#old_name_login').val(),
							'email' : $('#old_email_login').val(),
							'level' : $('#old_level_login').val(),
							'password':$('#old_password_login').val(),
							'password_confirmation':$('#old_password_confirmation_login').val()
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
	}


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
			//console.log(parent_cate);
			$.ajax({
			    url: '/laravel1/admin/cate/catedetail',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){

		    		$('#viewcateModal').modal('show');
			        //console.log(result);

			        $("#view_titlename").text(result.name);
			        $("#view_catename").text(result.name);
			        $("#view_cateorder").text(result.order);
			        $("#view_cateparent").text(parent_cate);
			        $("#view_catekeyword").text(result.keywords);
			        $("#view_catedescription").text(result.description);
			        /*Show time created*/
			        var d = new Date();
						var my_date_format = function(input){
						  var d = new Date(Date.parse(input.replace(/-/g, "/")));

						  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

						  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
						  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
						  return (time + " " + date);

						};
					$("#view_catecreated").text(my_date_format(result.created_at));
			    }
			})
		})
	}

	/*Add Cate*/
	/*Show cate parent and cate*/
    $.ajax({
    	url: '/laravel1/admin/cate/add',
    	type: "GET",
    	success: function(result){
		    //console.log(result.length);
		    /*Level 0*/
		   	if(result.length != 0) {
		    	$.each(result[0].parent, function (index, value1) {
			   		$('#add_parent').append(
			       		$("<option></option>").val(value1.id).text(value1.name));
			   			/*Level 1*/
					    $.each(result[0].category, function(index,value2){
					    	if(value2.parent_id==value1.id){
					    		$('#add_parent').append(
					    			$("<option></option>").val(value2.id).text("--"+value2.name));
					    			/*Level 2*/
					    			$.each(result[0].category, function(index,value3){
					    				//console.log(value3);
								    	if(value3.parent_id==value2.id){
								    		$('#add_parent').append(
								    			$("<option ></option>").val(value3.id).text("----"+value3.name));
								    			/*Level 3*/
								    			$.each(result[0].category, function(index,value4){
								    				//console.log(value4);
											    	if(value4.parent_id==value3.id){
											    		$('#add_parent').append(
											    			$("<option ></option>").val(value4.id).text("------"+value4.name));
											    	}
											    });
								    	}
								    });
					    	}
					    });
				});
		   	}
    	}
    });


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
					url : '/laravel1/admin/cate/add',
					type :'POST',
					data: {
						'add_parent':$('#add_parent').val(),
						'add_name' : $('#add_name').val(),
						'add_order' : $('#add_order').val(),
						'add_keywords':$('#add_keywords').val(),
						'add_description':$('#add_description').val()
					},
					success: function(data){
						if(data.error_add_cate ==true){
						//console.log(data.error_add_cate);
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

	    /*Post edit*/
		$.ajax({
			url:'/laravel1/admin/cate/edit',
			type: "GET",
			data:{"id":id},
				success: function(result){
					if(result.erroredit ==true){
						$('#view_error_edit').modal('show');
					}else{
						//console.log(result[0].id_edit.id);
						var id_edit = result[0].id_edit.id;
						$('#editcateModal').modal('show');

						/*Show category choosing*/
						$('#editcateModal').on('shown.bs.modal', function () {
						 	$('#edit_parent').val(id_edit);
						})

						/*Show categories edit form*/
					    /*Level 0*/
				    	$.each(result[0].parent, function (index, value1) {
					   		$('#edit_parent').append(
					       		$("<option></option>").val(value1.id).text(value1.name));
					   			/*Level 1*/
							    $.each(result[0].category, function(index,value2){
							    	if(value2.parent_id==value1.id){
							    		$('#edit_parent').append(
							    			$("<option></option>").val(value2.id).text("--"+value2.name));
							    			/*Level 2*/
							    			$.each(result[0].category, function(index,value3){
							    				//console.log(value3);
										    	if(value3.parent_id==value2.id){
										    		$('#edit_parent').append(
										    			$("<option></option>").val(value3.id).text("----"+value3.name));
										    			/*Level 3*/
										    			$.each(result[0].category, function(index,value4){
										    				//console.log(value4);
													    	if(value4.parent_id==value3.id){
													    		$('#edit_parent').append(
													    			$("<option ></option>").val(value4.id).text("------"+value4.name));
													    	}
													    });
										    	}
										    });
							    	}
							    });
						});

						/*Send values to edit cate form*/
						//console.log(result[0].info.parent_id);
						$("#old_id_edit").val(result[0].info.id);
						$('#edit_parent').val(result[0].info.parent_id);
						$('#edit_name').val(result[0].info.name);
						$('#edit_order').val(result[0].info.order);
						$('#edit_keyword').val(result[0].info.keywords);
						$('#edit_description').val(result[0].info.description);

						$("#validate_edit_cate").validate({
							rules:{
								edit_order:{
									required:true,
									number: true
								},
								edit_keyword:{
									required:true,
									minlength:6,
									maxlength:60
								},
								edit_description:{
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
									'url' : '/laravel1/admin/cate/edit',
									'type' :'POST',
									'data': {
										'old_id_edit':$("#old_id_edit").val(),
										'edit_parent' : $('#edit_parent').val(),
										'edit_name' : $('#edit_name').val(),
										'edit_order' : $('#edit_order').val(),
										'edit_keyword':$('#edit_keyword').val(),
										'edit_description':$('#edit_description').val()
									},
									success: function(data){
										if(data.error_edit_cate ==true){
											$('.error').hide();
											if(data.messages.edit_name != undefined){
												$('.errorName_edit').show().text(data.messages.edit_name[0]);
											}
										}else{
											setTimeout(function() { $('#editcateModal').modal('hide');}, 200);
											setTimeout(function() { window.location.href = "/laravel1/admin/cate/show";}, 500);
										}
									}
								})
							}
						})
					}
				}
			});

		})
	}

	/*Delete Catetegory*/
	function delete_cate(id){
		$('#delete_cate').each(function(i){
			id[i]=$(this).val();

			$.ajax({
				url: '/laravel1/admin/cate/delete_view',
				type:"GET",
				data: {"id":id},
				success:function(result){
					//console.log(result);
					if(result.error_delete_cate==true){
						$('#view_error_delete').modal('show');
					}else{
						$('#deletecateModal').modal('show');
						$('.name_delete_cate').show().text(result.name);

						$('#deletecateModal').find('#confirmdelete').on('click',function(){
							$.ajaxSetup({
							    headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							    }
							});
							$.ajax({
								url: '/laravel1/admin/cate/delete',
								method:"POST",
								data: {id:id},
								success:function(){
									$('#deletecateModal').modal('hide');
									for(var i=0; i<id.length; i++){
										$('tr#'+id+'').css('background-color','#ccc');
										$('tr#'+id+'').fadeOut(1000);

									}
								}
							});
						});

					}
				}
			});
		})
	}

