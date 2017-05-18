
<!-- View Modal start -->
    <div id="viewModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center" id="view_titlename"></h3>
                </div>
                <div class="modal-body information">
                    <div class="form-group col-centered">
                        <label>Username: </label>
                        <strong class="text-info">
                            <i>
                                <span id="view_username" class="text-success"></span>
                            </i>
                        </strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Level: </label>
                        <strong class="text-info">
                            <i>
                                <span id="view_userlevel" class="text-success"></span>
                            </i>
                        </strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Email: </label>
                        <strong class="text-info"><i><span id="view_useremail" class="text-success"></span></i></strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Provider: </label>
                        <strong class="text-info"><i><span id="view_userprovider" class="text-success"></span></i></strong>
                    </div><hr>
                </div>

                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- view modal ends -->

    <!-- View error information -->
    <div id="view_error_view" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>You can not see this account !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>