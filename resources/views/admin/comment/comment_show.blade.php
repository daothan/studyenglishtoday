@extends('admin.layouts.admin_header')

@section('content')

	<!-- /.row -->
    <div class="row" id="comment_table">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 align="center">DataTables show comments</h2>
                </div>
                <div class="panel-heading">
               		 <button class="btn_admin warning" data-toggle="modal" id="guide" data-target="#guide">Guide</button>
               		 <button class="btn_admin info" data-toggle="modal" id="view_comment"><span class="glyphicon glyphicon-list"></span> VIEW</button>
               		 <button class="btn_admin danger" data-toggle="modal" id="delete_comment"><span class="glyphicon glyphicon-plus"></span> DELETE</button>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                        <thead>
                            <tr>
                            	<th class="text-center hidden">ID</th>
								<th class="text-center">No</th>
								<th class="text-center">User</th>
								<th class="text-center">Article Type</th>
								<th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no=0;?>
							@foreach($comment as $data)
							<?php $no++; ?>
							<tr id="{{$data["id"]}}">
								<td class="hidden"><input type="checkbox" value="{{$data->id}}" name="checkbox" class="checkbox"></td>
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{{$data->user_comment}}</td>
								<td class="text-center">{{$data->article_type}}</td>
								<!-- Show Date -->
								<td class="text-center">
								<?php
									echo \Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
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
    <div id="viewcomment_errorModal" class="modal fade" role="dialog">
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


	@extends('admin.comment.comment_detail')
	@extends('admin.comment.comment_delete')

@stop