@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Knowledge Library</h3><br>
					@foreach($library as $detail)
						<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
							<h4 class="w3t-text"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </a></h4>
							<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
							<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
						</div>
					@endforeach
				<div class="clearfix">
				</div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
					Total Pages: {!! $library->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$library->url(1)}}" class="{{($library->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$library->url($library->currentPage()-1)}}" class="{{($library->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$library->lastPage(); $i++)
							<a href="{{$library->url($i)}}" class="{{($library->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$library->url($library->currentPage()+1)}}" class="{{($library->currentPage()==$library->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$library->url($library->lastPage())}}" class="{{($library->currentPage()==$library->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>

@stop