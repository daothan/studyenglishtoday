
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




