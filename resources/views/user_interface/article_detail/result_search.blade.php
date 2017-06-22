@extends('user_interface.layouts.user_header')

@section('content')
<div class="codes agileitsbg5">
	<div class="container">
		<div id="" class="grid_3 grid_5 w3-agileits">
			<h2><p class="agiletext-border agiletext-style">Searching results...</p></h2>
			<div class="col-md-8 col-md-offset-1">
				<h3 ><p class="agiletext agiletext-style" style="color: #05288a;">{{$results->count()}} results found</p></h3>
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
				@endforeach
			<div class="clearfix"> </div>
			<script>$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})</script>
			Total Pages: {!! $results->lastPage() !!}

			<div class="pagination pull-right {{($results->lastPage()==0)?'hidden':''}}">
				<a href="{{$results->url(1)}}" class="{{($results->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
				<a href="{{$results->url($results->currentPage()-1)}}" class="{{($results->currentPage()==1) ? 'hidden':''}}">Prev</a>
				@for($i=1; $i<=$results->lastPage(); $i++)
					<a href="{{$results->url($i)}}" class="{{($results->currentPage()==$i)? 'active':''}}">{{$i}}</a>
				@endfor
				<a href="{{$results->url($results->currentPage()+1)}}" class="{{($results->currentPage()==$results->lastPage())?'hidden' : ''}}">Next</a>
				<a href="{{$results->url($results->lastPage())}}" class="{{($results->currentPage()==$results->lastPage())?'hidden' : ''}}">&raquo;</a>
			</div>
		</div>
	</div>
</div>
@stop