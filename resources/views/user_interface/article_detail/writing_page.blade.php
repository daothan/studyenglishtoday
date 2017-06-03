@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Writing</h3><br>
					@foreach($writing as $detail)
						<div class="col-sm-5 col-xs-5 w3ltext-grids md_5 desktop">
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
					Total Pages: {!! $writing->lastPage() !!}

					<div class="pagination pull-right">
						<a href="{{$writing->url(1)}}" class="{{($writing->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
						<a href="{{$writing->url($writing->currentPage()-1)}}" class="{{($writing->currentPage()==1) ? 'hidden':''}}">Prev</a>
						@for($i=1; $i<=$writing->lastPage(); $i++)
							<a href="{{$writing->url($i)}}" class="{{($writing->currentPage()==$i)? 'active':''}}">{{$i}}</a>
						@endfor
						<a href="{{$writing->url($writing->currentPage()+1)}}" class="{{($writing->currentPage()==$writing->lastPage())?'hidden' : ''}}">Next</a>
						<a href="{{$writing->url($writing->lastPage())}}" class="{{($writing->currentPage()==$writing->lastPage())?'hidden' : ''}}">&raquo;</a>
					</div>
			</div>
		</div>
	</div>

@stop