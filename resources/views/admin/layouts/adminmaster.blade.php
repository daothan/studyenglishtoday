<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/css/master.css')}}">

	<script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/ckeditor/ckeditor.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/ckfinder/ckfinder.js')}}" ></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/master_script/masterscript.js')}}"></script>

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
					<ul class="nav navbar-nav ">
						<li><a href="" onclick="window.location.reload(true);">Dashboard</a></li>

						<li class="{{(url()->current()==route('admin.cate.show')) ? 'active' : ''}}">
							<a href="{{route('admin.cate.show')}}">Category</a>
						</li>

						<li class="{{(url()->current()==route('admin.detail.show')) ? 'active' : ''}}">
							<a href="{{route('admin.detail.show')}}">Detail</a>
						</li>

						<li class="{{(url()->current()==route('admin.user.show')) ? 'active' : ''}}">
							<a href="{{route('admin.user.show')}}">User</a>
						</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="{{isset(Auth::user()->name) ? 'btn-group' : 'hidden'}}">
						    <a data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><strong>  {{isset(Auth::user()->name) ? Auth::user()->name : ''}}</strong></a>
						    <ul class="dropdown-menu panel-transparent">
						    	<li>
						    		<a href=""><i class="glyphicon glyphicon-star-empty"></i>
						    			<i>
								    		{{(isset(Auth::user()->level) && (Auth::user()->level=='0')) ? 'Super Admin' :''}}
								    		{{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
								    		{{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
							    		</i>
						    		</a>
						    	</li>
						    	<li><a href=""><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
						    	<li><a href="{{route('account.logout')}}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
						    </ul>
						</li>

						<li class="{{isset(Auth::user()->name) || (url()->current()==route('account.getLogin')) ? 'hidden' : null}}">
							<a href="{{route('account.getLogin')}}"><i class="glyphicon glyphicon-user"></i>  <strong>Login</strong></a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>


		<div class="container">
			<form class="{{(url()->current()==route('account.getLogin')) ? 'hidden':'navbar-form pull-right'}}" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</form>
			<div class="panel">
				<div class="col-md-6 col-md-offset-3">
					@if(Session::has('flash_message'))
						<div class="alert alert-{{Session::get('flash_level')}} col-centered">
							<p class="text-center"><strong>{{Session::get('flash_message')}}</strong></p>
						</div>
					@endif
				</div>
			</div>
		</div>
		<script type="text/javascript">$('div.alert').delay(3000).slideUp();</script>

		@yield('content')

	</div>

</body>
</html>
