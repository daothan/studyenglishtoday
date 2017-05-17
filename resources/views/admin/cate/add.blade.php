
<!-- Modal Add User-->

<div id="addcateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add User</h3>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form" id="validate_add_cate">

					<div class="form-group">
						<label class="col-md-4 control-label">Category Parent</label>
						<div class="col-md-6">
							<select name="parent_id" id="inputPa" class="form-control" autofocus >
								<option disabled selected hidden>Please Choose Catgeory...</option>
								<option value="0">Parent Category</option>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="" name="name" placeholder="Please Enter Category Name" value="{{old('name')}}">
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Order</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="" name="order" placeholder="Please Enter Category Order" value="{{old('order')}}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category keywords</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="" name="keywords" placeholder="Please Enter Category Keywords" value="{{old('keywords')}}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Category Description</label>
						<div class="col-md-6">
							<textarea class="form-control" name="description" rows="3" placeholder="Please enter description">{{old('description')}}</textarea>
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