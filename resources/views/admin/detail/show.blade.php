@extends('admin.layouts.adminlayout')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">DataTables show details</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
							<tr>
								<th>No</th>
								<th class="text-center">Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Date</th>
								<th class="text-center">User</th>
								<th class="text-center">View Content</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>

						<tbody>
							<?php $no=0;?>
							@foreach($detail as $data)
							<?php $no++;?>

							<tr class="odd gradeX" align="center">
								<th class="text-center">{{$no}}</th>
								<td>{!!convert_title($data->title)!!}</td>

								<!-- Show parent category -->
								<td>
								<?php $parent = DB::table('categories')->where('id', $data["cate_id"])->first();
								echo $parent->name;
								?>

								<!-- Show User -->
								</td>
								<!-- Show Date -->
								<td>
									<?php
										echo \Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
									?>
								</td>
								<!-- Show User -->
								<td>
									<?php
										$user = DB::table('users')->where('id', $data["user_id"])->first();
										echo $user->email;
									?>
								</td>
								<!-- Show Content -->
								<td>
									<a href="{{route('admin.detail.content', $data->id)}}">
										<button class="btn btn-link"><span class="glyphicon glyphicon-list-alt">&nbsp</span>View Content</button>
									</a>
								</td>
								<!-- Edit -->
								<td class="text-center">
									<a href="{{route('admin.detail.getEdit', $data->id)}}">
										<button class="btn btn-link"><span class="glyphicon glyphicon-pencil">&nbsp</span>Edit</button>
									</a>
								</td>
								<!-- Delete -->
								<td class="text-center">
									<form action="{{route('admin.detail.delete',$data->id)}}" method="POST" role="form">
										{{csrf_field()}}
										<input type="hidden" name="method" value="DELETE">
										<input type="hidden" name="id" value="{{$data->id}}">
										<button class="btn btn-link" id="delete" type="submit" onclick="return confirmdelete('Are you sure you want to delete :{{$data->title}} ?')"><span class="glyphicon glyphicon-trash">&nbsp</span>Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<a href="{{url('admin/detail/add')}}"><button class="btn btn-basis pull-left">Add Detail</button></a>
				</div>
			</div>
		</div>
	</div>


@stop