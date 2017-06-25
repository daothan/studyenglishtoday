@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Knowledge Library</h3><br>
					@foreach($library as $detail)
						<div class="col-md-8 col-md-offset-1 md_8 each_page">
								<div class="article_item_md8_library each_page_item">
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
											<b class="label label_article"">{{$detail->type}}</b>
										@endif
										<i class="label label_date each_label"><b>{{$detail->created_at->format('d-m-Y')}}</b></i>
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
					Total Pages: {!! $library->lastPage() !!}
				</div>

				<div class="col-md-6 ">
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
			</div>
		</div>
	</div>

@stop