@extends('user_interface.layouts.user_header')

@section('content')
	<!-- CONTENT -->

	<!-- Newest Post -->
	<div class="codes agileitsbg2">
		<div class="container">
			<div id="newest_post" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('user.new_post')}}">
					<button class="button"><span>Newest Posts</span></button>
				</a>
				<?php $no=0;?>
					@foreach($detail as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
							<div class="col-md-10">
								<h2><p class="agiletext-border agiletext-style">More articles..</p></h2>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-6 col-xs-6 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="">Continue read..</a></h4>
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
				<a href="{{route('user.listening')}}">
					<button class="button"><span>Listening</span></button>
				</a><br><br><br>

				<h2><p class="agiletext-border agiletext-style">Listening articles...</p></h2>
					<?php $no=0;?>
					@foreach($listening_article as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-6 col-xs-6 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="">Continue read..</a></h4>
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
							<div class="col-md-10 col-md-offset-1">
								<h4 class="w3t-text" align="center">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-6 col-xs-6 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="">Continue read..</a></h4>
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
							<div class="col-md-10 col-md-offset-1">
								<h4 class="w3t-text" align="center" >{!!remove_dash(htmlspecialchars_decode($detail->alias))!!}</h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-6 col-xs-6 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
								<h4 align="center"><a href="">Continue read..</a></h4>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
								<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->alias))!!} </h4>
								<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
								<h4 align="center"><a href="">Continue read..</a></h4>
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