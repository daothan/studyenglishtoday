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

            <!-- Show button Show, Add, Edit, Delete -->
                <div class="panel-heading">

                    <a class="modal_link" data-toggle="modal" data-target="#view"><button class="btn_admin info"><span class="glyphicon glyphicon-list-alt"></span> VIEW</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#add"><button class="btn_admin success"><span class="glyphicon glyphicon-plus"></span> ADD</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#edit"><button class="btn_admin success"><span class="glyphicon glyphicon-edit"></span> EDIT</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#delete"><button class="btn_admin danger"><span class="glyphicon glyphicon-trash"></span> DELETE</button></a>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" cellspacing="1" class="table table-bordered table-striped table-hover usertable" id="user_table_id">
						<thead>
                            <tr><th></th>
								<th class="text-center">No</th>
								<th class="text-center">Username</th>
								<th class="text-center">Social_Name</th>
								<th class="text-center">Email</th>
								<th class="text-center">Social_Email</th>
								<th class="text-center">Level</th>
								<th class="text-center">Date</th>
							</tr>
                        </thead>
                        <tbody>
                            <?php $no=0;?>
							@foreach($user as $data)
							<?php $no++; ?>
							<tr><th></th>
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{{is_numeric($data->name) ? '---' : $data->name}}</td>
								<td class="text-center">{{is_numeric($data->name) ? $data->name_social : '---'}}</td>
								<td class="text-center">{{is_numeric($data->name) ? '---' : $data->email}}</td>
								<td class="text-center">{{is_numeric($data->name) ? trim($data->email_social, '.'.$data->email) : '---'}}</td>

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
							</tr>
							@endforeach
                        </tbody>
                    </table>
                <!-- /.panel-body -->
                </div>
            <!-- /.panel -->
            </div>
        <!-- /.col-lg-12 -->
        </div>
    </div>

        @extends('admin.user.information')
        @extends('admin.user.edit')
        @extends('admin.user.add')

@stop