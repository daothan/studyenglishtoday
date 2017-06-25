
<!-- Modal Edit Detail-->

<div id="editguideModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit guide</h3>
            </div>

            <form action="" method="post" class="form-horizontal" role="form" id="validate_edit_guide"  name="validate_edit_guide">
                <div class="modal-body modal-body-detail">
					<input type="text" name="old_id_guide" id="old_id_guide" class="hidden">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tittle_guide_edit"  id="tittle_guide_edit">
                        	<div class="has-error"><i><span class="help-block error_tittle_edit_guide"></span></i></div>
                        </div>
                    </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="form-control" name="content_guide_edit" id="content_guide_edit" rows="3"></textarea>
						</div>
					</div>
                </div>
                <div class="modal-footer modal-body-footer">
                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" id="submit" class="btn_admin primary pull-left">Submit</button>
                            <button type="reset" class="btn_admin warning  pull-left">Reset</button>
                			<button type="button" class="btn_admin danger pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- message add success -->

<div id="edit_guide_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">guide has edited successfully !</h3>
            </div>
        </div>
    </div>
</div>