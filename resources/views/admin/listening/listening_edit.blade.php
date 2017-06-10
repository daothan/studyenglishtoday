
<!-- Modal edit listening-->


<div id="editlisteningModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-listening">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit listening</h3>
            </div>

            <form method="POST" class="form-horizontal" role="form"  name="validate_edit_listening" id="validate_edit_listening" enctype="multipart/form-data">
                <div class="modal-body modal-body-listening">
                <input type="text" name="old_id_edit_listening" id="old_id_edit_listening" class="hidden">
                <input type="text" name="old_id_edit_detail1" id="old_id_edit_detail1" class="hidden">

                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" name="tittle_listening_edit"  id="tittle_listening_edit" rows="3"></textarea>
                        </div>
                        <div class="has-error"><i><span class="help-block errortittle_listening_edit"></span></i></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Introduce</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduce_listening_edit" id="introduce_listening_edit" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <b class="text-info">Current Image:</b><p id="old_image"></p>
                        </div>
                    </div>
                    <label class="col-md-1 control-label">Image</label>
                    <div class="input-group image-preview col-md-10">
                        <div class="input-group-edit">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file-edit ">
                                    <span class="glyphicon glyphicon-picture"></span>
                                    <span class="image-preview-input-title">Choose Image</span>
                                    <input type="file" id="image_listening_edit" name="image_listening_edit">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload_edit'/>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <b class="text-info">Current Audio:</b><p id="old_audio"></p>
                        </div>
                    </div>
                    <label class="col-md-1 control-label">Audio</label>
                    <div class="input-group image-preview col-md-10">
		                <input type="text" class="form-control image-preview-filename">
		                <span class="input-group-btn">
		                    <!-- image-preview-input -->
		                    <div class="btn btn-default image-preview-input">
		                        <span class="glyphicon glyphicon-folder-open"></span>
		                        <span class="image-preview-input-title">Choose File</span>
		                        <input type="file" id="audio_listening_edit" name="audio_listening_edit"/>
		                    </div>
		                </span>
		            </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Transcipt</label>
						<div class="col-md-10">
							<textarea class="form-control" name="transcript_listening_edit" id="transcript_listening_edit" rows="3"></textarea>
						</div>
					</div>
                    <div class="form-group" style="width:90px; margin:auto; display: none;" id="loading_edit">
                        <div><p class="text-danger">Please wait...</p></div>
                        <div><img src='/laravel1/storage/uploads/images/loading.gif'/></div>
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

<!-- message edit success -->

<div id="edit_listening_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">listening has edited successfully !</h3>
            </div>
        </div>
    </div>
</div>

