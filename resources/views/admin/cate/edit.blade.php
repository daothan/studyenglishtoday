@extends('admin/layouts/adminlayout')

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Categories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Edit Category</h4>
                </div>
                <!-- /.panel-heading -->
			<div class="panel-body">

				@foreach($category as $data)
				<form action="{{route('admin.cate.getEdit',$data->id)}}" method="POST" role="form">

					{{csrf_field()}}

					<div class="form-group">
						<label for="">Category Parent</label>
						<select name="parent_id" class="form-control" autofocus>
							<option value="0">Parent Category</option>
							<?php cate_parent($parent,0,"-",$data["parent_id"]); ?>
						</select>
					</div>

					<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
						<label>Category Name</label>
						<input class="form-control" name="name" value="{{old('name',isset($data["name"]) ? $data['name'] : null)}}"></input>

						@if($errors->has('name'))
							<span class="help-block">
								<i>{{$errors->first('name')}}</i>
							</span>
						@endif
					</div>

					<div class="form-group {{$errors->has('order') ? 'has-error' : null}}">
						<label>Category Order</label>
						<input class="form-control" name="order" value="{{old('order', isset($data) ? $data['order'] : null)}}"></input>

						@if($errors->has('order'))
							<span class="help-block">
								<i>{{$errors->first('order')}}</i>
							</span>
						@endif
					</div>

					<div class="form-group {{$errors->has('keywords') ? 'has-error' : null}}">
						<label>Category Keywords</label>
						<input class="form-control" name="keywords" value="{{old('keywords', isset($data) ? $data['keywords'] : null)}}"></input>

						@if($errors->has('keywords'))
							<span class="form-control">
								<i>{{$errors->first('keywords')}}</i>
							</span>
						@endif
					</div>

					<div class="form-group {{$errors->has('description') ? 'has-error' : null}}">
						<label>Category Description</label>
						<textarea class="form-control" name="description" row="3" placeholder="Please enter description">{{old('description', isset($data) ? $data["description"] : null)}}</textarea>

						@if($errors->has('description'))
							<span class="help-block">
								<i>{{$errors->first('description')}}</i>
							</span>
						@endif
					</div>

					<div class="form-group">
						<button class="btn btn-basis" type="submit">Update</button>

						<button class="btn btn-warning" type="reset">Reset</button>
					</div>


				</form>
				@endforeach
				<a href="{{route('admin.cate.show')}}"><button class="btn btn-basis pull-right">Show Categories</button></a>
				<a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>
			</div>
		</div>
	</div>


@stop