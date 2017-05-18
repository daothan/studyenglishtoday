
<!-- Modal Add User-->

<div id="editcateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit Category</h3>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form" id="validate_edit_cate">

					<div class="form-group">
						<label class="col-md-4 control-label">Category Parent</label>
						<div class="col-md-6">
							<select name="old_parent" id="old_parent" class="form-control" autofocus >
								<option disabled selected hidden>Please Choose Catgeory...</option>
								<option value="0">Parent Category</option>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="old_name_cate" name="old_name_cate" placeholder="Please Enter Category Name">
							<div class="has-error"><i><span class="help-block errorName_add"></span></i></div>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Order</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="old_order" name="old_order" placeholder="Please Enter Category Order">
							<div class="has-error"><i><span class="help-block errorOrder_add"></span></i></div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category keywords</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="old_keyword" name="old_keyword" placeholder="Please Enter Category Keywords">
							<div class="has-error"><i><span class="help-block errorKeyword_add"></span></i></div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Description</label>
						<div class="col-md-6">
							<textarea class="form-control" name="old_description" id="old_description" rows="3" placeholder="Please enter description"></textarea>
							<div class="has-error"><i><span class="help-block errorDescription_add"></span></i></div>
						</div>
					</div>
                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn_admin primary">Submit</button>
                            <button class="btn_admin warning" type="reset" >Reset</button>
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

<!-- View error edit -->
    <div id="view_error_edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>You can not edit this category !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>