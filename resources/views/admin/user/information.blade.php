@extends('admin.layouts.adminlayout')

@section('content')


    @foreach($user as $data)
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">{{($data->name)}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            	<div class="panel-body">
            		<div class="form-group col-centered">
            			<label>Username: </label>
						<strong class="text-info"><i>{{$data->name}}</i></strong>
            		</div><hr>
            		<div class="form-group col-centered">
            			<label>Level: </label>
						<strong class="text-info">
							<i>
                                {{($data->level=='0') ? 'Super Admin' :''}}
                                {{($data->level=='1') ? 'Admin':''}}
                                {{($data->level=='2') ? 'Member':''}}
                            </i>
						</strong>
            		</div><hr>
            		<div class="form-group col-centered">
            			<label>Email: </label>
						<strong class="text-info"><i>{{$data->email}}</i></strong>
            		</div><hr>
            		<div class="form-group col-centered">
					@foreach($user as $data)
            			<label>Created: </label>
						<strong class="text-info"><i>{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans() }} ({{ $data->created_at}})</i></strong>
					@endforeach
            		</div><hr>
            	</div>
            </div>
            <a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>
        </div>
    </div>
    @endforeach

@stop