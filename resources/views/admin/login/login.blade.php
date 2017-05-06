@extends('admin.layouts.adminmaster')

@section('content')
	<div class="container ">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<div class="panel-title col-centered">
							<h2 align="center">Login</h2>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{route('getLogin')}}" method="POST" class="form-horizontal" role="form">
							{{csrf_field()}}
							<!-- Username -->
							<div class="form-signin {{$errors->has('name') ? 'has-error' : null}}">
								<input class="form-control" type="text" name="name" placeholder="Please enter username" value="{{old('name')}}">
								@if($errors->has('name'))
									<span class="help-block">
										<i>{{$errors->first('name')}}</i>
									</span>
								@endif
							</div><br>
							<!-- Password -->
							<div class="form-signin {{$errors->has('password') ? 'has-error' : null}}">
								<input class="form-control" type="password" name="password" placeholder="Please enter password" value="{{old('password')}}"></input>
								@if($errors->has('password'))
									<span class="help-block">
										<i>{{$errors->first('password')}}</i>
									</span>
								@endif
							</div><br>
							<!-- Remember -->
							<div class="form-signin">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</row>
	</div>
@stop