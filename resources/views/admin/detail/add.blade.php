@extends('admin.layouts.adminmaster')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel">
				<div class="panel">
					<div class="panel-title">
						<h2>Add Details</h2>
					</div>
				</div>
				<div class="panel-body">
					<form action="{{route('admin.detail.getAdd')}}" method="POST" class="form-horizontal" role="form" enctype="">
						<div class="form-group">
							<label>Tittle</label>
							<input type="text" name="tittle" class="form-control" placeholder="Please enter tittle..">
						</div>

						<div class="form-group">
							<label>Introduce</label>
							<textarea class="form-control" name="introduce" rows="3" placeholder="Please enter introduce"></textarea>
							<script type="text/javascript">ckeditor("introduce", "config", "basic")</script>
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea class="form-control" name="content" id="content" rows="3" placeholder="Please enter content" ></textarea>
							<script type="text/javascript">ckeditor("content", "config", "standard")</script>
						</div>

						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image">
						</div>

						<div class="form-group">
							<label>Detail Keywords</label>
							<input  class="form-control" type="text" name="keywords" placeholder="Please enter keywords">
						</div>

						<div class="form-group">
							<label>Description Details</label>
							<textarea class="form-control" name="description" rows="3" placeholder="Please enter description"></textarea>
							<script type="text/javascript">ckeditor("description", "config", "basic")</script>
						</div>

						{{csrf_field()}}

						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>

					<a href="{{route('admin.detail.show')}}"><button class="btn btn-info pull-right">Show details</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
