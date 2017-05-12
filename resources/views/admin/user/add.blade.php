@extends('admin.layouts.adminlayout')

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
                    <h4 align="center">Add User</h4>
                </div>
                <!-- /.panel-heading -->
				<div class="panel-body">
					<form action="{{route('admin.user.postAdd')}}" method="POST" class="form-horizontal" role="form">

						<!-- Add Name -->
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block ">
                                        <i>{{ $errors->first('name') }}</i>
                                    </span>
                                @endif
                            </div>
                        </div>

						<!-- Add Email -->
						<div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('email') }}</i>
                                    </span>
                                @endif
                            </div>
                        </div>

						<!-- Add Password -->
						<div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('password') }}</i>
                                    </span>
                                @endif
                            </div>
                        </div>

						<!-- Confirm Password -->
						<div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

						<!-- Add Level -->
						<div class="form-group {{$errors->has('level') ? 'has-error' : null}}">
							<label class="col-md-4 control-label">User Level</label>

							<label class="radio-inline {{(Auth::user()->level<1) ? '':'hidden'}}">
								 &nbsp&nbsp&nbsp<input type="radio" name="level" value="1" {{old('level')=="1" ? 'checked='.'"'.'checked'.'"':''}}"> <i>Admin</i>
							</label>

							<label class="radio-inline">
								<input type="radio" name="level" value="2" {{ old('level')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}> <i>Member</i>
							</label>

							@if($errors->has('level'))
								<span class="help-block">
									<h5 align="center"><i>{{$errors->first('level')}}</i></h5>
								</span>
							@endif
						</div>

						<!-- Add Token -->
						{{csrf_field()}}<hr>

						<!-- Submit -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-basis">Register</button>
								<button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
					</form><hr>
					<a href="{{route('admin.user.show')}}"><button class="btn btn-basis pull-right">Show Users</button></a>
                    <a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>
                </div>
            </div>
		</div>
	</div>

@stop