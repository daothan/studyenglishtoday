@extends('admin.layouts.adminlayout')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div class="panel">
				@foreach($content as $data)
				<div class="panel-title col-centered">
					<div class="col-centered">
						<h2 align="center"><strong>{!!htmlspecialchars_decode($data["title"])!!}</strong></h2>
					</div>
				</div><hr>

				<div class="panel-heading col-centered">
					<img class="img-rounded center-block" alt="Cinque Terre" width="304" height="236" src="{{asset('storage/uploads/detail_images/'.convert_vi_to_en(strip_tags($data["title"])).'/'.$data["images"])}}">
					{!!htmlspecialchars_decode($data["introduce"])!!}
				</div>

				<div class="panel-body">
					{!!htmlspecialchars_decode($data["content"]) !!}
				</div>
				@endforeach

				<a href="{{route('admin.detail.show')}}"><button class="btn btn-basis pull-right">Show details</button></a>
				<a href="{{URL::previous()}}"><button class="btn btn-basis">Back</button></a>
			</div>
		</div>

		<div class="col-md-8 col-md-offset-2">
			<div class="panel-footer"></div>
		</div>
	</div>

@stop