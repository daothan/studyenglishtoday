@extends('admin.layouts.adminmaster')

@section('content')
	<div class="container">
		<div class="panel">
			<div class="panel-body">
				<div class="col-md-8 col-md-offset-2">
					@foreach($content as $data)
						<div class="panel-tittle">
							<div class="col-md-offset-3">
								<h2><strong>{!!htmlspecialchars_decode($data["tittle"])!!}</strong></h2>
							</div>
						</div>
						<div class="panel-heading">
							<div class="col-md-offset-3">
								<img src="{{asset('storage/uploads/detail_images/'.$data["tittle"].'/'.$data["images"])}}">
							</div>
							{!!htmlspecialchars_decode($data["introduce"])!!}
						</div>
						<div class="panel-body">
							{!!htmlspecialchars_decode($data["content"]) !!}
						</div>
					@endforeach
				</div>
			</div>
			<a href="{{route('admin.detail.show')}}"><button class="btn btn-success pull-right">Show details</button></a>
		</div>
	</div>

@stop