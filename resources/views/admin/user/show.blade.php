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
		                </div>
           <!--     <script type="text/javascript">$('h2.flash').delay(5000).slideUp();</script> -->

                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
										<th class="text-center">Username</th>
										<th class="text-center">Social_Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Social_Email</th>
										<th class="text-center">Level</th>
										<th class="text-center">Date</th>
										<th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;?>
									@foreach($user as $data)
									<?php $no++; ?>
									<tr id="{{$data["id"]}}">
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
										<td class="text-center"">
											<?php
												echo  Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
											?>
										</td>

										<!-- Action -->
										<td class="text-center">
											<!-- Show Detail -->
											<button class="btn_admin_action info" data-toggle="modal" data-target="" onclick="view_user('{{$data["id"]}}')" id="view_user"><span class="glyphicon glyphicon-list"></span></button>
											<!-- Show Edit Form -->
											<button class="btn_admin_action warning" data-toggle="modal" data-target="" onclick="edit_user('{{$data["id"]}}')" id="edit_user"><span class="glyphicon glyphicon-pencil"></span></button>
											<!-- Show Delete Form -->
											<button class="btn_admin_action danger" data-toggle="modal" data-target="" onclick="delete_user('{{$data["id"]}}')" id="delete_user"><span class="glyphicon glyphicon-trash"></button>
										</td>
									</tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        @extends('admin.user.add')
        @extends('admin.user.information')
        @extends('admin.user.edit')
        @extends('admin.user.delete')


@stop