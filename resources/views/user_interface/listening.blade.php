	@extends('user_interface.user_home')

	@section('content')
	<div class="codes agileitsbg2">
		<div class="container">    
			<div id="listening" class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Content Text</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<b data-toggle="tooltip" data-placement="top" data-original-title="Bold Text"> Vivamus mattis </b> pharetra turpis, a <i data-toggle="tooltip" data-placement="top" data-original-title="italic Text"> scelerisque enim venenatis </i> luctus. <strong data-toggle="tooltip" data-placement="top" data-original-title="strong Text">Cras blandit</strong> dolor a <u data-toggle="tooltip" data-placement="top" data-original-title="Text underline">facilisis tincidunt</u>. Vivamus sed orci aliquam, aliquet tellus ut, ornare nunc. Praesent lacinia elit id libero pulvinar, sit amet faucibus felis ornare Pellentesque nulla lorem.</p>
				<p class="agiletext-style">Vivamus mattis pharetra turpis, a scelerisque enim venenatis luctus Cras blandit dolor a facilisis tincidunt. Vivamus sed orci aliquam, aliquet tellus ut, ornare nunc. Praesent lacinia elit id libero pulvinar, sit amet faucibus felis ornare Pellentesque nulla lorem.</p>
				<p class="agiletext-border agiletext-style">Lorem ipsum pharetra turpis, a scelerisque enim venenatis luctus Cras blandit dolor a facilisis tincidunt. Vivamus sed orci aliquam, aliquet tellus ut, ornare nunc. Praesent lacinia elit id libero pulvinar, sit amet faucibus felis ornare Pellentesque nulla lorem.</p>
				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<h4 class="w3t-text">Two equal columns </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis pharetra turpis, a scelerisque enim venenatis luctus.</p>
				</div>
				<div class="col-sm-6 col-xs-6 w3ltext-grids">
					<h4 class="w3t-text">Two equal columns </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis pharetra turpis, a scelerisque enim venenatis luctus.</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
					<h4 class="w3t-text">Three equal columns </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis pharetra.</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
					<h4 class="w3t-text">Three equal columns </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis pharetra turpis</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 w3ltext-grids">
					<h4 class="w3t-text">Three equal columns </h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis pharetra.</p>
				</div>
				<div class="clearfix"> </div>
				<script>$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})</script> 
			</div>
		</div>	
	</div>

	@stop