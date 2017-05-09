@extends('layouts.layout')

@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center"></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('account.getRegister') }}">
                            {{ csrf_field() }}

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

                            <!-- Submit -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-basis">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

@endsection
