@extends('admin.layouts.adminmaster')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-centered">
				<div class="panel-title">
					<div class="col-centered">
						<h2 align="center">Show Users</h2><hr>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Username</th>
								<th class="text-center">Email</th>
								<th class="text-center">Level</th>
								<th class="text-center">Date</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>

						<tbody>
							<?php $no=0;?>
							@foreach($user as $data)
							<?php $no++; ?>
							<tr>
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{{$data->name}}</td>
								<td class="text-center">{{$data->email}}</td>
								<td class="text-center">{{$data->level}}</td>

								<!-- Show date -->
								<td class="text-center">
									<?php
										echo Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
									?>
								</td>

								<!-- Edit -->
								<td class="text-center">
									<a href="{{route('admin.user.getEdit',$data->id)}}">
										<button class="btn btn-link"><span class="glyphicon glyphicon-pencil">&nbsp</span>Edit</button>
									</a>
								</td>

								<!-- Delete -->
								<td class="text-center">
									<form action="{{route('admin.user.delete',$data->id)}}" method="POST" role="form">
										{{csrf_field()}}
										<input type="hidden" name="method" value="DELETE">
										<input type="hidden" name="id" value="{{$data->id}}">
										<button type="submit" id="delete"  class="btn btn-link" onclick="return confirmdelete('Are you sure you want to delete : {{ $data->name}} ?')"><span class="glyphicon glyphicon-trash">&nbsp</span>Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div><hr>
				<a href="{{route('admin.user.getAdd')}}"><button class="btn btn-success pull-right">Add Account</button></a>
			</div>
		</div>
	</div>

@stop