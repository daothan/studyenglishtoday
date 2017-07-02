@extends('user_interface.layouts.user_header')

@section('content')
<div class="codes agileitsbg5">
	<div class="container result_container">
		<div class="grid_3 grid_5 w3-agileits result_grid" >
			<h2><p class="agiletext-border agiletext-style col-md-8 col-md-offset-1">Searching results...</p></h2>
			<div class="{{$results_count== $total_post ? '':'hidden'}} search_error col-md-12">
				<div class="col-md-offset-4">
					Opp! Please enter somethings ...
				</div>
			</div>
			<div class="{{$results_count==$total_post ? 'hidden':''}}">
				<div class="col-md-8 col-md-offset-1">
					<h3 ><p style="color: #05288a;">{{$results_count}} results found</p></h3>
				</div>
				@foreach($results as $detail)
					<div class="col-md-8 col-md-offset-3 md_8 each_page">
						<div class="article_item_md8 each_page_item">
							<div class="article_info_md8 each_page_info">
								<h3 class="w3t-text" align="center"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
							</div>
							<div class="article_img_md8 each_page_img">
								<a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">
									<img class="article_img_md8 img_thumbnail each_page_img" src="{{$detail->image_path}}">
								</a>
							</div>
							<div class="article_type_md8 each_page_type" align="center">
								@if($detail->type=="audio")
									<b class="label label_audio">{{$detail->type}}</b>
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
				@endforeach
			</div>
			<div class="clearfix"> </div>
			<script>$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})</script>
			<div class="{{$results_count==$total_post ? 'hidden':''}} {{$results_count==0 ? 'hidden' :''}}">
				<div class="total_page col-md-3">
					Total Pages: {!! $results->lastPage() !!}
				</div>

				<div class="">
					<ul class="pagination">
	                    <li class="{{($results->currentPage()==1) ? 'hidden':''}}">
	                    	<a href="{{$results->appends(Request::only('search'))->url($results->currentPage()-1)}}"><span>«</span></a>
	                    </li>
	                    <li class="{{($results->currentPage()==1)?'hidden':''}}">
	                    	<a href="{{$results->appends(Request::only('search'))->url(1)}}"><span>1</span></a>
	                    </li>
						<li class="{{($results->currentPage()<=2)?'hidden':''}}">
							<span>...</span>
						</li>
						@for($i=1; $i<=$results->lastPage(); $i++)
							<li class="{{($results->currentPage()==$i)? 'active':'hidden'}}">
								<a href="{{$results->url($i)}}" ><span>{{$i}}</span></a>
							</li>
						@endfor
						<li class="{{($results->currentPage()>=$results->lastPage()-1)?'hidden' : ''}}">
							<span>...</span>
						</li>
						<li class="{{($results->currentPage()>=$results->lastPage())?'hidden':''}}">
							<a href="{{$results->appends(Request::only('search'))->url($results->lastPage())}}"><span>{{$results->lastPage()}}</span></a>
						</li>
						<li class="{{($results->currentPage()==$results->lastPage())?'hidden' : ''}}">
							<a href="{{$results->appends(Request::only('search'))->url($results->currentPage()+1)}}"><span>»</span></a>
						</li>
	   				</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@stop