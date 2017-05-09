@extends('admin.layouts.adminlayout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-centered">
					@foreach($content as $data)
						<div class="panel-title">
							<h2><strong>{!!htmlspecialchars_decode($data["title"])!!}</strong></h2>
						</div>
						<div class="panel-heading">
							<img src="{{asset('storage/uploads/detail_images/'.$data["title"].'/'.$data["images"])}}">
							{!!htmlspecialchars_decode($data["introduce"])!!}
						</div>
						<div class="panel-body">
							{!!htmlspecialchars_decode($data["content"]) !!}
						</div>
					@endforeach
			</div>
			<a href="{{route('admin.detail.show')}}"><button class="btn btn-default pull-right">Show details</button></a>
		</div>
	</div>

@stop