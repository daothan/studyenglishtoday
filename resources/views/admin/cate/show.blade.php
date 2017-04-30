@extends('admin/layouts/adminmaster')


@section('content')

	<div class="container">
		<div class="panel panel-primary">

			<div class="panel-heading">
				<h3 class="panel-title">Show categories</h3>
			</div>

			<div class="panel-body">
				<table class="table table-bordered">

					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Alias</th>
							<th>Order</th>
							<th>Parent_name</th>
							<th>Keywords</th>
							<th>Description</th>
							<th>&nbsp&nbsp Edit</th>
							<th>&nbsp&nbsp Delete</th>
						</tr>
					</thead>

					<tbody>

					<?php $no =0; ?>
					@foreach($data as $category)
					<?php $no++; ?>
						<tr>
							<th>{{$no}}</th>
							<td>{{$category->name}}</td>
							<td>{{$category->alias}}</td>
							<td>{{$category->order}}</td>

							<td>
								@if($category["parent_id"] == 0)
									{{"None"}}
								@else
									<?php
										$parent = DB::table('categories')->where('id', $category["parent_id"])->first();
										echo $parent->name;
									?>
								@endif
							</td>
							<td>{{$category->keywords}}</td>
							<td>{{$category->description}}</td>

							<th>
								<span class="glyphicon glyphicon-pencil"></span>
								<a href="{{route('admin.cate.getEdit',$category->id)}}"><button class="btn btn-link">Edit</button></a>
							</th>

							<th>
								<form action="{{route('admin.cate.delete',$category->id)}}" method="POST" role="form">
									{{csrf_field()}}
									<input type="hidden" name="method" value="DELETE">
									<input type="hidden" name="id" value="{{$category->id}}">
									<span class="glyphicon glyphicon-trash"></span>
									<button onclick="return confirmdelete('Are you sure you want to delete - {{$category->name}} - ?')" type="submit" id="delete" class="btn btn-link">Delete</button>
								</form>

							</th>
						</tr>
					@endforeach

					</tbody>
				</table>

				<a href="{{route('admin.cate.getAdd')}}">
					<button type="button" class="btn btn-success pull-right">Add Category</button>
				</a>

			</div>
		</div>
	</div>

@stop
