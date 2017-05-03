@extends('admin/layouts/adminmaster')


@section('content')

	<div class="container">
		<div class="panel">

			<div class="panel">
				<div class="col-md-offset-5">
					<h2><strong>Show details</strong></h2>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover">

					<thead>
						<tr align="center">
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

						<tr class="odd gradeX" align="center">
							<th>{{$no}}</th>
							<td>{{$category->name}}</td>
							<td>{{$category->alias}}</td>
							<td>{{$category->order}}</td>
							<!-- Show parent category -->
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
							<!-- Edit -->
							<th>
								<a href="{{route('admin.cate.getEdit',$category->id)}}"><button class="btn btn-link"><span class="glyphicon glyphicon-pencil">&nbsp</span>Edit</button></a>
							</th>
							<!-- Delete -->
							<th>
								<form action="{{route('admin.cate.delete',$category->id)}}" method="POST" role="form">
									{{csrf_field()}}
									<input type="hidden" name="method" value="DELETE">
									<input type="hidden" name="id" value="{{$category->id}}">
									<button onclick="return confirmdelete('Are you sure you want to delete - {{$category->name}} - ?')" type="submit" id="delete" class="btn btn-link"><span class="glyphicon glyphicon-trash">&nbsp</span>Delete</button>
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
