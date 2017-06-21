
    <!-- View delete modal -->
	<div id="deletelisteningModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Delete</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-info"><h3 align="center"><b><i>Are you sure you want to delete <br><span class="name_delete_listening text-info"></span></i><b></h3></strong>
                    <form method="POST">
                        <input type="text" name="id_delete_listening" id="id_delete_listening" class="hidden">
                    </form>
                </div>
                <div class="form-group" style="width:90px; margin:auto; display: none;" id="loading_delete">
                        <div><p class="text-danger" ><b>Please wait...</b></p></div>
                        <div><img src='/laravel1/storage/uploads/loading_images/loading.gif' /></div>
                    </div>
                <div class="modal-footer">
		            <button class="btn_admin danger" id="confirmdelete">Confirm</button>
                    <button class="btn_admin info" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>
