

/*Responsive tables*/
	$(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: false
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


	/*Add User*/
	$('#add_user_header').click(function(){
		$('#adduserdashModal').modal('show');

		$("#validate_dash_add_user").validate({
			rules:{
				dash_add_name:{
					required:true,
					maxlength:50
				},
				dash_add_email:{
					required:true,
					email:true
				},
				dash_add_password:{
					required:true,
					minlength:6
				},
				dash_add_password_confirmation:{
					required:true,
					minlength:6
				}
			},
			messages:{
				dash_add_name:{
					required: "Please enter username.",
				},
				dash_add_password:{
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
						'add_name' : $('#dash_add_name').val(),
						'add_email' : $('#dash_add_email').val(),
						'add_password':$('#dash_add_password').val(),
						'add_password_confirmation':$('#dash_add_password_confirmation').val()
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
			   		$('#dash_add_parent').append(
			       		$("<option></option>").val(value1.id).text(value1.name));
			   			/*Level 1*/
					    $.each(result[0].category, function(index,value2){
					    	if(value2.parent_id==value1.id){
					    		$('#dash_add_parent').append(
					    			$("<option></option>").val(value2.id).text("--"+value2.name));
					    			/*Level 2*/
					    			$.each(result[0].category, function(index,value3){
					    				//console.log(value3);
								    	if(value3.parent_id==value2.id){
								    		$('#dash_add_parent').append(
								    			$("<option ></option>").val(value3.id).text("----"+value3.name));
								    			/*Level 3*/
								    			$.each(result[0].category, function(index,value4){
								    				//console.log(value4);
											    	if(value4.parent_id==value3.id){
											    		$('#dash_add_parent').append(
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


	$('#add_cate_header').click(function(){
		$('#addcatedashModal').modal('show');

		$("#validate_dash_add_cate").validate({
			rules:{
				dash_add_parent:{
					required:true
				},
				dash_add_name:{
					required:true,
					maxlength:50
				},
				dash_add_order:{
					required:true,
					number: true
				},
				dash_add_keywords:{
					required:true,
					minlength:6,
					maxlength:60
				},
				dash_add_description:{
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
					url  :'/laravel1/admin/cate/add',
					type :'POST',
					data: {
						'add_parent'     : $('#dash_add_parent').val(),
						'add_name'       : $('#dash_add_name').val(),
						'add_order'      : $('#dash_add_order').val(),
						'add_keywords'   : $('#dash_add_keywords').val(),
						'add_description': $('#dash_add_description').val()
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


/*Add detail header*/

/*Show cate parent and cate*/
    $.ajax({
    	url: '/laravel1/admin/detail/add',
    	type: "GET",
    	success: function(result){
		    //console.log(result.length);
		    /*Level 0*/
		   	if(result.length != 0) {
		    	$.each(result[0].parent, function (index, value1) {
			   		$('#category_dash').append(
			       		$("<option></option>").val(value1.id).text(value1.name));
			   			/*Level 1*/
					    $.each(result[0].category, function(index,value2){
					    	if(value2.parent_id==value1.id){
					    		$('#category_dash').append(
					    			$("<option></option>").val(value2.id).text("--"+value2.name));
					    			/*Level 2*/
					    			$.each(result[0].category, function(index,value3){
					    				//console.log(value3);
								    	if(value3.parent_id==value2.id){
								    		$('#category_dash').append(
								    			$("<option ></option>").val(value3.id).text("----"+value3.name));
								    			/*Level 3*/
								    			$.each(result[0].category, function(index,value4){
								    				//console.log(value4);
											    	if(value4.parent_id==value3.id){
											    		$('#category_dash').append(
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
/*Validate form and add*/

	$('#add_detail_header').click(function(){

		$('#adddetaildashModal').modal('show');

		$('#validate_add_detail_dash').validate({
			ignore: [],/*ignore hidden field*/
			rules:{
				category_dash:{
					required:true
				},
	            dash_tittle: {
	            	required  :true,
	            	minlength :20
	            },
				dash_introduce:{
					required  :true,
					minlength :30
				},
				dash_content:{
					required  :true,
					minlength :30
				}
			},
			submitHandler: function () {
	        	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/detail/add',
					type: 'POST',
					data:{
						'category'  : $('#category_dash').val(),
						'tittle'    : $('#dash_tittle').val(),
						'introduce' : $('#dash_introduce').val(),
						'content'   : $('#dash_content').val()
					},
					success:function(data){
						if(data.error_add_detail ==true){
						console.log(data.messages.tittle[0]);
							$('.error').hide();
							if(data.messages.tittle != undefined){
								$('.errorTittle_add_dash').show().text(data.messages.tittle[0]);
							}
						}else{
							setTimeout(function() { $('#adddetaildashModal').modal('hide');}, 200);
							setTimeout(function() { window.location.href = "/laravel1/admin/detail/show";}, 500);
						}
					}
				})
	   		}
		});

	});
