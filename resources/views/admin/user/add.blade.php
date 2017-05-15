
<!-- Modal Add User-->

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add User</h3>
            </div>
            <div class="modal-body">
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
                            <button type="submit" class="btn_admin primary">Register</button>
                            <button type="reset" class="btn_admin warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_admin danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>