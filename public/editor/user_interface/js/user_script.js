

/*Home js*/
	$('html, body').hide();
    if (window.location.hash) {
        setTimeout(function() {
            $('html, body').scrollTop(0).show();
            $('html, body').animate({
                scrollTop: $(window.location.hash).offset().top
                }, 1000)
        }, 0);
    }
    else {
        $('html, body').show();
    }
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){
			event.preventDefault();

	$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
});

$(document).ready(function() {
	$().UItoTop({ easingType: 'easeOutQuart' });
});

/*Home top*/
 $("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});
/*Animation menu icon mobile*/
function myFunction(x) {
    x.classList.toggle("change");
}

(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#ff9800", cursorwidth: '8', cursorborderradius: '10px', background: 'rgba(66, 79, 99, 0.6)', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"rgba(97, 100, 193, 0.78)", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#F1F1F1', spacebarenabled:false, cursorborder: '0'});


    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);
/*Validate Form Login Jquery*/

$("#validate_login").validate({
	rules:{
		username:{
			required:true,
		},

		user_password:{
			required:true,
			minlength:6
		}
	},

	messages:{
		username:{
			required: "Please enter username.",
		},
		user_password:{
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
			'url' : '/laravel1/user/home/login',
			'data': {
				'username' : $('#username').val(),
				'user_password':$('#user_password').val()
			},
			'type' :'POST',
			success: function(data){
			//console.log(data);
			if(data.error ==true){
				$('.error').hide();
				if(data.message.username != undefined){
					$('.errorUserName').show().text(data.message.username[0]);
				}
				if(data.message.user_password != undefined){
					$('.errorUserPassword').show().text(data.message.user_password[0]);
				}
				if(data.message.errorlogin != undefined){
					$('.errorLogin').show().text(data.message.errorlogin[0]);
				}
			}
			if(data.level == true){
				console.log(data.username);
				$('.username').text(data.username);
				if(data.value>1){
					$('#login').modal('hide');
					setTimeout(function(){$('#login_success').modal('show');},200);
					setTimeout(function(){$('#login_success').modal('hide');},2300);
					window.setTimeout('location.reload()', 2200);
				}else{
					$('#login').modal('hide');
					setTimeout(function(){$('#login_success').modal('show');},200);
					setTimeout(function(){$('#login_success').modal('hide');},2300);
					setTimeout(function(){window.location.href='/laravel1/admin/dashboard';},2200);
				}
			}
			}
		});
	}
});

/*Validate Form Register*/
$("#validate_register").validate({
	rules:{
		name:{
			required:true,
			maxlength:50
		},
		email:{
			required:true,
			email:true
		},
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
			'url' : '/laravel1/user/home/register',
			'data': {
				'name' : $('#name').val(),
				'email' : $('#email').val(),
				'password':$('#password').val(),
				'password_confirmation':$('#password_confirmation').val()
			},
			'type' :'POST',
			success: function(data){
			//console.log(data);
			if(data.error_register ==true){
				$('.error').hide();
				if(data.messages.name != undefined){
					$('.errorName').show().text(data.messages.name[0]);
				}
				if(data.messages.email != undefined){
					$('.errorEmail').show().text(data.messages.email[0]);
				}
				if(data.messages.password != undefined){
					$('.errorPassword').show().text(data.messages.password[0]);
				}
				if(data.messages.password_confirmation != undefined){
					$('.errorPassword_confirmation').show().text(data.messages.password_confirmation[0]);
				}
			}
			if(data.register==true){
				$('.username').text(data.username);
				$('#register').modal('hide');
				setTimeout(function(){$('#register_success').modal('show');},200);
				setTimeout(function(){$('#register_success').modal('hide');},2500);
				window.setTimeout('location.reload()', 2400);
			}
			}
		});
	}

});

/*Ajax view information User */
	function view_user(id){
		$('#viewModal').modal('show');
		//console.log(id);
		$.ajax({
			url:'/laravel1/user/information',
			type:"GET",
			data:{"id":id},
			success:function(result){
				//console.log(result.info);
				/*Check Level*/
				if(result.info.level=='0'){
					var level="Super Admin";
				}if(result.info.level=='1'){
					var level="Admin";
				}else{
					var level="Member";
				}
				/*End check level*/
				/*Check name*/
				if(!isNaN(result.info.name)){
		      		var name=result.info.name_social;
		      	}else{
		      		var name=result.info.name;
		      	}
		      	/*End check name*/
		      	/*Check Email*/
                if((result.info.email)!=null && isNaN(result.info.email)){
                	var email = result.info.email;
                }else{
                	var email=result.info.email_social;
                	email = email.substring(0, email.indexOf('.') + '.'.length);
                }
				/*Provider*/
                if(result.info.provider!=null){
                	provider=result.info.provider;
                }else{
                	provider="Super Admin";
                }
                /*End check*/

				$("#view_title_login").text(name);
				$(".view_username").text(name);
				$(".view_userlevel").text(level);
				$(".view_useremail").text(email);
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
	function edit_user(id){
		$('#edituser').modal('show');
			$.ajax({
		        url: '/laravel1/user/edit',
		        type:"GET",
		        data: {"id":id},
					success:function(result){
						console.log(result);

						$("#old_id_login").val(result.info.id);
			            $("#old_name_login").val(result.info.name);
			            $("#old_email_login").val(result.info.email);
			            $("#old_level_login").val(result.info.level);
					}
			});
			$("#validate_edit_user").validate({
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
						'url' : '/laravel1/user/edit',
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
								setTimeout(function() { $('#editModal').modal('hide');}, 500);
			   					setTimeout(function() { window.location.href = "/laravel1/user/home";}, 500);
							}
						}
					});
				}
		    })
	}

/*Contact*/
function contact_us(){
		$('#contactModal').modal('show');
		$('#contact_validate').validate({
			rules:{
				name_contact:{
					required:true
				},
				email_contact:{
					required :true,
					email    :true
				},
				message_contact:{
					required:true
				}
			},
			messages:{
				name_contact:{
					required:"Please enter your name."
				},
				email_contact:{
					required:"Please enter your email.",
					email   :"Please enter valid email."
				},
				message_contact:{
					required:"Please enter your idea."
				}
			},
			submitHandler: function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					'url':'/laravel1/user/contact',
					'data':{
						'name_contact'		:$('#name_contact').val(),
						'email_contact'		:$('#email_contact').val(),
						'message_contact'	:$('#message_contact').val()
					},
					'type':'POST',
					beforeSend: function()
				    {
						setTimeout(function(){$('#contactModal').modal('hide');},500);
						setTimeout(function(){$('#contact_success').modal('show');},500);
						setTimeout(function(){$('#contact_success').modal('hide');},4000);
				    },
					success:function(data){
						$('#contact_validate').load('/laravel1/user/home #contact_validate');
					},
				})
			}
		})
}
