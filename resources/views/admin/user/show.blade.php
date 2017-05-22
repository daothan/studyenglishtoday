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
               		 <button class="btn_admin  success" data-toggle="modal" id="add_user"><span class="glyphicon glyphicon-plus"></span> ADD</button>
               		 <button class="btn_admin info" data-toggle="modal" id="view_user"><span class="glyphicon glyphicon-list"></span> VIEW</button>
               		 <button class="btn_admin warning" data-toggle="modal" id="edit_user"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
               		 <button class="btn_admin danger" data-toggle="modal" id="delete_user"><span class="glyphicon glyphicon-trash"></span> DELETE</button>

               		 <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#guide">Guide</button>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                        <thead>
                            <tr>
                          	    <th class="text-center hidden">ID</th>
                                <th class="text-center">No</th>
								<th class="text-center">Username</th>
								<th class="text-center">Email</th>
								<th class="text-center">provider</th>
								<th class="text-center">Level</th>
								<th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0;?>
							@foreach($user as $data)
							<?php $no++; ?>
							<tr id="{{$data["id"]}}">
								<td class="hidden"><input type="checkbox" value="{{$data->id}}" name="checkbox" class="checkbox"></td>
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{{is_numeric($data->name) ? $data->name_social : $data->name}}</td>
								<td class="text-center">{{is_numeric($data->name) ? trim($data->email_social,'.'.$data->email) : $data->email}}</td>
								<td class="text-center">
									<?php echo $provider = DB::table('socials')->where('user_id', $data->id)->value('provider');?>
								</td>

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
	<!-- Show guide message -->
	<div id="guide" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center">Guide</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-info"><h3 align="center"><i><b>Please choose one category before acting !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- View error show cate -->
    <div id="viewuser_errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" style="background-color : rgba(228, 25, 25, 0.81)" align="center">Opps....</h3>
                </div>
                <div class="modal-body">
                    <strong class="text-danger"><h3 align="center"><i><b>Please choose one category !</b></i></h3></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn_admin warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>


    @extends('admin.user.add')
    @extends('admin.user.information')
    @extends('admin.user.edit')
    @extends('admin.user.delete')


@stop