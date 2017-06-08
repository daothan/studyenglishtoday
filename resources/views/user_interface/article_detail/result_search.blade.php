@extends('user_interface.layouts.user_header')

@section('content')
<div class="form_search">
	<form >
	  <input type="text" name="search" placeholder="Search ...">
	</form>
</div>

<div class="codes agileitsbg5">
	<div class="container">
		<div id="" class="grid_3 grid_5 w3-agileits">
			<h2><p class="agiletext-border agiletext-style">Newest Article...</p></h2>
				@foreach($results as $detail)
					<div class="col-md-10 col-md-offset-1 md_10" style="margin-bottom: 20px;">
						<h4 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</a></h4>
						<!--- If audio then show audio-->
						<div class="{{($detail->type=="audio")? 'hidden':''}}">
							<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
						</div>
						<div class="{{($detail->type=="audio")? '':'hidden'}} ">
							<?php $audio_path= DB::table('listenings')->where('tittle',$detail->tittle)->get();?>
							@foreach($audio_path as $data)
								<audio preload="auto" controls>
								    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$data->audio_path}}" />
								    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$data->audio_path}}"/>
								</audio>
							@endforeach
						</div>
						<!--- If audio then show audio-->
						<h4 align="center" style="margin-top: 30px;"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
					</div>
				@endforeach
			<div class="clearfix"> </div>
			<script>$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})</script>
		</div>
	</div>
</div>
@stop