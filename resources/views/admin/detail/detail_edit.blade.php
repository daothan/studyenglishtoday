
<!-- Modal Edit Cate-->

<div id="editdetailModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add Detail</h3>
            </div>

            <form method="POST" class="form-horizontal" role="form"  name="validate_edit_detail" id="validate_edit_detail" enctype="multipart/form-data">
                <div class="modal-body modal-body-detail">

					<div class="form-group">
						<label class="col-md-1 control-label">Category</label>
						<div class="col-md-10">
							<select name="edit_category" id="edit_category" class="form-control" autofocus >
								<option disabled selected hidden>Please Choose Catgeory...</option>
								<option value="0" class="{{Auth::user()->level==1 ? 'hidden':''}}">Parent Category</option>
							</select>
						</div>
					</div>
                    <input type="text" name="old_id_edit_detail" id="old_id_edit_detail" class="hidden">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" class="edit_tittle" name="edit_tittle"  id="edit_tittle" rows="3"></textarea>
                        </div>
                        <div class="has-error"><i><span class="help-block errorTittle_edit"></span></i></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Introduce</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="edit_introduce" id="edit_introduce" rows="3"></textarea>
                        </div>
                    </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="form-control" name="edit_content" id="edit_content" rows="3"></textarea>
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

