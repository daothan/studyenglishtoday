
<!-- View Modal start -->
    <div id="viewcateModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center" id="view_titlename"></h3>
                </div>
                <div class="modal-body information">
                    <div class="form-group col-centered">
                        <label>Cate Name: </label>
                        <strong class="text-info">
                            <i>
                                <span id="view_catename" class="text-success"></span>
                            </i>
                        </strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Cate Order: </label>
                        <strong class="text-info">
                            <i>
                                <span id="view_cateorder" class="text-success"></span>
                            </i>
                        </strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Cate Parent: </label>
                        <strong class="text-info"><i><span id="view_cateparent" class="text-success"></span></i></strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Cate Keyword: </label>
                        <strong class="text-info"><i><span id="view_catekeyword" class="text-success"></span></i></strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Cate Description: </label>
                        <strong class="text-info"><i><span id="view_catedescription" class="text-success"></span></i></strong>
                    </div><hr>

                    <div class="form-group col-centered">
                        <label>Created: </label>
                        <strong class="text-info"><i><span id="view_catecreated" class="text-success"></span></i></strong>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- view modal ends -->

    <!-- View error show cate -->
    <div id="viewcate_errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>Please choose one category !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>