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
                        @foreach($library as $detail)
                        <?php $no++;?>
                        @if($no%2==0)

                        <li>
                            <section class="blog-content">

                            	<a href="{{route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure>

                                    <div class="post-date">

                                        <h4 align="center">library
										</h4 align="center">
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

                                    </div>
                                    <img class=" img_thumbnail  library_post" src="{{$detail->image_path}}">


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
						@foreach($library as $detail)
						<?php $no++;?>
						@if($no%2!=0)
                        <li>
                            <section class="blog-content">

                            	<a href="{{route('detail_article',[$detail->type,$detail->alias])}}">

                                <figure>

                                    <div class="post-date">

                                        <h4 align="center">
			                            	library
										</h4>
			                            <h4 align="center">{{$detail->created_at->format('d-m-Y')}}</h4>

                                    </div>
                                    <img class=" img_thumbnail  library_post" src="{{$detail->image_path}}">

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
					Total Pages: {!! $library->lastPage() !!}
				</div>

				<div class=" ">
					<ul class="pagination">
	                    <li class="{{($library->currentPage()==1) ? 'hidden':''}}">
	                    	<a href="{{$library->url($library->currentPage()-1)}}"><span>«</span></a>
	                    </li>
	                    <li class="{{($library->currentPage()==1)?'hidden':''}}">
	                    	<a href="{{$library->url(1)}}"><span>1</span></a>
	                    </li>
						<li class="{{($library->currentPage()<=2)?'hidden':''}}">
							<span>...</span>
						</li>
						@for($i=1; $i<=$library->lastPage(); $i++)
							<li class="{{($library->currentPage()==$i)? 'active':'hidden'}}">
								<a href="{{$library->url($i)}}" ><span>{{$i}}</span></a>
							</li>
						@endfor
						<li class="{{($library->currentPage()>=$library->lastPage()-1)?'hidden' : ''}}">
							<span>...</span>
						</li>
						<li class="{{($library->currentPage()>=$library->lastPage())?'hidden':''}}">
							<a href="{{$library->url($library->lastPage())}}"><span>{{$library->lastPage()}}</span></a>
						</li>
						<li class="{{($library->currentPage()==$library->lastPage())?'hidden' : ''}}">
							<a href="{{$library->url($library->currentPage()+1)}}"><span>»</span></a>
						</li>
       				</ul>
				</div>

        </main>
@stop