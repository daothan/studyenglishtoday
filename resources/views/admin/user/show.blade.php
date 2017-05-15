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
            <div class="panel panel-default filterable">
                <div class="panel-heading">
                    <h4 align="center">DataTables show users</h4>
                    <div class="pull-right">
                </div>
                </div>

            <!-- Show button Show, Add, Edit, Delete -->
                <div class="panel-heading">

                    <a class="modal_link" data-toggle="modal" data-target="#view"><button class="btn_admin info"><span class="glyphicon glyphicon-list-alt"></span> VIEW</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#add"><button class="btn_admin success"><span class="glyphicon glyphicon-plus"></span> ADD</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#edit"><button class="btn_admin success"><span class="glyphicon glyphicon-edit"></span> EDIT</button></a>

                    <a class="modal_link" data-toggle="modal" data-target="#delete"><button class="btn_admin danger"><span class="glyphicon glyphicon-trash"></span> DELETE</button></a>

                    <div class="pull-right filter"><button class="btn btn-default  btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button></div>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" cellspacing="5" class="table table-striped table-bordered table-hover usertable" id="usertable">
						<thead>
                            <tr class="filters">
                                <th class="center"><input type="checkbox" name="check_all" id="check_all"></th>
                                <th class="text-center">No</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Username" disabled>Username</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Social_Name" disabled>Social_Name</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Email" disabled>Email</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Social_Email" disabled>Social_Email</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Level" disabled>Level</th>
                                <th class="text-center"><input type="text" class="form-control" placeholder="Date" disabled>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0;?>
							@foreach($user as $data)
							<?php $no++; ?>
							<tr>
                                <th class="text-center"><input type="checkbox" name="check_user" id="check_user"></th>
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
                    <div class="clearfix"></div>
                        <ul class="pagination pull-right">
                          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        </ul>
                     </div>
                </div>
            <!-- /.panel -->
            </div>
        <!-- /.col-lg-12 -->
        </div>
    </div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>

        @extends('admin.user.information')
        @extends('admin.user.edit')
        @extends('admin.user.add')

@stop