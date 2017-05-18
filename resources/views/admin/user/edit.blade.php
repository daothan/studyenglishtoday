
<!-- View Modal start -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit User</h3>
            </div>
            <div class="modal-body">
            <form action="" method="POST" class="form-horizontal" role="form" id="validate_edit_user">
                <h3 class="col-md-6 col-md-offset-3 error successRegister flash text-center text-danger"></h3>
                    <input type="text" name="old_id" id="old_id" class="hidden">
                    <!-- Add Name -->
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="old_name" name="old_name" disabled>
                        </div>
                    </div>

                    <!-- Add Email -->
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="old_email" name="old_email" disabled>
                            <div class="has-error"><i><span class="help-block error errorEmail"></span></i></div>
                        </div>
                    </div>

                    <!-- Add Password -->
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="old_password" name="old_password">
                            <div class="has-error"><i><span class="help-block error errorPassword"></span></i></div>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="old_password_confirmation" name="old_password_confirmation">
                            <div class="has-error"><i><span class="help-block error errorPassword_confirmation"></span></i></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                            <button type="submit" class="btn_admin primary">Update</button>
                            <button class="btn_admin danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    <!-- view modal ends -->


    <!-- View error edit -->
    <div id="view_error_edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>You can not edit this account !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
