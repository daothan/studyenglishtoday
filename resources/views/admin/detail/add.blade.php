@extends('admin.layouts.adminmaster')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel">
				<div class="panel">
					<div class="panel-title col-md-offset-5">
						<h2>Add Details</h2>
					</div>
				</div>
				<div class="panel-body">
					<form action="{{route('admin.detail.postAdd')}}" method="POST" role="form" enctype="multipart/form-data">

						<div class="form-group {{$errors->has('cate_id') ? 'has-error' : null}}">
							<label>Category</label>
							<select class="form-control" name="cate_id" autofocus>
								<option hidden value="">Please choose category ..</option>
								<?php cate_parent($cate_parent, 0, "-", old('cate_id'));?>
							</select>

							@if($errors->has('cate_id'))
								<span class="help-block">
									<strong>{{$errors->first('cate_id')}}</strong>
								</span>
							@endif
						</div>

						<div class="form-group {{$errors->has('tittle') ? 'has-error' : null}}">
							<label>Tittle</label>
							<input type="text" name="tittle" class="form-control" placeholder="Please enter tittle.." value="{{old('tittle')}}">

							@if($errors->has('tittle'))
								<span class="help-block">
									<strong>{{$errors->first('tittle')}}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label>Introduce</label>
							<textarea class="form-control" name="introduce" rows="3" placeholder="Please enter introduce">{{old('introduce')}}</textarea>
							<script type="text/javascript">ckeditor("introduce", "config", "basic")</script>
						</div>

						<div class="form-group {{$errors->has('content') ? 'has-error' : null}}">
							<label>Content</label>
							<textarea class="form-control" name="content" id="content" rows="3" placeholder="Please enter content">{{old('content')}}</textarea>
							<script type="text/javascript">ckeditor("content", "config", "standard")</script>

							@if($errors->has('content'))
								<span class="help-block">
									<strong>{{$errors->first('content')}}</strong>
								</span>
							@endif
						</div>

						<div class="form-group {{$errors->has('images') ? 'has-error' : null}}">
					        <label>Upload Image</label>
					        <div class="input-group">
					            <span class="input-group-btn">
					                <span class="btn btn-default btn-file">
					                    Browse… <input type="file" id="imgInp" name="images">
					                </span>
					            </span>
					            <input type="text" class="form-control" readonly name="file_name">

					        </div>
					        @if($errors->has('images'))
								<span class="help-block">
									<strong>{{$errors->first('images')}}</strong>
								</span>
					        @endif
					        <img id='img-upload' class="img-rounded pull-right" />
					    </div>

						<div class="form-group">
							<label>Detail Keywords</label>
							<input  class="form-control" type="text" name="keywords" placeholder="Please enter keywords" value="{{old('keywords')}}">
						</div>

						<div class="form-group">
							<label>Description Details</label>
							<textarea class="form-control" name="description" rows="3" placeholder="Please enter description">{{old('description')}}</textarea>
							<script type="text/javascript">ckeditor("description", "config", "basic")</script>
						</div>

						{{csrf_field()}}

						<button class="btn btn-primary" type="submit">Submit</button>

						<button class="btn btn-warning" type="reset">Reset</button>

					</form>

					<a href="{{route('admin.detail.show')}}"><button class="btn btn-info pull-right">Show details</button></a>

				</div>
			</div>
		</div>
	</div>
</div>


@stop