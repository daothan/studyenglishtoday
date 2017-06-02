@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Practice Listening</h3><br>
					@foreach($audio as $detail)
						<div class="col-sm-6 col-xs-6 w3ltext-grids">
							<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
							<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
							<h4 align="center"><a href="{{route('user.tittle_audio',[$detail->tittle])}}">Continue read..</a></h4>
						</div>
					@endforeach
				<div class="clearfix">
				</div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
					Total Pages: {!! $audio->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$audio->url(1)}}" class="{{($audio->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$audio->url($audio->currentPage()-1)}}" class="{{($audio->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$audio->lastPage(); $i++)
							<a href="{{$audio->url($i)}}" class="{{($audio->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$audio->url($audio->currentPage()+1)}}" class="{{($audio->currentPage()==$audio->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$audio->url($audio->lastPage())}}" class="{{($audio->currentPage()==$audio->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>
@stop