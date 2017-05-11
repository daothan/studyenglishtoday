/*Modal Login*/
$(function(){
	$('#login_modal').click(function(e){
		e.preventDefault();
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			'url' : '/laravel1/user/home',
			'data': {
				'name' : $('#name').val(),
				'password':$('#password').val()
			},
			'type' :'POST',
			success: function(data){
			console.log(data);
			if(data.error ==true){
				$('.error').hide();
				if(data.message.name != undefined){
					$('.errorName').show().text(data.message.name[0]);
				}
				if(data.message.password != undefined){
					$('.errorPassword').show().text(data.message.password[0]);
				}
				if(data.message.errorlogin != undefined){
					$('.errorLogin').show().text(data.message.errorlogin[0]);
				}
			}else{
				window.location.href ="/laravel1/user/home"
			}
			}
		});
	})
});


/*Modal Register*/
$(function(){
	$('#register_modal').click(function(e){
		e.preventDefault();
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			'url' : '/laravel1/user/home',
			'data': {
				'name' : $('#name').val(),
				'password':$('#password').val()
			},
			'type' :'POST',
			success: function(data){
			console.log(data);
			if(data.error ==true){
				$('.error').hide();
				if(data.message.name != undefined){
					$('.errorName').show().text(data.message.name[0]);
				}
				if(data.message.password != undefined){
					$('.errorPassword').show().text(data.message.password[0]);
				}
				if(data.message.errorlogin != undefined){
					$('.errorLogin').show().text(data.message.errorlogin[0]);
				}
			}else{
				window.location.href ="/laravel1/user/home"
			}
			}
		});
	})
});
