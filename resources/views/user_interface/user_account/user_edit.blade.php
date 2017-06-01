
<!-- View Modal edit -->
<div id="edituser" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit User</h3>
            </div>
            <div class="modal-body">
            <form action="" method="POST" class="form-horizontal" role="form" id="validate_edit_user">
                <h3 class="col-md-6 col-md-offset-3 error successRegister flash text-center text-danger"></h3>
                    <input type="text" name="old_id_login" id="old_id_login" class="hidden">
                    <!-- Add Name -->
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="old_name_login" name="old_name_login" disabled>
                        </div>
                    </div>

                    <!-- Add Email -->
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="old_email_login" name="old_email_login" disabled>
                            <div class="has-error"><i><span class="help-block error errorEmail"></span></i></div>
                        </div>
                    </div>
					<input type="text" name="old_level_login" id="old_level_login" class="hidden">
                    <!-- Add Password -->
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="old_password_login" name="old_password_login">
                            <div class="has-error"><i><span class="help-block error errorPassword"></span></i></div>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="old_password_confirmation_login" name="old_password_confirmation_login">
                            <div class="has-error"><i><span class="help-block error errorPassword_confirmation"></span></i></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                            <button type="submit" class="btn_user primary">Update</button>
                            <button class="btn_user danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        </div>
		            </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- view modal ends -->
