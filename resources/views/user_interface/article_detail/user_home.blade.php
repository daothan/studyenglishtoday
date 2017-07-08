@extends('user_interface.layouts.user_header')

@section('content')

  <!-- main -->
<!-- Like Share -->
		<div style="padding-left: 120px; padding-bottom: 20px; margin-top: 80px;" class="facebook_button">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
		<div style="padding-left: 120px; padding-bottom: 20px; margin-top: 30px;" class="facebook_button1">
			<p align=""><i>Like and Share Website</i></p>
			<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
	<!-- End Like Share -->
        <main role="main-home-wrapper" class="container">
            <div class="row">
            	<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

                	<article role="pge-title-content">

                    	<header>

                        	<h2 align="center"><span>Studyenglishtoday</span> Improve your English everyday</h2>

                        </header>

                    </article>

                </section>
				@foreach($newest_post as $detail)
				@if($detail->id == $last_post)
                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid" >
                	<figure class="effect-oscar" style="{{$detail->type=="audio" ? 'background-color: rgba(157, 0, 255, 0.81);' : ''}}">
						<div class="post-date {{$detail->type=="audio" ? 'post-date-audio':''}}">
                            <h4>
                            	@if($detail->type=="audio")
									Audio
								@endif
								@if($detail->type=="library")
									Library
								@endif
							</h4>
                            <h4>{{$detail->created_at->format('d-m-Y')}}</h4>
                        </div>
                        <div class="post-date-right {{($detail->type=="audio") ? '':'hidden'}}">
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
                            <h4>Length <?php echo $length; ?></h4>
                            <h4>Total words <?php echo $total; ?></h4>
                        </div>
                        <div class="post-date-bottom {{($detail->type=="audio") ? '':'hidden'}}">
							<?php
                            $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
                            $audio_type="";
                            foreach($str as $str){
								echo $audio_type = $str->audio_type;
                            }
                            ?>
                        </div>
                        <div class="post-date-bottom {{($detail->type=="library") ? '':'hidden'}}">
                        	{{$detail->library_type}}
                        </div>
                    	<img class=" img_thumbnail " src="{{$detail->image_path}}">


                        <figcaption>

                        	<h3><a style="color: #fff" href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
							<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">View more</a>

                        </figcaption>

                    </figure>

                </section>
                @endif
				@endforeach

                <div class="clearfix"></div>

                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

                	<ul class="grid-lod effect-2" id="grid">
						<?php $no=0;?>
						@foreach($newest_post as $detail)
						<?php $no++;?>
						@if($no>=2 && $no%2==0 && $no<=6 )
                    	<li>

                        	<figure class="effect-oscar" style="{{$detail->type=="audio" ? 'background-color: rgba(157, 0, 255, 0.81);' : ''}}">
							<div class="post-date {{$detail->type=="audio" ? 'post-date-audio':''}}">
	                            <h4>
		                            @if($detail->type=="audio")
										Audio
									@endif
									@if($detail->type=="library")
										Library
									@endif
								</h4>
	                            <h4>{{$detail->created_at->format('d-m-Y')}}</h4>
	                        </div>
	                        <div class="post-date-right {{($detail->type=="audio") ? '':'hidden'}}">
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
	                            <h4>Length <?php echo $length; ?></h4>
	                            <h4>Total words <?php echo $total; ?></h4>
	                        </div>
	                        <div class="post-date-bottom {{($detail->type=="audio") ? '':'hidden'}}">
								<?php
	                            $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
	                            $audio_type="";
	                            foreach($str as $str){
									echo $audio_type = $str->audio_type;
	                            }
	                            ?>
	                        </div>
	                        <div class="post-date-bottom {{($detail->type=="library") ? '':'hidden'}}">
	                        	{{$detail->library_type}}
	                        </div>
                            <img class=" img_thumbnail " src="{{$detail->image_path}}">

                            <figcaption>

                                    <h3><a style="color: #fff" href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>

                                    <a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">View more</a>


                            </figcaption>

                        </figure>

                        </li>
                        @endif
                        @endforeach

                </section>


                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

                	<ul class="grid-lod effect-2" id="grid">
						<?php $no=0;?>
						@foreach($newest_post as $detail)
						<?php $no++;?>
						@if($no>=2 && $no%2!=0 && $no<=7 )

                    	<li>

                        	<figure class="effect-oscar" style="{{$detail->type=="audio" ? 'background-color: rgba(157, 0, 255, 0.81);' : ''}}">
								<div class="post-date {{$detail->type=="audio" ? 'post-date-audio':''}}">
		                            <h4>
		                            	@if($detail->type=="audio")
											Audio
										@endif
										@if($detail->type=="library")
											Library
										@endif
									</h4>
		                            <h4>{{$detail->created_at->format('d-m-Y')}}</h4>
		                        </div>
		                        <div class="post-date-right {{($detail->type=="audio") ? '':'hidden'}}">
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
		                            <h4>Length <?php echo $length; ?></h4>
		                            <h4>Total words <?php echo $total; ?></h4>
		                        </div>
		                        <div class="post-date-bottom {{($detail->type=="audio") ? '':'hidden'}}">
									<?php
		                            $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
		                            $audio_type="";
		                            foreach($str as $str){
										echo $audio_type = $str->audio_type;
		                            }
		                            ?>
		                        </div>
		                        <div class="post-date-bottom {{($detail->type=="library") ? '':'hidden'}}">
		                        	{{$detail->library_type}}
		                        </div>
	                            <img class="img_thumbnail " src="{{$detail->image_path}}">

	                             <figcaption>

	                                <h3><a style="color: #fff" href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>

	                                <a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">View more</a>

	                            </figcaption>
	                        </figure>

                        </li>
                        @endif
                        @endforeach
                    </ul>

                </section>

                <div class="clearfix"></div>
                <div class="view_more" style="float: right;">
					<a href="{{route('new_post')}}">
						<button class="button"><span>View more...</span></button>
					</a>
				</div>

            </div>

        </main>

    	<!-- main -->

@stop