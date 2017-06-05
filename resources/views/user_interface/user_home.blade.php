@extends('user_interface.layouts.user_header')

@section('content')
	<!-- CONTENT -->

	<!-- Newest Post -->
	<div class="codes agileitsbg2">
		<div class="container">
			<div id="newest_post" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('user.new_post')}}">
					<button class="button"><span>Newest Posts</span></button>
				</a><br><br><br>
				<h2><p class="agiletext-border agiletext-style">Newest Article...</p></h2>
				<?php $no=0;?>
					@foreach($newest_post as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</h4>
								<!--- If audio then show audio-->
								<div class="{{($detail->type=="audio")? 'hidden':''}}">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								</div>
								<div class="{{($detail->type=="audio")? '':'hidden'}} home_audio">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
									<?php $audio_path= DB::table('listenings')->where('tittle',$detail->tittle)->get();?>
									@foreach($audio_path as $data)
										<audio id="audioPlayer" class="audioPlayer" height="30" controls="controls">
										    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$data->audio_path}}" />
										    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$data->audio_path}}"/>
										</audio>
									@endforeach
								</div>
								<!--- If audio then show audio-->
								<h4 align="center" ><a href="{{($detail->type=="audio")?  route('user.tittle_audio',[$detail->tittle]) : route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<!--- If audio then show audio-->
								<div class="{{($detail->type=="audio")? 'hidden':''}}">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								</div>
								<div class="{{($detail->type=="audio")? '':'hidden'}} home_audio_5">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
									<?php $audio_path= DB::table('listenings')->where('tittle',$detail->tittle)->get();?>
									@foreach($audio_path as $data)
										<audio id="audioPlayer" class="audioPlayer5" height="30" controls="controls">
										    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$data->audio_path}}" />
										    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$data->audio_path}}"/>
										</audio>
									@endforeach
								</div>
								<!--- If audio then show audio-->
								<h4 align="center" ><a href="{{($detail->type=="audio")?  route('user.tittle_audio',[$detail->tittle]) : route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 col-xs-3 w3ltext-grids md_3 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<!--- If audio then show audio-->
								<div class="{{($detail->type=="audio")? 'hidden':''}}">
									<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								</div>
								<div class="{{($detail->type=="audio")? '':'hidden'}} home_audio_3">
									<?php $audio_path= DB::table('listenings')->where('tittle',$detail->tittle)->get();?>
									@foreach($audio_path as $data)
										<audio id="audioPlayer" class="audioPlayer3" height="30" controls="controls">
										    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$data->audio_path}}" />
										    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$data->audio_path}}"/>
										</audio>
									@endforeach
								</div>
								<!--- If audio then show audio-->
								<h4 align="center" ><a href="{{($detail->type=="audio")?  route('user.tittle_audio',[$detail->tittle]) : route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
					@endforeach
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>

	<!-- Listening -->
	<div class="codes agileitsbg3">
		<div class="container">
			<div id="listening_cate" class="grid_3 grid_5 w3-agileits">
			<button class="button pull-right" id="article_choose"><span>View Article</span></button>
			<button class="button pull-right" id="practice_choose" ><span>View Audio</span></button>

		<!-- About -->
		<div id="practice">
			<a href="{{route('user.practice_listening')}}">
				<button class="button"><span>View More Audio</span></button>
			</a><br><br><br>
			<h2><p class="agiletext-border agiletext-style">Practice Listening...</p></h2>
			<?php $no=0;?>
			@foreach($audio as $audio)
			<?php $no++;?>
				@if($no==1)
					<div class="col-md-10 col-md-offset-1 md_10 desktop">
						<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($audio->tittle))!!}</h4>
						<p align="center" class="overflow" >{!!remove_dash(htmlspecialchars_decode($audio->introduce))!!}</p>
						<div class="home_audio">
							<audio id="audioPlayer" class="audioPlayer" height="30" controls="controls">
							    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$audio->audio_path}}" />
							    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$audio->audio_path}}"/>
							</audio>
						</div>
						<h4 align="center"><a href="{{route('user.tittle_audio',[$audio->tittle])}}">Continue read..</a></h4>
					</div>
				@endif
				@if($no>=2 && $no<=3)
					<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
						<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($audio->tittle))!!} </h4>
						<p align="center" class="overflow" >{!!remove_dash(htmlspecialchars_decode($audio->introduce))!!}</p>
						<div class="home_audio_5">
							<audio id="audioPlayer" class="audioPlayer5" height="30" controls="controls">
							    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$audio->audio_path}}" />
							    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$audio->audio_path}}"/>
							</audio>
						</div>
						<h4 align="center"><a href="{{route('user.tittle_audio',[$audio->tittle])}}">Continue read..</a></h4>
					</div>
				@endif
				@if($no>=4 && $no<=6)
					<div class="col-md-3 col-sm-3 col-xs-3 w3ltext-grids md_3 desktop">
						<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($audio->tittle))!!} </h4>
						<div class="home_audio_3">
							<audio id="audioPlayer" class="audioPlayer3" height="30" controls="controls">
							    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$audio->audio_path}}" />
							    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$audio->audio_path}}"/>
							</audio>
						</div>
						<h4 align="center"><a href="{{route('user.tittle_audio',[$audio->tittle])}}">Continue read..</a></h4>
					</div>
				@endif
			@endforeach
		</div>
		<!-- /About -->
		<!-- Contact -->
		<div id="article">
				<a href="{{route('user.listening')}}">
					<button class="button"><span>View More Article</span></button>
				</a><br><br><br>
				<h2><p class="agiletext-border agiletext-style">Article Listening...</p></h2>
				<?php $no=0;?>
					@foreach($listening_article as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</h4>
								<p align="center" class="overflow" >{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow" >{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 col-xs-3 w3ltext-grids md_3 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
					@endforeach
		</div>
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>


	<!-- Reading -->
	<div class="codes agileitsbg4">
		<div class="container">
			<div id="reading_cate" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('user.reading')}}">
					<button class="button"><span>Reading</span></button>
				</a><br><br><br>

				<h2><p class="agiletext-border agiletext-style">Listening articles...</p></h2>
					<?php $no=0;?>
					@foreach($reading_article as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 col-xs-3 w3ltext-grids md_3 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
					@endforeach
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>

	<!-- writing -->
	<div class="codes agileitsbg5">
		<div class="container">
			<div id="writing_cate" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('user.writing')}}">
					<button class="button"><span>Writing</span></button>
				</a><br><br><br>

				<h2><p class="agiletext-border agiletext-style">Writing articles...</p></h2>
				<?php $no=0;?>
					@foreach($writing_article as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 desktop">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 col-xs-3 w3ltext-grids md_3 desktop">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
							</div>
						@endif
					@endforeach
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>

@stop

@yield('footer')