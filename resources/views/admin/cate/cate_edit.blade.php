
<!-- Modal Add User-->

<div id="editcateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit Category</h3>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form" id="validate_edit_cate">
					<input type="text" name="old_id_edit" id="old_id_edit" class="hidden">
					<div class="form-group">
						<label class="col-md-4 control-label">Category Parent</label>
						<div class="col-md-6">
							<select name="edit_parent" id="edit_parent" class="form-control"  >
								<option value="0" class="{{Auth::user()->level==1 ? 'hidden':''}}">Parent Category</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="edit_name" name="edit_name" disabled>
							<div class="has-error"><i><span class="help-block errorName_edit"></span></i></div>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Order</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="edit_order" name="edit_order" placeholder="Please Enter Category Order">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category keywords</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="edit_keyword" name="edit_keyword" placeholder="Please Enter Category Keywords">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Description</label>
						<div class="col-md-6">
							<textarea class="form-control" name="edit_description" id="edit_description" rows="3" placeholder="Please enter description"></textarea>
						</div>
					</div>
                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn_admin primary">Submit</button>
                			<button type="button" class="btn_admin danger" data-dismiss="modal" id="close">Close</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- View error edit -->
    <div id="view_error_edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>This category could be edit by Super Admin !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>