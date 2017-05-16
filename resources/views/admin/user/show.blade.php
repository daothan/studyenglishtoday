@extends('admin.layouts.admin_header')


@section('content')
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 align="center">DataTables show users</h2>
                        </div>
                        <div class="panel-heading">
		                    <a class="modal_link" data-toggle="modal" data-target="#add">
		                    	<button class="btn_admin success"><span class="glyphicon glyphicon-plus"></span> ADD</button>
		                    </a>

		                    <a class="modal_link" data-toggle="modal" data-target="#view">
		                    	<button class="btn_admin info" style="display: none;" id="view_button"><span class="glyphicon glyphicon-list-alt"></span> VIEW</button>
		                    </a>
		                    <a class="modal_link" data-toggle="modal" data-target="#edit">
		                    	<button class="btn_admin success" style="display: none;" id="edit_button"><span class="glyphicon glyphicon-edit"></span> EDIT</button>
		                    </a>
		                    <a class="modal_link" data-toggle="modal" >
		                    	<button class="btn_admin danger" style="display: none;" id="delete_button"><span class="glyphicon glyphicon-trash"></span> DELETE</button>
		                    </a>
		                </div>
		                <i id="notice_user" style="display:inline;color:red;"><b><h4 align="center">Please choose user before action</h4></b></i>

                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                                <thead>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="check_all" class="check_all hidden"></th>
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
									<tr id="{{$data->id}}">
										<td class="text-center"><input type="checkbox" id="checkbox" class="delete_user" value="{{$data->id}}"></td>
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
									</tr>
									@endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        @extends('admin.user.information')
        @extends('admin.user.edit')
        @extends('admin.user.add')
        @extends('admin.user.delete')


@stop