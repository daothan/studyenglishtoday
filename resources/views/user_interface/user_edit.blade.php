@extends('user_interface.layouts.user_header')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Edit User</h4>
                </div>
                <!-- /.panel-heading -->
				<div class="panel-body">
					@foreach($user as $data)
					<form action="" method="POST"  role="form" class="form-horizontal">

						<!-- Token -->
						{{csrf_field()}}

						<!-- User id value -->
						<input id="user_id" type="text" name="user_id" value="{{$data->id}}" class="hidden">

						<!-- Edit Username -->
						<div class="form-group">
                            <label for="name" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input class="form-control" type="text" name="name" value="{{old('name', isset($data['name']) ? $data['name'] : null)}}" disabled></input>
							@if($errors->has('name'))
								<span class="help-block">
									<i>{{$errors->first('name')}}</i>
								</span>
							@endif
                            </div>
                        </div>

						<!-- Edit Email -->
						<div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control" type="text" name="email" value="{{old('email', isset($data['email']) ? $data['email'] : null)}}"></input>
							@if($errors->has('email'))
								<span class="help-block">
									<i>{{$errors->first('email')}}</i>
								</span>
							@endif
                            </div>
                        </div>

						<!-- Edit Password -->
						<div class="{{(Auth::user()->id == $data->id) ? '' : 'hidden' }}">
							<!-- Edit Password -->
							<div class="form-group">
	                            <label for="password" class="col-md-4 control-label">Password</label>

	                            <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
	                                <input class="form-control" type="password" name="password" value="{{old('password')}}"></input>
									@if($errors->has('password'))
										<span class="help-block">
											<i>{{$errors->first('password')}}</i>
										</span>
									@endif
	                            </div>
	                        </div>

							<!-- Confirm password -->
							<div class="form-group">
	                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                            <div class="col-md-6">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
	                            </div>
	                        </div>
						</div>

						<!-- Submit -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="edit_user" type="submit" class="btn btn-info">Update</button>
								<button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
					</form>
					@endforeach
				</div>
			</div>
			<a href="{{URL::previous()}}"><button class="btn btn-success">Back</button></a>
		</div>
	</div>

<script type="text/javascript">
	$(function(){
	$('#edit_user').click(function(e){
		e.preventDefault();
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			'url' : '/laravel1/user/edit/'+$('#user_id').val(),
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
			}
			}
		});
	})
});
</script>
@stop
