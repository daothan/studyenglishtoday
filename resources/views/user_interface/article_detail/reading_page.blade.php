@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Reading</h3><br>
					@foreach($reading as $detail)
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
					Total Pages: {!! $reading->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$reading->url(1)}}" class="{{($reading->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$reading->url($reading->currentPage()-1)}}" class="{{($reading->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$reading->lastPage(); $i++)
							<a href="{{$reading->url($i)}}" class="{{($reading->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$reading->url($reading->currentPage()+1)}}" class="{{($reading->currentPage()==$reading->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$reading->url($reading->lastPage())}}" class="{{($reading->currentPage()==$reading->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>

@stop