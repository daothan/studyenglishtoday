@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Practice Listening</h3><br>
					@foreach($audio as $detail)
						<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
							<h4 class="w3t-text"><a href="{{route('user.tittle_audio',[$detail->tittle])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h4>
							<div class="">
								<audio preload="auto" controls>
								    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$detail->audio_path}}" />
								    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$detail->audio_path}}"/>
								</audio>
							</div>
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
					<div class="pagination pull-right {{($audio->lastPage()==0)?'hidden':''}}">
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