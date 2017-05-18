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
               		 <button class="btn_admin  success" data-toggle="modal"  id="add_cate"><span class="glyphicon glyphicon-plus"></span> ADD</button>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
								<th class="text-center">Name</th>
								<th class="text-center">Parent_name</th>
								<th class="text-center">Date</th>
								<th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; $parent_cate = "";?>
							@foreach($data as $data)
							<?php $no++; ?>
							<tr id="{{$data["id"]}}">
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{{$data->name}}</td>
								<!-- Show parent category -->
								<td class="text-center">
									@if($data["parent_id"] == 0)
										{{"None"}}
									@else
										<?php
											$parent = DB::table('categories')->where('id', $data["parent_id"])->first();
											echo $parent->name;
											$parent_cate = $parent->name;
										?>
									@endif
								</td>
								<!-- Show Date -->
								<td class="text-center">
								<?php
									echo \Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
								?>
								</td>
								<!-- Action -->
								<td class="text-center">
									<!-- Show Detail -->
									<button class="btn_admin_action info" data-toggle="modal" data-target="" onclick="view_cate('{{$data["id"]}}')" id="view_cate"><span class="glyphicon glyphicon-list"></span></button>
									<!-- Show Edit Form -->
									<button class="btn_admin_action warning" data-toggle="modal" data-target="" onclick="edit_cate('{{$data["id"]}}')" id="edit_cate"><span class="glyphicon glyphicon-pencil"></span></button>
									<!-- Show Delete Form -->
									<button class="btn_admin_action danger" data-toggle="modal" data-target="" onclick="delete_cate('{{$data["id"]}}')" id="delete_user"><span class="glyphicon glyphicon-trash"></button>
								</td>
								<input type="text" id="parent_category" value="{{$parent_cate}}">
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

    @extends('admin.cate.cate_detail')
    @extends('admin.cate.cate_add')
    @extends('admin.cate.cate_edit')


@stop