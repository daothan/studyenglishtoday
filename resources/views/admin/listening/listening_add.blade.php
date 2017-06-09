
<!-- Modal Add listening-->

<div id="addlisteningModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add listening</h3>
            </div>

            <form method="POST" class="form-horizontal" role="form"  name="validate_add_listening" id="validate_add_listening" enctype="multipart/form-data">
                <div class="modal-body modal-body-detail">
                    <input type="text" name="cate_listening" id="cate_listening" class="hidden">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" name="tittle_listening"  id="tittle_listening" rows="3"></textarea>
                        </div>
                        <div class="has-error"><i><span class="help-block errortittle_listening_add"></span></i></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Introduce</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduce_listening" id="introduce_listening" rows="3"></textarea>
                        </div>
                    </div>

                    <label class="col-md-1 control-label">Image</label>
                    <div class="input-group image-preview col-md-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file ">
                                    <span class="glyphicon glyphicon-picture"></span>
                                    <span class="image-preview-input-title">Choose Image</span>
                                    <input type="file" id="image_listening" name="image_listening">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>

                    <label class="col-md-1 control-label">Audio</label>
                    <div class="input-group image-preview col-md-10">
                        <input type="text" class="form-control image-preview-filename">
                        <span class="input-group-btn">
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-facetime-video"></span>
                                <span class="image-preview-input-title">Choose Audio</span>
                                <input type="file" id="audio_listening" name="audio_listening" multiple=""/>
                            </div>
                        </span>
                    </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Transcipt</label>
						<div class="col-md-10">
							<textarea class="form-control" name="transcript_listening" id="transcript_listening" rows="3"></textarea>
						</div>
					</div>
                    <div id="loading_text_add" style="width: 800px; margin: auto; display: none;" ><p class="text-danger">Please wait...</p></div>
                    <div id="loading_add" style="width: 800px; margin: auto;  display: none;"><img src='/laravel1/storage/uploads/images/loading.gif' /></div>
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

<div id="add_listening_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">listening has added successfully !</h3>
            </div>
        </div>
    </div>
</div>
<div class="modal"></div>
