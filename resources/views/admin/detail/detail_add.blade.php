
<!-- Modal Add Detail-->

<div id="adddetailModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-listening">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add Detail</h3>
            </div>

            <form method="POST" class="form-horizontal" role="form"  name="validate_add_detail" id="validate_add_detail" enctype="multipart/form-data">
                <div class="modal-body modal-body-listening">
					<div class="form-group">
						<label class="col-md-1 control-label">Category</label>
						<div class="col-md-10">
							<select name="category" id="category" class="form-control" autofocus >
								<option disabled selected hidden>Please Choose Catgeory...</option>
								<option value="0" class="{{Auth::user()->level==1 ? 'hidden':''}}">Parent Category</option>
							</select>
						</div>
					</div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Type</label>
                        <div class="col-md-10">
                           <select name="type_article" id="type_article" class="form-control" >
                                <option disabled selected hidden>Please Choose Type Of Article...</option>
                                <option value="library">Knowledge Library</option>
                                <option value="listening">Listening</option>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Tittle</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" name="tittle"  id="tittle" rows="3"></textarea>
                        </div>
                        <div class="has-error"><i><span class="help-block errorTittle_add"></span></i></div>
                    </div>

                    <label class="col-md-1 control-label">Image</label>
                    <div class="input-group image-preview col-md-10">
                        <div class="input-group-detail">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file-detail ">
                                    <span class="glyphicon glyphicon-picture"></span>
                                    <span class="image-preview-input-title">Choose Image</span>
                                    <input type="file" id="image_detail" name="image_detail">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload-detail'/>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Introduce</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduce" id="introduce" rows="3"></textarea>
                        </div>
                    </div>

					<div class="form-group">
						<label class="col-md-1 control-label">Content</label>
						<div class="col-md-10">
							<textarea class="form-control" name="content" id="content" rows="3"></textarea>
						</div>
					</div>
                    <div class="form-group" style="width:90px; margin:auto; display: none;" id="loading_add_detail">
                        <div><p class="text-danger" ><b>Please wait...</b></p></div>
                        <div><img src='/laravel1/storage/uploads/loading_images/loading.gif' /></div>
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

<div id="add_detail_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">Detail has added successfully !</h3>
            </div>
        </div>
    </div>
</div>