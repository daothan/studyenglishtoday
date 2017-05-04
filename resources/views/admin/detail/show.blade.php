@extends('admin.layouts.adminmaster')

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
							<th>Tittle</th>
							<th>Parent category</th>
							<th>Data</th>
							<th>User</th>
							<th>View Content</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=0;?>
						@foreach($detail as $data)
						<?php $no++;?>

						<tr class="odd gradeX" align="center">
							<th>{{$no}}</th>
							<td>{{$data->tittle}}</td>

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
							<td>
								<a href="{{route('admin.detail.getEdit', $data->id)}}">
									<button class="btn btn-link"><span class="glyphicon glyphicon-pencil">&nbsp</span>Edit</button>
								</a>
							</td>
							<!-- Delete -->
							<td>
								<form action="{{route('admin.detail.delete',$data->id)}}" method="POST" role="form">
									{{csrf_field()}}
									<input type="hidden" name="method" value="DELETE">
									<input type="hidden" name="id" value="{{$data->id}}">
									<button class="btn btn-link" id="delete" type="submit" onclick="return confirmdelete('Are you sure you want to delete -{{$data->tittle}}- ?')"><span class="glyphicon glyphicon-trash">&nbsp</span>Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>

		<a href="{{url('admin/detail/add')}}"><button class="btn btn-info pull-right">Add Detail</button></a>
	</div>

@stop