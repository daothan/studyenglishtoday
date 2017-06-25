@extends('user_interface.layouts.user_header')

@section('content')
	<!-- CONTENT -->
	<!-- Newest Post -->
	<div class="codes agileitsbg5">
	<!-- Like Share -->
		<div style="padding-left: 120px; padding-bottom: 20px; margin-top: 10px;" class="facebook_button">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
		<div style="padding-left: 120px; padding-bottom: 20px; margin-top: 10px;" class="facebook_button1">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
	<!-- End Like Share -->
		@if(Session::has('error_search'))
			{{Session::get('error_search')}}
		@endif
		<div class="container">
			<div id="newest_post" class="grid_3 grid_5 w3-agileits">
				<br>
				<h2><p class="agiletext-border agiletext-style">Newest Article...</p></h2><br>
				<?php $no=0;?>
					@foreach($newest_post as $detail)
					<?php $no++;?>
						@if($no==1)
							<div class="col-md-10 col-md-offset-1 md_10 level1">
								<div class="article_item_md10 level1_item">
									<div class="article_info_md10 level1_info">
										<h3 class="w3t-text" align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_img_md10 level1_img">
										<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">
											<img class="article_img_md8 img_thumbnail each_page_img" src="{{$detail->image_path}}">
										</a>
									</div>
									<div class="article_type_md10 level1_type" align="center">
										@if($detail->type=="audio")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="library")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="reading")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										<i class="label label_date"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
										<!-- Total words-->
										<div class="{{($detail->type=="audio") ? 'total_word':'hidden'}}">
											<?php
			                                $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
			                                $dictation="";
			                                $length="";
			                                foreach($str as $str){
												$dictation = $str->dictation;
												$length    = $str->audio_length;
			                                }
			                                $total = str_word_count($dictation);
				                            ?>
											<span align="center" class="text-success total_word_font" style="padding-right: 15px;">Length: <?php echo $length; ?></span>
											<span align="center" class="text-success total_word_font">Total words: <?php echo $total; ?></span>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if($no>=2 && $no<=3)
							<div class="col-sm-5 col-xs-5 md_5 level2">
								<div class="article_item_md5 level2_item">
									<div class="article_info_md5 level2_info">
										<h3 align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_img_md5 level2_img">
										<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">
											<img class="article_img img_thumbnail level2_img" src="{{$detail->image_path}}">
										</a>
									</div>
									<div class="article_type_md5 level2_type" align="center">
										@if($detail->type=="audio")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="library")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="reading")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										<i class="label label_date" style="margin-top: 20px;"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
										<!-- Total words-->
										<div class="{{($detail->type=="audio") ? 'total_word':'hidden'}}">
											<?php
			                                $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
			                                $dictation="";
			                                $length="";
			                                foreach($str as $str){
												$dictation = $str->dictation;
												$length    = $str->audio_length;
			                                }
			                                $total = str_word_count($dictation);
				                            ?>
											<span align="center" class="text-success total_word_font" style="padding-right: 15px;">Length: <?php echo $length; ?></span>
											<span align="center" class="text-success total_word_font">Total words: <?php echo $total; ?></span>
										</div>
									</div>
								</div>
							</div>
						@endif
						@if($no>=4 && $no<=6)
							<div class="col-md-3 col-sm-3 md_3 level3">
								<div class="article_item_md3">
									<div class="article_info_md3">
										<h4 align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h4>
									</div>
									<div class="article_img_md3">
										<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">
											<img class=" img_thumbnail" src="{{$detail->image_path}}">
										</a>
									</div>
									<div class="article_type_md3">
										@if($detail->type=="audio")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="library")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										@if($detail->type=="reading")
											<b class="label label_article">{{$detail->type}}</b>
										@endif
										<i class="label label_date"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
										<!-- Total words-->
										<div class="{{($detail->type=="audio") ? 'total_word':'hidden'}}">
											<?php
			                                $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
			                                $dictation="";
			                                $length="";
			                                foreach($str as $str){
												$dictation = $str->dictation;
												$length    = $str->audio_length;
			                                }
			                                $total = str_word_count($dictation);
				                            ?>
											<span align="center" class="text-success total_word_font" style="padding-right: 15px;">Length: <?php echo $length; ?></span>
											<span align="center" class="text-success total_word_font">Total words: <?php echo $total; ?></span>
										</div>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				<div class="clearfix">
				</div>
					<div class="view_more">
						<a href="{{route('new_post')}}">
							<button class="button"><span>View more...</span></button>
						</a>
					</div>
			</div>
		</div>
	</div>


@stop

@yield('footer')