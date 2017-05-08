@extends('admin.layouts.adminmaster')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-title">
					<div class="col-centered">
						<h2 align="center">Add Users</h2>
					</div>
				</div><hr>
				<div class="panel-body">
					<form action="{{route('admin.user.postAdd')}}" method="POST" class="form-horizontal" role="form">
							<!-- Add Name -->
							<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
								<label>Username</label>
								<input type="text" class="form-control" name="name" placeholder="Please enter name" value="{{old('name')}}"></input>
								@if($errors->has('name'))
									<span class="help-block">
										<i>{{$errors->first('name')}}</i>
									</span>
								@endif
							</div>

							<!-- Add Email -->
							<div class="form-group {{$errors->has('email') ? 'has-error' : null}}">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Please enter email" value="{{old('email')}}"></input>
								@if($errors->has('email'))
									<span class="help-block">
										<i>{{$errors->first('email')}}</i>
									</span>
								@endif
							</div>

							<!-- Add Password -->
							<div class="form-group {{$errors->has('password') ? 'has-error' : null}}">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Please enter password"></input>
								@if($errors->has('password'))
									<span class="help-block">
										<i>{{$errors->first('password')}}</i>
									</span>
								@endif
							</div>

							<!-- Confirm Password -->
							<div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : null}}">
								<label>Confirm Password</label>
								<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"></input>
								@if($errors->has('password_confirmation'))
									<span class="help-block">
										<i>{{$errors->first('password_confirmation')}}</i>
									</span>
								@endif
							</div>

							<!-- Add Level -->
							<div class="form-group {{$errors->has('level') ? 'has-error' : null}}">
								<label>User Level</label><br>

								<label class="radio-inline">
									<input type="radio" name="level" value="1" {{old('level')=="1" ? 'checked='.'"'.'checked'.'"':''}}> Admin
								</label>

								<label class="radio-inline">
									<input type="radio" name="level" value="2" {{ old('level')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}> Member
								</label>

								@if($errors->has('level'))
									<span class="help-block">
										<i>{{$errors->first('level')}}</i>
									</span>
								@endif
							</div>

							<!-- Add Token -->
							{{csrf_field()}}<hr>

							<!-- Submit -->
							<div class="form-group">
								<button type="submit" class="btn btn-basis">Submit</button>
								<button type="reset" class="btn btn-warning">Reset</button>
							</div>
					</form><hr>
					<a href="{{route('admin.user.show')}}"><button class="btn btn-default pull-right">Show Users</button></a>
				</div>
			</div>
		</div>
	</div>

@stop