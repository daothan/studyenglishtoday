@extends('admin.layouts.adminlayout')

@section('content')
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">{{convert_vi_to_en(Auth::user()->name)}}'s informations </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
		<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                	<div class="panel-body">
                		<div class="form-group col-centered">
                			<label>Username: </label>
							<strong class="text-info"><i>{{Auth::user()->name}}</i></strong>
                		</div><hr>
                		<div class="form-group col-centered">
                			<label>Level: </label>
							<strong class="text-info">
								<i>
                                    {{((Auth::user()->level=='0')) ? 'Super Admin' :''}}
                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
                                </i>
							</strong>
                		</div><hr>
                		<div class="form-group col-centered">
                			<label>Email: </label>
							<strong class="text-info"><i>{{Auth::user()->email}}</i></strong>
                		</div><hr>
                		<div class="form-group col-centered">
						@foreach($user as $data)
                			<label>Created: </label>
							<strong class="text-info"><i>{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans() }} ({{ $data->created_at}})</i></strong>
						@endforeach
                		</div><hr>
                	</div>
                </div>
            </div>
        </div>
	</div>
@stop