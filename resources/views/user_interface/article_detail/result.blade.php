@extends('user_interface.layouts.user_header')

@section('content')
<div class="form_search">
	<form >
	  <input type="text" name="search" placeholder="Search more..">
	</form>
</div>
<div class="codes agileitsbg5">
		<div class="container">
			<div id="reading_cate" class="grid_3 grid_5 w3-agileits">
				<h2><p class="agiletext-border agiletext-style">Searching results...</p></h2>

					@foreach($results as $results)
						<div class="col-md-10 col-md-offset-1 md_10 ">
							<h4 class="w3t-text" align="center"><a href="{{route('detail_article',[$results->type,$results->alias])}}">{!!remove_dash(htmlspecialchars_decode($results->tittle))!!}</a></h4>
							<p align="center" class="overflow">{!!remove_dash(htmlspecialchars_decode($results->introduce))!!}</p>
						</div>
					@endforeach
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script>
			</div>
		</div>

@stop