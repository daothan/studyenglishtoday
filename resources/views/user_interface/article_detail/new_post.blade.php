@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Newest Posts</h3><br>
					@foreach($new_post as $detail)
						<div class="col-md-8 col-md-offset-3 md_8 each_page">
							<div class="article_item_md8 each_page_item">
								<div class="article_img_md8 each_page_img">
									<img class="article_img_md8 img_thumbnail each_page_img" src="/laravel1/storage/uploads/files/writing.jpg">
								</div>
								<div class="article_info_md8 each_page_info">
									<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
								</div>
								<div class="article_type_md8 each_page_type" align="center">
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
					@endforeach
				<div class="clearfix">
				</div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
					Total Pages: {!! $new_post->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$new_post->url(1)}}" class="{{($new_post->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$new_post->url($new_post->currentPage()-1)}}" class="{{($new_post->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$new_post->lastPage(); $i++)
							<a href="{{$new_post->url($i)}}" class="{{($new_post->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$new_post->url($new_post->currentPage()+1)}}" class="{{($new_post->currentPage()==$new_post->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$new_post->url($new_post->lastPage())}}" class="{{($new_post->currentPage()==$new_post->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>


@stop