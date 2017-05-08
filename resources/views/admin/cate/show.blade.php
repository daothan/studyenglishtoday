@extends('admin/layouts/adminmaster')


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-offset-0 col-centered">
				<div class="panel-title">
					<div class="col-centered">
						<h2 align="center"><strong>Show categories</strong></h2><hr>
					</div>
				</div>

				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover">

						<thead>
							<tr align="center">
								<th class="text-center">No</th>
								<th class="text-center">Name</th>
								<th class="text-center">Date</th>
								<th class="text-center">Order</th>
								<th class="text-center">Parent_name</th>
								<th class="text-center">Keywords</th>
								<th class="text-center">Description</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>

						<tbody>

						<?php $no =0; ?>
						@foreach($data as $category)
						<?php $no++; ?>

							<tr class="odd gradeX" align="center">
								<th class="text-center">{{$no}}</th>

								<td>{{$category->name}}</td>

									<!-- Show Date -->
								<td>
								<?php
									echo \Carbon\Carbon::createFromTimestamp(strtotime($category["created_at"]))->diffForHumans();
								?>
								</td>

								</td>

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
								<th class="text-center">
									<a href="{{route('admin.cate.getEdit',$category->id)}}"><button class="btn btn-link"><span class="glyphicon glyphicon-pencil">&nbsp</span>Edit</button></a>
								</th>
								<!-- Delete -->
								<th class="text-center">
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
						<button type="button" class="btn btn-default pull-right">Add Category</button>
					</a>

				</div>
			</div>
		</div>
	</div>

@stop
