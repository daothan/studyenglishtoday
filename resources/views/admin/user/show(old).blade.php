@extends('admin.layouts.admin_header')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">DataTables show users</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-bordered table-striped table-hover" id="usertable">
                        <thead>
                            <tr>
								<th class="text-center">No</th>
								<th class="text-center">Username</th>
								<th class="text-center">Social_Name</th>
								<th class="text-center">Email</th>
								<th class="text-center">Social_Email</th>
								<th class="text-center">Level</th>
								<th class="text-center">Date</th>
								<th class="text-center">Detail</th>
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
								<td class="text-center">{{is_numeric($data->name) ? '---' : $data->name}}</td>
								<td class="text-center">{{is_numeric($data->name) ? $data->name_social : '---'}}</td>
								<td class="text-center">{{is_numeric($data->name) ? '---' : $data->email}}</td>
								<td class="text-center">{{is_numeric($data->name) ? $data->email_social : '---'}}</td>

								<!-- Show level -->
								<td class="text-center" value= "{{$data["level"]}}">
								@if($data["level"]==0) <?php echo "Super_Admin";?> @endif
								@if($data["level"]==1) <?php echo "Admin";?> @endif
								@if($data["level"]==2) <?php echo "Member";?> @endif
								</td>

								<!-- Show date -->
								<td class="text-center" style="height: 25px;">
									<?php
										echo Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
									?>
								</td>

								<!-- Detail -->
								<td class="center">
									<a href="{{route('admin.user.information',$data->id)}}">
										<button class="btn btn-link"><span class="glyphicon glyphicon-list-alt">&nbsp</span>Detail</button>
									</a>
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
        			<a href="{{route('admin.user.getAdd')}}"><button class="btn btn-success pull-left">Add User</button></a>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

@stop