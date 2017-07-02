@extends('user_interface.layouts.user_header')
@section('content')
		<main role="main-inner-wrapper" class="container">

            <div class="row" style="margin-top: 70px;">
            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " style="margin-bottom:75px;">

                	<article role="pge-title-content" class="blog-header">

                    	<header>

                        	<h2><span>Studyenglishtoday</span> Improve your English everyday</h2>

                        </header>

                    </article>

                    <ul class="grid-lod effect-2" id="grid">
						<?php $no=0;?>
						@foreach($new_post as $detail)
						<?php $no++;?>
						@if($no%2==0)

                        <li>
                            <section class="blog-content" >

                            	<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure style="{{$detail->type=="audio" ? 'background-color: rgba(157, 0, 255, 0.81);' : 'background-color: rgba(42, 78, 123, 0.55)'}}">

                                    <div class="post-date {{$detail->type=="audio" ? 'post-date-audio':''}}">

                                        <h4 align="center">
				                            @if($detail->type=="audio")
												Audio
											@endif
											@if($detail->type=="library")
												Library
											@endif
										</h4 align="center">
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

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
			                            <h4 align="center">Length <?php echo $length; ?></h4>
			                            <h4 align="center">Total words <?php echo $total; ?></h4>
			                        </div>

                                    <img class=" img_thumbnail  new_post" src="{{$detail->image_path}}">


                                </figure>

                                </a>

                                <article>

                                    {{$detail->tittle}}

                                </article>

                            </section>
                        </li>
                            @endif
                        @endforeach
                    	</ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                	<ul class="grid-lod effect-2" id="grid">

                 	<?php $no=0;?>
						@foreach($new_post as $detail)
						<?php $no++;?>
						@if($no%2!=0)
						<li>
                            <section class="blog-content">

                            	<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure style="{{$detail->type=="audio" ? 'background-color: rgba(157, 0, 255, 0.81);' : 'background-color: rgba(42, 78, 123, 0.55)'}}">

                                    <div class="post-date {{$detail->type=="audio" ? 'post-date-audio':''}}">

                                        <h4 align="center">
			                            	@if($detail->type=="audio")
												Audio
											@endif
											@if($detail->type=="library")
												Library
											@endif
										</h4>
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

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
			                            <h4 align="center">Length <?php echo $length; ?></h4>
			                            <h4 align="center">Total words <?php echo $total; ?></h4>
			                        </div>

                                    <img class=" img_thumbnail new_post" src="{{$detail->image_path}}">

                                </figure>

                                </a>

                                <article>

                                    {{$detail->tittle}}

                                </article>

                            </section>
                            </li>
                            @endif
                            @endforeach
                    </ul>

                </div>

            </div>
            <div class="total_page col-md-3">
					Total Pages: {!! $new_post->lastPage() !!}
				</div>

				<div class=" ">
					<ul class="pagination">
	                    <li class="{{($new_post->currentPage()==1) ? 'hidden':''}}">
	                    	<a href="{{$new_post->url($new_post->currentPage()-1)}}"><span>«</span></a>
	                    </li>
	                    <li class="{{($new_post->currentPage()==1)?'hidden':''}}">
	                    	<a href="{{$new_post->url(1)}}"><span>1</span></a>
	                    </li>
						<li class="{{($new_post->currentPage()<=2)?'hidden':''}}">
							<span>...</span>
						</li>
						@for($i=1; $i<=$new_post->lastPage(); $i++)
							<li class="{{($new_post->currentPage()==$i)? 'active':'hidden'}}">
								<a href="{{$new_post->url($i)}}" ><span>{{$i}}</span></a>
							</li>
						@endfor
						<li class="{{($new_post->currentPage()>=$new_post->lastPage()-1)?'hidden' : ''}}">
							<span>...</span>
						</li>
						<li class="{{($new_post->currentPage()>=$new_post->lastPage())?'hidden':''}}">
							<a href="{{$new_post->url($new_post->lastPage())}}"><span>{{$new_post->lastPage()}}</span></a>
						</li>
						<li class="{{($new_post->currentPage()==$new_post->lastPage())?'hidden' : ''}}">
							<a href="{{$new_post->url($new_post->currentPage()+1)}}"><span>»</span></a>
						</li>
       				</ul>
				</div>
@stop