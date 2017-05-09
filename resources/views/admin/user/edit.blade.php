@extends('admin.layouts.adminlayout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-title">
					<div class="col-centered">
						<h2 align="center">Edit User</h2>
					</div>
				</div><hr>
				<div class="panel-body">
					@foreach($user as $data)
					<form action="{{route('admin.user.getEdit', $data->id)}}" method="POST" class="form-horizontal" role="form">

						<!-- Token -->
						{{csrf_field()}}

						<!-- Edit Username -->
						<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
							<label>Username</label>
							<input class="form-control" type="text" name="name" value="{{old('name', isset($data['name']) ? $data['name'] : null)}}" disabled></input>
							@if($errors->has('name'))
								<span class="help-block">
									<i>{{$errors->first('name')}}</i>
								</span>
							@endif
						</div>
						<!-- Edit Email -->
						<div class="form-group {{$errors->has('email') ? 'has-error' : null}}">
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="{{old('email', isset($data['email']) ? $data['email'] : null)}}"></input>
							@if($errors->has('email'))
								<span class="help-block">
									<i>{{$errors->first('email')}}</i>
								</span>
							@endif
						</div>

						<!-- Edit Password -->
						<div class="{{(Auth::user()->id == $data->id) ? '' : 'hidden' }}">
							<!-- Edit Password -->
							<div class="form-group {{$errors->has('password') ? 'has-error' : null}}">
								<label>New password</label>
								<input class="form-control" type="password" name="password" value="{{old('password')}}"></input>
								@if($errors->has('password'))
									<span class="help-block">
										<i>{{$errors->first('password')}}</i>
									</span>
								@endif
							</div>

							<!-- Confirm password -->
							<div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : null}}">
								<label>Confim new password</label>
								<input class="form-control" type="password" name="password_confirmation"></input>
								@if($errors->has('password_confirmation'))
									<span class="help-block">
										<i>{{$errors->first('password_confirmation')}}</i>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-basis">Submit</button>
								<button type="reset" class="btn btn-warning">Reset</button>
						</div>
					</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop