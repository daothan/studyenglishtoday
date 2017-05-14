@extends('admin.layouts.admin_header')

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
                    <h4 align="center">Add Category</h4>
                </div>
                <!-- /.panel-heading -->

				<div class="panel-body">
					<form action="{{route('admin.cate.postAdd')}}" method="POST" >

						<div class="form-group {{$errors->has('parent_id') ? 'has-error' : null}}">

							<label>Category Parent</label>
							<select name="parent_id" id="inputPa" class="form-control" autofocus >
								o
								<option disabled selected hidden>Please Choose Catgeory...</option>
								<option value="0">Parent Category</option>

								<?php cate_parent($parent,0,"-",old('parent_id')); ?>

							</select>

							@if($errors->has('parent_id'))
								<span class="help-block">
									<i>{{$errors->first('parent_id')}}</i>
								</span>
							@endif

						</div>

						<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">

							<label for="">Category Name</label>
							<input type="text" class="form-control" id="" name="name" placeholder="Please Enter Category Name" value="{{old('name')}}">

							@if($errors->has('name'))
								<span class="help-block">
									<i>
										{{$errors->first('name')}}
									</i></span>
							@endif

						</div>

						<div class="form-group {{$errors->has('order') ? 'has-error' : null}}">

							<label for="">Category Order</label>
							<input type="text" class="form-control" id="" name="order" placeholder="Please Enter Category Order" value="{{old('order')}}">

							@if($errors->has('order'))
								<span class="help-block">
									<i>{{$errors->first('order')}}</i>
								</span>
							@endif

						</div>

						<div class="form-group {{$errors->has('keywords') ? 'has-error' : null}}">

							<label for="">Category keywords</label>
							<input type="text" class="form-control" id="" name="keywords" placeholder="Please Enter Category Keywords" value="{{old('keywords')}}">

							@if($errors->has('keywords'))
								<span class="help-block">
									<i>{{$errors->first('keywords')}}</i>
								</span>
							@endif

						</div>

						<div class="form-group {{$errors->has('description') ? 'has-error' : null}}">

							<label for="">Category Description</label>
							<textarea class="form-control" name="description" rows="3" placeholder="Please enter description">{{old('description')}}</textarea>
							@if($errors->has('description'))
								<span class="help-block">
									<i>{{$errors->first('description')}}</i>
								</span>
							@endif

						</div>

						{{csrf_field()}}

						<!-- Submit -->
                        <div class="form-group"><hr>
                            <button type="submit" class="btn btn-basis">Add</button>
							<button type="reset" class="btn btn-warning">Reset</button>
                        </div><hr>

					</form>

					<a href="{{route('admin.cate.show')}}">
						<button class="btn btn-basis pull-right">Show categories</button>
					</a>
					<a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>

				</div>
		</div>
	</div>


@stop