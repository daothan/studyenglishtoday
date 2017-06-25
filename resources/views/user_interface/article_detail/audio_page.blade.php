@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Practice Listening</h3><br>
					@foreach($audio as $detail)
						<div class="col-md-8 col-md-offset-1 md_8 each_page">
								<div class="article_item_md8 each_page_item">
									<div class="article_info_md8 each_page_info">
										<h3 class="w3t-text" align="center"><a href="{{route('tittle_audio',[tittle($detail->tittle)])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_img_md8 each_page_img">
										<a href="{{route('tittle_audio',[tittle($detail->tittle)])}}">
											<img class="article_img_md8 img_thumbnail each_page_img" src="{{$detail->image_path}}">
										</a>
									</div>
									<div class="article_type_md8 each_page_type" align="center">
										<b class="label label_article">audio</b>
										<i class="label label_date"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
										<!-- Total words-->
										<div class="total_word">
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
				<div class="clearfix">
				</div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
				<div class="total_page col-md-3">
					Total Pages: {!! $audio->lastPage() !!}
				</div>

				<div class="col-md-6 ">
					<ul class="pagination">
	                    <li class="{{($audio->currentPage()==1) ? 'hidden':''}}">
	                    	<a href="{{$audio->url($audio->currentPage()-1)}}"><span>«</span></a>
	                    </li>
	                    <li class="{{($audio->currentPage()==1)?'hidden':''}}">
	                    	<a href="{{$audio->url(1)}}"><span>1</span></a>
	                    </li>
						<li class="{{($audio->currentPage()<=2)?'hidden':''}}">
							<span>...</span>
						</li>
						@for($i=1; $i<=$audio->lastPage(); $i++)
							<li class="{{($audio->currentPage()==$i)? 'active':'hidden'}}">
								<a href="{{$audio->url($i)}}" ><span>{{$i}}</span></a>
							</li>
						@endfor
						<li class="{{($audio->currentPage()>=$audio->lastPage()-1)?'hidden' : ''}}">
							<span>...</span>
						</li>
						<li class="{{($audio->currentPage()>=$audio->lastPage())?'hidden':''}}">
							<a href="{{$audio->url($audio->lastPage())}}"><span>{{$audio->lastPage()}}</span></a>
						</li>
						<li class="{{($audio->currentPage()==$audio->lastPage())?'hidden' : ''}}">
							<a href="{{$audio->url($audio->currentPage()+1)}}"><span>»</span></a>
						</li>
       				</ul>
				</div>
			</div>
		</div>
	</div>
@stop