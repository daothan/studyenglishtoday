@extends('admin/layouts/adminmaster')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel">
					<div class="panel">
						<h2 class="panel-tittle">Edit Category</h2>
					</div>
					<div class="panel-body">

						@foreach($category as $data)
						<form action="{{route('admin.cate.getEdit',$data->id)}}" method="POST" class="form-horizontal" role="form">

							{{csrf_field()}}

							<div class="form-group">
								<label for="">Category Parent</label>
								<select name="parent_id" class="form-control" autofocus>
									<option hidden selected value="{{old('parent_id',isset($data) ? $data['name'] : null)}}">{{$data["name"]}}</option>
									<option >Please Choose Category Parent..</option>
									<?php cate_parent($parent); ?>
								</select>
							</div>

							<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
								<label>Category Name</label>
								<input class="form-control" name="name" value="{{old('name',isset($data["name"]) ? $data['name'] : null)}}"></input>

								@if($errors->has('name'))
									<span class="help-block">
										<strong>{{$errors->first('name')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{$errors->has('order') ? 'has-error' : null}}">
								<label>Category Order</label>
								<input class="form-control" name="order" value="{{old('order', isset($data) ? $data['order'] : null)}}"></input>

								@if($errors->has('order'))
									<span class="help-block">
										<strong>{{$errors->first('order')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{$errors->has('keywords') ? 'has-error' : null}}">
								<label>Category Keywords</label>
								<input class="form-control" name="keywords" value="{{old('keywords', isset($data) ? $data['keywords'] : null)}}"></input>

								@if($errors->has('keywords'))
									<span class="form-control">
										<strong>{{$errors->first('keywords')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{$errors->has('description') ? 'has-error' : null}}">
								<label>Category Description</label>
								<textarea class="form-control" name="description" row="3">{{old('description', isset($data) ? $data["description"] : null)}}</textarea>

								@if($errors->has('description'))
									<span class="help-block">
										<strong>{{$errors->first('description')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>

						</form>
						@endforeach
					</div>

					<a href="{{route('admin.cate.show')}}"><button class="btn btn-info pull-right">Show Categories</button></a>
				</div>
			</div>
		</div>
	</div>

@stop