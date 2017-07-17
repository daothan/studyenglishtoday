@extends('user_interface.layouts.user_header')
@section('content')
 <main role="main-inner-wrapper" class="container">

            <div class="row" style="margin-top: 70px;">
           	    <section class="col-md-6 col-md-offset-3" style="margin-top: 10px;">

                	<figure class="effect-oscar" style="background-color: rgba(36, 13, 162, 0.25);padding: 6px;">
                		<h4 style="font-size: 25px;color: rgba(192, 14, 224, 0.94); " align="center">Listening Topics</h4>
                		<div class="listening-topics">
                			<a href="{{route('library')}}"><button class="btn_user topic"><h4>All</h4></button></a>
	                    	<a href="{{route('library_topic','grammar')}}"><button class="btn_user topic"><h4>Grammar</h4></button></a>
                            <a href="{{route('library_topic','synonyms')}}"><button class="btn_user topic"><h4>Synonyms</h4></button></a>
                            <a href="{{route('library_topic','common-phrases')}}"><button class="btn_user topic" style="width: 120px;"><h4>Common Phrases</h4></button></a>
                            <a href="{{route('library_topic','other')}}"><button class="btn_user topic"><h4>Other</h4></button></a>
                		</div>

                    </figure>

                </section>
                <div class="clearfix"></div>
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

                            	<a href="{{route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure>

                                    <div class="post-date">

                                        <h4 align="center">
			                            	Library
										</h4>
			                            <?php
			                            $str = DB::table('details')->where('tittle',$detail->tittle)->get();
			                            $library_topic="";
			                            foreach($str as $str){
											 $library_topic = $str->library_type;
			                            }
			                            ?>
			                            <p align="center">{{$library_topic}}</p>

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

                            	<a href="{{route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure>

                                    <div class="post-date">

                                        <h4 align="center">
			                            	Library
										</h4>
			                            <?php
			                            $str = DB::table('details')->where('tittle',$detail->tittle)->get();
			                            $library_topic="";
			                            foreach($str as $str){
											 $library_topic = $str->library_type;
			                            }
			                            ?>
			                            <p align="center">{{$library_topic}}</p>

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