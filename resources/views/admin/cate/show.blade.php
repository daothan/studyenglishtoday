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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">DataTables show categories</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
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
						<button type="button" class="btn btn-basis pull-left">Add Category</button>
					</a>

				</div>
			</div>
		</div>
	</div>


@stop
