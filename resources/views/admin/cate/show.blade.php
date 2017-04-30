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
							<th>ID</th>
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

					@foreach($data as $category)
						<tr>
							<th>{{$category->id}}</th>
							<td>{{$category->name}}</td>
							<td>{{$category->alias}}</td>
							<td>{{$category->order}}</td>
							<td>{{$category->name}}</td>
							<td>{{$category->keywords}}</td>
							<td>{{$category->description}}</td>

							<th>
								<span class="glyphicon glyphicon-trash"></span>
								<button class="btn btn-link ">Delete</button>
							</th>

							<th>
								<span class="glyphicon glyphicon-pencil"></span>
								<button class="btn btn-link">Edit</button>
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
