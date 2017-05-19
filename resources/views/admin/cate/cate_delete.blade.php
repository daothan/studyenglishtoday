
    <!-- View delete modal -->
	<div id="deletecateModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Delete</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-info"><h3 align="center"><b><i>Are you sure you want to delete <span class="name_delete_cate"></span> ?</i><b></h3></strong>
                </div>
                <div class="modal-footer">
		            <button class="btn_admin danger" id="confirmdelete">Confirm</button>
                    <button class="btn_admin info" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View error delete -->
    <div id="view_error_delete" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>You can not delete this account !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>