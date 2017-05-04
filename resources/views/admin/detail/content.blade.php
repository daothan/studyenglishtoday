@extends('admin.layouts.adminmaster')

@section('content')
	<div class="container">
		<div class="panel">
			<div class="panel-body">
				<div class="col-md-8 col-md-offset-2">
					@foreach($content as $data)
						<?php echo htmlspecialchars_decode($data["content"]); ?>
					@endforeach
				</div>
			</div>
			<a href="{{route('admin.detail.show')}}"><button class="btn btn-success pull-right">Show details</button></a>
		</div>
	</div>

@stop