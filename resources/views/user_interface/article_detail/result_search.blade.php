@extends('user_interface.layouts.user_header')

@section('content')
<div class="codes agileitsbg5">
	<div class="container">
		<div id="" class="grid_3 grid_5 w3-agileits">
			<h2><p class="agiletext-border agiletext-style">Newest Article...</p></h2>
				@foreach($results as $detail)
					<div class="col-md-8 col-md-offset-3 md_8 each_page">
						<div class="article_item_md8 each_page_item">
							<div class="article_img_md8 each_page_img">
								<img class="article_img_md8 img_thumbnail each_page_img" src="{{$detail->image_path}}">
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