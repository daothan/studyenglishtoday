
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
			console.log(data);
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
			if(data.level ==true){
				if(data.value>1){
					window.location.href ="/laravel1/user/home";
				}else{
					window.location.href ="/laravel1/admin/dashboard";
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
			console.log(data);
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
			}else{
				window.location.href ="/laravel1/user/home"
			}
			}
		});
	}

});
