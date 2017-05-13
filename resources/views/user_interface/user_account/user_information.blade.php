@extends('user_interface.layouts.user_header')

@section('content')

    @foreach($user as $data)
    <?php $provider = DB::table('socials')->where('user_id',$data->id)->first();
     ?>


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">{{(!is_numeric($data->name)) ? $data->name : $data->name_social}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            	<div class="panel-body">

                    <div class="form-group col-centered">
                        <label>Username: </label>
                        <strong class="text-info"><i>{{(!is_numeric($data->name)) ? $data->name : $data->name_social}}</i></strong><hr>
                    </div>

            		<div class="{{(is_numeric($data->name)) ? 'form-group col-centered' : 'hidden'}}">
            			<label>Account Type: </label>
						<strong class="text-info"><i>{{convert_vi_to_en($provider->provider)}} account</i></strong><hr>
            		</div>

                	<div class="form-group col-centered">
            			<label>Level: </label>
						<strong class="text-info">
							<i>
                                {{($data->level=='0') ? 'Super Admin' :''}}
                                {{($data->level=='1') ? 'Admin':''}}
                                {{($data->level=='2') ? 'Member':''}}
                            </i>
						</strong><hr>
            		</div>

                    <div class="form-group col-centered">
            			<label>Email: </label>
						<strong class="text-info"><i>{{trim($data->email_social,'.'.$data->email)}}</i></strong><hr>
            		</div>

                    <div class="{{(!is_numeric($data->name)) ? 'form-group col-centered' : 'hidden'}}">
					@foreach($user as $data)
            			<label>Created: </label>
						<strong class="text-info"><i>{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans() }} ({{ $data->created_at}})</i></strong>
					@endforeach

                	</div>
            	</div>
            </div>
            <a href="{{route('user.home')}}"><button class="btn btn-basis">Back Home</button></a>
        </div>
    </div>
    @endforeach
@stop