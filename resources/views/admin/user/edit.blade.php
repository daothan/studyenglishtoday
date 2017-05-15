<!-- Modal Edit -->

<div id="edit" class="modal fade"  role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center">{{$data->name}}</h3>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="form-horizontal">

						<!-- Token -->
						{{csrf_field()}}

						<!-- User id value -->
						<input id="user_id" type="text" name="user_id" value="{{$data->id}}" class="hidden">

						<!-- Edit Username -->
						<div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6 ">
                                <input class="form-control" type="text" name="name" value="{{old('name', isset($data['name']) ? $data['name'] : null)}}" disabled></input>
                            </div>
                        </div>

						<!-- Edit Email -->
						<div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email_edit" type="text" name="email" class="form-control" value="{{old('email', isset($data['email']) ? $data['email'] : null)}}"></input>
								<div class="has-error"><i><span class="help-block error errorEmail"></span></i></div>
                            </div>
                        </div>

						<!-- Edit Password -->
						<div class="{{(Auth::user()->id == $data->id) ? '' : 'hidden' }}">
							<!-- Edit Password -->
							<div class="form-group">
	                            <label class="col-md-4 control-label">Password</label>

	                            <div class="col-md-6">
	                                <input id="password_edit" class="form-control" type="password" name="password" value="{{old('password')}}"></input>
									<div class="has-error"><i><span class="help-block error errorPassword"></span></i></div>
	                            </div>
	                        </div>

							<!-- Confirm password -->
							<div class="form-group">
	                            <label class="col-md-4 control-label">Confirm Password</label>

	                            <div class="col-md-6">
	                                <input id="password_confirmation_edit" type="password" class="form-control" name="password_confirmation">
	                                <div class="has-error"><i><span class="help-block error errorPassword_confirmation"></span></i></div>
	                            </div>
	                        </div>
						</div>

						<!-- Submit -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="edit_user" type="submit" class="btn_admin success">Update</button>
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