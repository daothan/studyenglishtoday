@extends('admin.layouts/adminlayout')

@section('content')


    <div class="row">
        <div class="col-lg-12">
			<div class="panel-title">
				<div class="col-centered">
					<h2 align="center">Edit Details</h2><hr>
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

					<div class="form-group {{$errors->has('title') ? 'has-error' : null}}">
						<label>Title</label>
						<textarea name="title" class="form-control" rows="3" >{{old('title',isset($data["title"]) ? $data['title'] : null)}}</textarea>
						<script type="text/javascript">ckeditor("title", "config", "basic")</script>

						@if($errors->has('title'))
							<span class="help-block">
								<i>{{$errors->first('title')}}</i>
							</span>
						@endif
					</div>

					<div class="form-group">
						<label>Introduce</label>
						<textarea class="form-control" name="introduce" rows="3">{{old('introduce',isset($data["introduce"]) ? $data["introduce"] : null)}}</textarea>
						<script type="text/javascript"> ckeditor("introduce", "config", "basic")</script>
					</div>

					<div class="form-group">
						<label>Content</label>
						<textarea class="form-control" name="content" rows="3">{{old('content',isset($data["content"]) ? $data['content'] : null)}}</textarea>
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
						<img id='img-upload' class="img-rounded pull-right" src="{{asset('storage/uploads/detail_images/'.$data["title"].'/'.$data["images"])}}"/>
					</div>

					<div class="form-group">
						<label>Detail Keywords</label>
						<input class="form-control" name="keywords" value="{{old('keywords', isset($data['keywords']) ? $data['keywords'] : null)}}"></input>
					</div>

					<div class="form-group">
						<label>Detail Description</label>
						<textarea class="form-control" name="description">{{old('description', isset($data['description']) ? $data['description'] : null)}}</textarea>
						<script type="text/javascript">ckeditor("description", "config", "basic")</script>
					</div>

					<div class="form-group">
						<button class="btn btn-basis" type="submit">Update</button>
						<button class="btn btn-warning" type="reset">Reset</button>
					</div>

				</form>
			@endforeach

			<a href="{{route('admin.detail.show')}}"><button class="btn btn-basis pull-right">Show Details</button></a>
			<a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>

			</div>
		</div>
	</div>

@stop