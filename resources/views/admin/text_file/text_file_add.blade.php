
<!-- Modal Add Detail-->

<div id="addfileModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add Text Files</h3>
            </div>

            <form method="POST" class="form-horizontal" role="form"  name="validate_add_file" id="validate_add_file" enctype="multipart/form-data">
                <div class="modal-body modal-body-detail">

                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" name="tittle_file"  id="tittle_file" rows="3"></textarea>
                        </div>
                        <div class="has-error"><i><span class="help-block errorTittle_add"></span></i></div>
                    </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="form-control" name="content_file" id="content_file" rows="3"></textarea>
						</div>
					</div>
                    <div class="form-group" style="width:90px; margin:auto; display: none;" id="loading_add_file">
                        <div><p class="text-danger" ><b>Please wait...</b></p></div>
                        <div><img src='/laravel1/storage/uploads/images/loading.gif' /></div>
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

<div id="add_file_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">File has added successfully !</h3>
            </div>
        </div>
    </div>
</div>