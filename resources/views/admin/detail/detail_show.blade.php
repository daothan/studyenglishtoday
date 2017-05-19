@extends('admin.layouts.admin_header')

@section('content')

	<!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 align="center">DataTables show details</h2>
                </div>
                <div class="panel-heading">
               		 <button class="btn_admin success" data-toggle="modal" id="add_detail"><span class="glyphicon glyphicon-plus"></span> ADD</button>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover usertable" id="dataTables">
                        <thead>
                            <tr>
								<th class="text-center">No</th>
								<th class="text-center">Tittle</th>
								<th class="text-center">Category</th>
								<th class="text-center">Date</th>
								<th class="text-center">User</th>
								<th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; $parent_cate = "";?>
							@foreach($detail as $data)
							<?php $no++; ?>
							<tr id="{{$data["id"]}}">
								<th class="text-center">{{$no}}</th>
								<td class="text-center">{!!trim(htmlspecialchars_decode($data->tittle)) !!}</td>

								<!-- Show parent category -->
								<td>
									<?php $parent = DB::table('categories')->where('id', $data["cate_id"])->first();
									echo $parent->name;
								?>

								<!-- Show Date -->
								<td class="text-center">
								<?php
									echo \Carbon\Carbon::createFromTimestamp(strtotime($data["created_at"]))->diffForHumans();
								?>
								</td>
								<!-- Show User -->
								<td>
									<?php
										$user = DB::table('users')->where('id', $data["user_id"])->first();
										echo $user->email;
									?>
								</td>
								<!-- Action -->
								<td class="text-center">
									<!-- Show Detail -->
									<button class="btn_admin_action info" data-toggle="modal" data-target="" onclick="view_cate('{{$data["id"]}}')" id="view_cate"><span class="glyphicon glyphicon-list"></span></button>
									<!-- Show Edit Form -->
									<button class="btn_admin_action warning" data-toggle="modal" data-target="" onclick="edit_cate('{{$data["id"]}}')" id="edit_cate"><span class="glyphicon glyphicon-pencil"></span></button>
									<!-- Show Delete Form -->
									<button class="btn_admin_action danger" data-toggle="modal" data-target="" onclick="delete_cate('{{$data["id"]}}')" id="delete_cate"><span class="glyphicon glyphicon-trash"></button>
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

	@extends('admin.detail.detail_add')

@stop