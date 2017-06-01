@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Newest Posts</h3><br>
					@foreach($new_post as $detail)
						<div class="col-sm-6 col-xs-6 w3ltext-grids">
							<h4 class="w3t-text">{!!remove_dash(htmlspecialchars_decode($detail->tittle))!!} </h4>
							<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($detail->introduce))!!} </p>
							<h4 align="center"><a href="{{route('user.detail_article',[$detail->type,$detail->alias])}}">Continue read..</a></h4>
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