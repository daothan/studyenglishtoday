@extends('admin.layouts/adminmaster')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel">
					<div class="panel">
						<div class="panel-title col-md-offset-5">
							<h2>Edit Details</h2>
						</div>
					</div>

					<div class="panel-body">

					@foreach($detail as $data)
						<form action="{{route('admin.detail.getEdit', $data->id)}}" method="POST" role="form" enctype="multipart/form-data">

							{{csrf_field()}}
							<div class="form-group">
								<label>Parent Category</label>
								<select class="form-control" name="cate_id" autofocus>
									<option  hidden value="" >Please Choose Category..</option>
									<?php cate_parent($cate_parent,0,"-",$data["cate_id"]);?>
								</select>
							</div>

							<div class="form-group {{$errors->has('tittle') ? 'has-error' : null}}">
								<label>Tittle</label>
								<input type="text" name="tittle" class="form-control" value="{{$data["tittle"]}}">

								@if($errors->has('tittle'))
									<span class="help-block">
										<strong>{{$errors->first('tittle')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<label>Introduce</label>
								<textarea class="form-control" name="introduce" rows="3">{{$data["introduce"]}}</textarea>
								<script type="text/javascript"> ckeditor("introduce", "config", "basic")</script>
							</div>

							<div class="form-group">
								<label>Content</label>
								<textarea class="form-control" name="content" rows="3">{{$data["content"]}}</textarea>
								<script type="text/javascript"> ckeditor("content", "config", "standard")</script>
							</div>

							<div class="form-group">
								<label>Upload Images</label>
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default btn-file">
											Browse... <input type="file" name="images" id="imgInp" >
										</span>
									</span>
									<input type="text" hidden name="current_image" value="{{$data["images"]}}" >
									<input type="text" class="form-control" readonly name="file_name" value="{{$data["images"]}}">
								</div>
								<img id='img-upload' class="img-rounded pull-right" src="{{asset('storage/uploads/detail_images/'.$data["tittle"].'/'.$data["images"])}}"/>
							</div>

							<div class="form-group">
								<label>Detail Keywords</label>
								<input class="form-control" name="keywords" value="{{$data["keywords"]}}"></input>
							</div>

							<div class="form-group">
								<label>Detail Description</label>
								<textarea class="form-control" name="description">{{$data["description"]}}</textarea>
								<script type="text/javascript">ckeditor("description", "config", "basic")</script>
							</div>

							<div class="form-group">
								<button class="btn btn-primary" type="submit">Update</button>
								<button class="btn btn-warning" type="reset">Reset</button>
							</div>

						</form>
					@endforeach

					<a href="{{route('admin.detail.show')}}"><button class="btn btn-info pull-right">Show Details</button></a>


					</div>
				</div>
			</div>
		</div>
	</div>
@stop