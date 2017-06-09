@extends('user_interface.layouts.user_header')

@section('content')
	<!-- CONTENT -->
	<!-- Newest Post -->
	<div class="codes agileitsbg2">
	<!-- Like Share -->
		<div style="padding-left: 130px; padding-bottom: 20px;" class="facebook_button">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
		<div style="padding-left: 130px; padding-bottom: 20px;" class="facebook_button1">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
	<!-- End Like Share -->
	@if(Session::has('error_search'))
		{{Session::get('error_search')}}
	@endif
		<div class="container">
			<div id="newest_post" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('new_post')}}">
					<button class="button"><span>Newest Posts</span></button>
				</a><br><br><br>
				<h2><p class="agiletext-border agiletext-style">Newest Article...</p></h2>
				<?php $no=0;?>
					@foreach($newest_post as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 level1">
								<div class="article_item_md10 level1_item">
									<div class="article_img_md10 level1_img">
										<img class="article_img_md10 img_thumbnail level1_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md10 level1_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_info_md10 level1_introduce">
										<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
									</div>
									<div class="article_type_md10 level1_type" align="center">
										@if($detail->type=="audio")
											<a class="label label_article" href="{{route('practice_listening')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="library")
											<a class="label label_article" href="{{route('library')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="reading")
											<a class="label label_article" href="{{route('listening')}}">{{$detail->type}}</a>
										@endif
										<i class="label label_date"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
									</div>
								</div>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 md_5 level2">
								<div class="article_item_md5 level2_item">
									<div class="article_img_md5 level2_img">
										<img class="article_img img_thumbnail level2_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md5 level2_info">
										<h3 align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_type_md5 level2_type" align="center">
										@if($detail->type=="audio")
											<a class="label label_article" href="{{route('practice_listening')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="library")
											<a class="label label_article" href="{{route('library')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="reading")
											<a class="label label_article" href="{{route('listening')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 md_3 level3">
								<div class="article_item_md3">
									<div class="article_img_md3">
										<img class=" img_thumbnail" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md3">
										<h4 align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h4>
									</div>
									<div class="article_type_md3">
										@if($detail->type=="audio")
											<a class="label label_article" href="{{route('practice_listening')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="library")
											<a class="label label_article" href="{{route('library')}}">{{$detail->type}}</a>
										@endif
										@if($detail->type=="reading")
											<a class="label label_article" href="{{route('listening')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
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


	<!-- Library -->
	<div class="codes agileitsbg3">
		<div class="container">
			<div id="library_cate" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('library')}}">
					<button class="button"><span>Knowledge Library </span></button>
				</a><br><br><br>

				<h2><p class="agiletext-border agiletext-style">Library...</p></h2>
				<?php $no=0;?>
					@foreach($library_article as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 level1">
								<div class="article_item_md10 level1_item">
									<div class="article_img_md10 level1_img">
										<img class="article_img_md10 img_thumbnail level1_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md10 level1_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</a></h3>
									</div>
									<div class="article_info_md10 level1_introduce">
										<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
									</div>
									<div class="article_type_md10 level1_type" align="center">
										@if($detail->type=="library")
											<a class="label label_article" href="{{route('library')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
							</div>
						@endif
						@if($no>=2 && $no<=5)
							<div class="col-sm-5 col-xs-5 md_5 level2">
								<div class="article_item_md5 level2_item">
									<div class="article_img_md5 level2_img">
										<img class="article_img img_thumbnail level2_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md5 level2_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</a></h3>
									</div>
									<div class="article_type_md5 level2_type" align="center">
										@if($detail->type=="library")
											<a class="label label_article" href="{{route('library')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
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
	<div class="codes agileitsbg4">
		<div class="container">
			<div id="listening_cate" class="grid_3 grid_5 w3-agileits">
				<!-- Audio -->
				<div id="practice">
					<a href="{{route('practice_listening')}}">
						<button class="button"><span>View More Audio</span></button>
					</a><br><br><br>
					<h2><p class="agiletext-border agiletext-style">Practice Listening...</p></h2>
					<?php $no=0;?>
					@foreach($audio as $audio)
						<?php $no++;?>
							@if($no==1)
								<div class="col-md-10 col-md-offset-1 md_10 level1">
									<div class="article_item_md10 level1_item">
										<div class="article_img_md10 level1_img">
											<img class="article_img_md10 img_thumbnail level1_img" src="/laravel1/storage/uploads/files/writing.jpg">
										</div>
										<div class="article_info_md10 level1_info">
											<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('tittle_audio',[tittle($audio->tittle)])}}">{!!remove_dash(htmlspecialchars_decode($audio->tittle))!!}</a></h3>
										</div>
										<div class="article_info_md10 level1_introduce">
											<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($audio->introduce))!!}</p>
										</div>
										<div class="article_type_md10 level1_type" align="center">
											<a class="label label_article" href="{{route('practice_listening')}}">audio</a>
										</div>
									</div>
								</div>
							@endif
							@if($no>=2 && $no<=5)
								<div class="col-sm-5 col-xs-5 md_5 level2">
									<div class="article_item_md5 level2_item">
										<div class="article_img_md5 level2_img">
											<img class="article_img img_thumbnail level2_img" src="/laravel1/storage/uploads/files/writing.jpg">
										</div>
										<div class="article_info_md5 level2_info">
											<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('tittle_audio',[tittle($audio->tittle)])}}">{!!remove_dash(htmlspecialchars_decode($audio->tittle))!!}</a></h3>
										</div>
										<div class="article_type_md5 level2_type" align="center">
											<a class="label label_article" href="{{route('practice_listening')}}">audio</a>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				<!-- /Audio -->
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>
	</div>


	<!-- Reading -->
	<div class="codes agileitsbg5">
		<div class="container">
			<div id="reading_cate" class="grid_3 grid_5 w3-agileits">
				<a href="{{route('reading')}}">
					<button class="button"><span>Reading</span></button>
				</a><br><br><br>

				<h2><p class="agiletext-border agiletext-style">Reading articles...</p></h2>
					<?php $no=0;?>
					@foreach($reading_article as $detail)
						<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 level1">
								<div class="article_item_md10 level1_item">
									<div class="article_img_md10 level1_img">
										<img class="article_img_md10 img_thumbnail level1_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md10 level1_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</a></h3>
									</div>
									<div class="article_info_md10 level1_introduce">
										<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!}</p>
									</div>
									<div class="article_type_md10 level1_type" align="center">
										@if($detail->type=="reading")
											<a class="label label_article" href="{{route('reading')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
							</div>
						@endif
						@if($no>=2 && $no<=5)
							<div class="col-sm-5 col-xs-5 md_5 level2">
								<div class="article_item_md5 level2_item">
									<div class="article_img_md5 level2_img">
										<img class="article_img img_thumbnail level2_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md5 level2_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!}</a></h3>
									</div>
									<div class="article_type_md5 level2_type" align="center">
										@if($detail->type=="reading")
											<a class="label label_article" href="{{route('reading')}}">{{$detail->type}}</a>
										@endif
									</div>
								</div>
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