@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Newest Posts</h3><br>
					@foreach($new_post as $detail)
						<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
							<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
							<!--- If audio then show audio-->
								<div class="{{($detail->type=="audio")? 'hidden':''}}">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								</div>
								<div class="{{($detail->type=="audio")? '':'hidden'}} home_audio_5">
									<?php $audio_path= DB::table('listenings')->where('tittle',$detail->tittle)->get();?>
									@foreach($audio_path as $data)
										<audio id="audioPlayer" class="audioPlayer5" height="30" controls="controls">
										    <source id="oggSource" type="audio/ogg" src="{{'/'.$data->audio_path}}" />
										    <source id="mp3Source" type="audio/mp3" src="{{'/'.$data->audio_path}}"/>
										</audio>
									@endforeach
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								</div>
								<!--- If audio then show audio-->
							<h4 align="center"><a href="{{($detail->type=="audio")?  route('user.tittle_audio',[$detail->tittle]) : route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
						</div>
					@endforeach
				<div class="clearfix">
				</div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
					Total Pages: {!! $new_post->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$new_post->url(1)}}" class="{{($new_post->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$new_post->url($new_post->currentPage()-1)}}" class="{{($new_post->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$new_post->lastPage(); $i++)
							<a href="{{$new_post->url($i)}}" class="{{($new_post->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$new_post->url($new_post->currentPage()+1)}}" class="{{($new_post->currentPage()==$new_post->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$new_post->url($new_post->lastPage())}}" class="{{($new_post->currentPage()==$new_post->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>

@stop