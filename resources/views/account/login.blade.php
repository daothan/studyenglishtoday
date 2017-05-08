@extends('admin.layouts.adminmaster')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading rol-centered">
						<h2 align="center">Login</h2>
					</div>

					<div class="panel-body">
						<form action="{{route('account.getLogin')}}" method="POST" class="form-horizontal" role="form">

							<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
								<label class="col-md-3 control-label">Username</label>
								<div class="col-md-6">
									<input class="form-control" type="text" name="name" placeholder="Please enter username" value="{{old('name')}}" autofocus></input>
									<span class="help-block">
										<i>{{$errors->first('name')}}</i>
									</span>
								</div>
							</div>

							<div class="form-group {{$errors->has('password') ? 'has-error' : null}}">
								<label for="Password" class="col-md-3 control-label">Password</label>
								<div class="col-md-6">
									<input class="form-control" type="password" name="password" placeholder="Please enter password"></input>
									<span class="help-block">
										<i>{{$errors->first('password')}}</i>
									</span>
								</div>
							</div>
							{{csrf_field()}}
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember">Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-basis btn-block"></span> Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop