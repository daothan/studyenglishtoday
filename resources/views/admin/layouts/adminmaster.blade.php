<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/bootstrap/css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/ckeditor/ckeditor.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/ckfinder/ckfinder.js')}}" ></script>
	<script type="text/javascript" src="{{url('public/editor/master/masterscript.js')}}"></script>

</head>
<body>
	<div id="wrapper">
		<div class="panel panel-default">
			<div class="panel-body">
				STUDYING ENGLISH
			</div>
		</div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Admin</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Admin</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Dashboard</a></li>
						<li><a href="#">Category</a></li>
						<li><a href="#">Product</a></li>
						<li><a href="#">User</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Profile</a></li>
								<li><a href="#">Log out</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form pull-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Search</button>
					</form>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>


		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					@if(Session::has('flash_message'))
						<div class="alert alert-{{Session::get('flash_level')}}">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>{{Session::get('flash_message')}}</strong> 
						</div>
					@endif
				</div>
			</div>
		</div>

		@yield('content')

	</div>

</body>
</html>
