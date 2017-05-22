@extends('user_interface.layouts.user_header')

@section('content')

	<!-- CONTENT -->
	<!-- About -->
	<div class="codes agileitsbg1">
		<div class="container">
			<div id="about" class="grid_3 grid_5 w3-agileits">

				<button class="button"><span>About Us </span></button>
				<br><br><br>

				<h3 align="center">We have supported many userful English skills helping you could improve your English by yourself.</h2>
				<div class="col-md-9 col-md-offset-2 contact-w3lsright w3llist-grids-btm2">
					<h6><span>Free English </span>where you can improve your English skills . </h6>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Visit Us</h5>
							<p>Cau Giay district <br>Ha Noi capital</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row w3-agileits">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:info@example.com"> daothan1211@gmail.com</a></p>
							<p><a href="mailto:info@example.com"> thankthn@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Call Us</h5>
							<p>+84 989 677 020<br></p>
							<p>+84 943 725 418</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Working Hours</h5>
							<p>Mon - Fri : 8:00 am to 10:30 pm<br>
							Sat - Sun : 9:00 am to 11:30 pm</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>

	<!-- Newest Post -->
	<div class="codes agileitsbg2">
		<div class="container">
			<div id="newest_post" class="grid_3 grid_5 w3-agileits">
				<a href="">
					<button class="button"><span>Newest Posts</span></button>
				</a>
				<p id="test_content">
					<a href="">{!!htmlspecialchars_decode($last_post->tittle)!!}</a>
					<div style="margin: auto; width: 750px;">
						<p align="center">{!!htmlspecialchars_decode($last_post->introduce)!!}<a href="">Continue read...</a></p>
					</div>
				</p>

				<h2><p class="agiletext-border agiletext-style">More articles.</p></h2>
				<?php $x=0; ?>
				@foreach($detail as $detail)
				<?php $x++;?>
				<?php if($x<5){?>

				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<div style="margin:10px 50px 10px 50px; width: 400px; height: 200px; overflow: auto;">
						<a href=""><h4 class="w3t-text"> {!!convert_vi_to_en(htmlspecialchars_decode($detail->tittle))!!} </h4></a>
						<p>{!!convert_vi_to_en(htmlspecialchars_decode($detail->introduce))!!} <a href="">Continue read...</a></p>
					</div>
				</div>
				<?php } ?>
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

				<?php $x=0; ?>
				@foreach($listening_article as $detail)
				<?php $x++;?>
				<?php if($x<5){?>

				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<div style="margin:10px 50px 10px 50px; width: 400px; height: 200px; overflow: auto;">
						<a href=""><h4 class="w3t-text"> {!!convert_vi_to_en(htmlspecialchars_decode($detail->tittle))!!} </h4></a>
						<p>{!!convert_vi_to_en(htmlspecialchars_decode($detail->introduce))!!} <a href="">Continue read...</a></p>
					</div>
				</div>
				<?php } ?>
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

				<h2><p class="agiletext-border agiletext-style">Reading articles...</p></h2>

				<?php $x=0; ?>
				@foreach($reading_article as $detail)
				<?php $x++;?>
				<?php if($x<5){?>

				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<div style="margin:10px 50px 10px 50px; width: 400px; height: 200px; overflow: auto;">
						<a href=""><h4 class="w3t-text"> {!!convert_vi_to_en(htmlspecialchars_decode($detail->tittle))!!} </h4></a>
						<p>{!!convert_vi_to_en(htmlspecialchars_decode($detail->introduce))!!} <a href="">Continue read...</a></p>
					</div>
				</div>
				<?php } ?>
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

				<?php $x=0; ?>
				@foreach($writing_article as $detail)
				<?php $x++;?>
				<?php if($x<5){?>

				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<div style="margin:10px 50px 10px 50px; width: 400px; height: 200px; overflow: auto;">
						<a href=""><h4 class="w3t-text"> {!!convert_vi_to_en(htmlspecialchars_decode($detail->tittle))!!} </h4></a>
						<p>{!!convert_vi_to_en(htmlspecialchars_decode($detail->introduce))!!} <a href="">Continue read...</a></p>
					</div>
				</div>
				<?php } ?>
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