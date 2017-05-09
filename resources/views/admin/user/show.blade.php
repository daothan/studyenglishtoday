@extends('admin.layouts.adminlayout')

@section('content')


    <div id="page-wrapper">
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
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
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

										<!-- Show level -->
										<td class="text-center" value= "{{$data["level"]}}">
										@if($data["level"]==0) <?php echo "Super_Admin";?> @endif
										@if($data["level"]==1) <?php echo "Admin";?> @endif
										@if($data["level"]==2) <?php echo "Member";?> @endif
										</td>

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
                			<a href="{{route('admin.user.getAdd')}}"><button class="btn btn-basis pull-left">Add User</button></a>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
@stop