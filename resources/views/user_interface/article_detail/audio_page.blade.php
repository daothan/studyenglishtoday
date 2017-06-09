@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Practice Listening</h3><br>
					@foreach($audio as $detail)
						<div class="col-md-8 col-md-offset-1 md_8 each_page">
								<div class="article_item_md8 each_page_item">
									<div class="article_img_md8 each_page_img">
										<img class="article_img_md8 img_thumbnail each_page_img" src="/laravel1/storage/uploads/files/writing.jpg">
									</div>
									<div class="article_info_md8 each_page_info">
										<h3 class="w3t-text" align="center" style="margin-bottom: 30px;"><a href="{{($detail->type=="audio")?  route('tittle_audio',[tittle($detail->tittle)]) : route('detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h3>
									</div>
									<div class="article_type_md8 each_page_type" align="center">
										<a class="label label_article" href="{{route('practice_listening')}}">audio</a>
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
					Total Pages: {!! $audio->lastPage() !!}
					<div class="pagination pull-right {{($audio->lastPage()==0)?'hidden':''}}">
						<a href="{{$audio->url(1)}}" class="{{($audio->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$audio->url($audio->currentPage()-1)}}" class="{{($audio->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$audio->lastPage(); $i++)
							<a href="{{$audio->url($i)}}" class="{{($audio->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$audio->url($audio->currentPage()+1)}}" class="{{($audio->currentPage()==$audio->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$audio->url($audio->lastPage())}}" class="{{($audio->currentPage()==$audio->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>
@stop