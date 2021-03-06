@extends('user_interface.layouts.user_header')
@section('content')
 <main role="main-inner-wrapper" class="container">

            <div class="row" style="margin-top: 70px;">
            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " style="margin-bottom: 75px;">

                	<article role="pge-title-content" class="blog-header">

                    	<header>

                        	<h2 align="center"><span>Studyenglishtoday</span> Improve your English everyday</h2>

                        </header>

                    </article>

                    <ul class="grid-lod effect-2" id="grid">
						<?php $no=0;?>
						@foreach($topics as $detail)
						<?php $no++;?>
						@if($no<=3)

                        <li>
                            <section class="blog-content">

                            	<a href="{{route('tittle_audio',[tittle($detail->tittle)])}}">

                                <figure>

                                    <div class="post-date post-date-audio">

                                        <h4 align="center">Audio
										</h4 align="center">
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

                                    </div>
                                     <div class="post-date-right ">
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
									<div class="post-date-bottom">
										<?php
			                            $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
			                            $audio_type="";
			                            foreach($str as $str){
											 $audio_type = $str->audio_type;
			                            }
			                            ?>
			                            <p align="center">{{$audio_type}}</p>
			                        </div>
                                    <img class=" img_thumbnail  audio_post" src="../{{$detail->image_path}}">


                                </figure>

                                </a>

                                <article align="center">

                                    {{$detail->tittle}}

                                </article>

                            </section>
                            @endif
                        @endforeach
                        </li>
                    	</ul>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                	<ul class="grid-lod effect-2" id="grid">
                    	<?php $no=0;?>
						@foreach($topics as $detail)
						<?php $no++;?>
						@if(3<$no && $no<=7)
							<li>
                            <section class="blog-content">

                            	<a href="{{route('tittle_audio',[tittle($detail->tittle)])}}">

                                <figure>

                                    <div class="post-date post-date-audio">

                                        <h4 align="center">
			                            	Audio
										</h4>
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

                                    </div>
                                    <div class="post-date-right ">
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
									<div class="post-date-bottom">
										<?php
			                            $str = DB::table('listenings')->where('tittle',$detail->tittle)->get();
			                            $audio_type="";
			                            foreach($str as $str){
											 $audio_type = $str->audio_type;
			                            }
			                            ?>
			                            <p align="center">{{$audio_type}}</p>
			                        </div>
                                    <img class=" img_thumbnail  audio_post" src="../{{$detail->image_path}}">

                                </figure>

                                </a>

                                <article align="center">

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
					Total Pages: {!! $topics->lastPage() !!}
				</div>

				<div class=" ">
					<ul class="pagination">
	                    <li class="{{($topics->currentPage()==1) ? 'hidden':''}}">
	                    	<a href="{{$topics->url($topics->currentPage()-1)}}"><span>«</span></a>
	                    </li>
	                    <li class="{{($topics->currentPage()==1)?'hidden':''}}">
	                    	<a href="{{$topics->url(1)}}"><span>1</span></a>
	                    </li>
						<li class="{{($topics->currentPage()<=2)?'hidden':''}}">
							<span>...</span>
						</li>
						@for($i=1; $i<=$topics->lastPage(); $i++)
							<li class="{{($topics->currentPage()==$i)? 'active':'hidden'}}">
								<a href="{{$topics->url($i)}}" ><span>{{$i}}</span></a>
							</li>
						@endfor
						<li class="{{($topics->currentPage()>=$topics->lastPage()-1)?'hidden' : ''}}">
							<span>...</span>
						</li>
						<li class="{{($topics->currentPage()>=$topics->lastPage())?'hidden':''}}">
							<a href="{{$topics->url($topics->lastPage())}}"><span>{{$topics->lastPage()}}</span></a>
						</li>
						<li class="{{($topics->currentPage()==$topics->lastPage())?'hidden' : ''}}">
							<a href="{{$topics->url($topics->currentPage()+1)}}"><span>»</span></a>
						</li>
       				</ul>
				</div>

        </main>
@stop