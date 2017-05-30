<!DOCTYPE html>
<html lang="en">
<head>
	<title>Studying English</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Fantastic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Add Css -->
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/style.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/carousel.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/font-awesome.css')}}">
	<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Add Js -->
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery.validate.min.js')}}"></script>

</head>
<body>

	<!-- navbar -->
	<div  class="navbar-wrapper">
		<div class="container">
			<nav class="navbar-static-top navbar-fixed-top navbar-inverse menu">
				<div class="container">
					<div class="navbar-header">
						<div class="navbar-toggle collapsed icon_bar_toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
							<div class="container" onclick="myFunction(this)">
							    <div class="bar1"></div>
							    <div class="bar2"></div>
							    <div class="bar3"></div>
							</div>
						</div>
						<h1 class="w3ls-logo {{((url()->current())!=route('user.home')) ? 'hidden' : ''}}"><a href="#top" class="logo"><p>Free English</p></a></h1>
						<h1 class="w3ls-logo {{((url()->current())!=route('user.home')) ? '' : 'hidden'}}"><a href="{{route('user.home')}}" class="logo"><p>Free English</p></a></h1>
					</div>

					<div id="navbar" class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
						<!-- Newest -->
							<li class="{{((url()->current())==route('user.home')) ? '' : 'hidden'}}"><a href="#newest_post" class="scroll">Newest Posts</a></li>
							<li class="{{((url()->current())!=route('user.home')) ? '' : 'hidden'}}"><a href="{{route('user.home')}}#newest_post">Newest Posts</a></li>
						<!-- - -->
						<!-- Listening -->
							<li class="{{((url()->current())==route('user.home')) ? '' : 'hidden'}}"><a href="#listening_cate" class="scroll">Listening</a></li>
							<li class="{{((url()->current())!=route('user.home')) ? '' : 'hidden'}}"><a href="{{route('user.home')}}#listening_cate">Listening</a></li>
						<!-- - -->
						<!-- Reading -->
							<li class="{{((url()->current())==route('user.home')) ? '' : 'hidden'}}"><a href="#reading_cate" class="scroll">Reading</a></li>
							<li class="{{((url()->current())!=route('user.home')) ? '' : 'hidden'}}"><a href="{{route('user.home')}}#reading_cate">Reading</a></li>
						<!-- - -->
						<!-- Writing -->
							<li class="{{((url()->current())==route('user.home')) ? '' : 'hidden'}}"><a href="#writing_cate" class="scroll">Writing</a></li>
							<li class="{{((url()->current())!=route('user.home')) ? '' : 'hidden'}}"><a href="{{route('user.home')}}#writing_cate">Writing</a></li>
						<!-- - -->
						<!-- Contact -->
							<li id="contact"><a data-toggle="modal" data-target="" onclick="contact()">Contact</a></li>
						<!-- - -->
						</ul>

						<!-- Sign Up and Login -->
						<ul class="nav navbar-nav navbar-right user">

							<li class="{{isset(Auth::user()->name) || (url()->current()==route('user.register')) ? 'hidden' : null}}">
					        	<a data-toggle="modal" data-target="#login">Login <span class="glyphicon glyphicon-log-in"></span></a>
					        </li>

					        <li class="{{isset(Auth::user()->name) || (url()->current()==route('user.login')) ? 'hidden' : null}}">
					        	<a data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-user"></span> Register</a>
					        </li>
					    </ul>

						<!-- Show information of User -->
  						<ul class=" {{isset(Auth::user()->name) ? 'nav navbar-nav navbar-right' : 'hidden'}}">
			                <li class="{{isset(Auth::user()->name) && (Auth::user()->level < 2 )? 'dropdown' : 'hidden'}}">
			                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
			                    </a>
			                    <!-- MESSAGES -->
			                    <ul class="dropdown-menu dropdown-messages">
			                        <li>
			                            <a href="#">
			                                <div>
			                                    <strong>Daothan</strong>
			                                </div>
			                                <div>Than just comment </div>
			                            </a>
			                        </li>
			                        <li class="divider"></li>
			                        <li>
			                            <a class="text-center" href="" onclick="Window.location.reload(true);">
			                                <strong>See All Comments</strong>
			                                <i class="fa fa-angle-right"></i>
			                            </a>
			                        </li>
			                    </ul>
			                    <!-- /.dropdown-messages -->
			                </li>
			                <!-- /.dropdown -->

			                <!-- TASK COMPLETE -->
			                <li class="{{isset(Auth::user()->name) && (Auth::user()->level < 2 )? 'dropdown' : 'hidden'}}">
			                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
			                    </a>
			                    <ul class="dropdown-menu dropdown-tasks">
			                        <li>
			                            <a href="" onclick="Window.location.reload(true);">
			                                <div>
			                                    <p>
			                                        <strong>Task 1</strong>
			                                        <span class="pull-right text-muted">40% Complete</span>
			                                    </p>
			                                    <div class="progress progress-striped active">
			                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                                            <span class="sr-only">40% Complete (success)</span>
			                                        </div>
			                                    </div>
			                                </div>
			                            </a>
			                        </li>
			                        <li class="divider"></li>
			                        <li>
			                            <a class="text-center" href="" onclick="Window.location.reload(true);">
			                                <strong>See All Tasks</strong>
			                                <i class="fa fa-angle-right"></i>
			                            </a>
			                        </li>
			                    </ul>
			                    <!-- /.dropdown-tasks -->
			                </li>
			                <!-- END TASK COMPLETE -->

			                <!-- ALERT -->
			                <li class="{{isset(Auth::user()->name) && (Auth::user()->level < 2 )? 'dropdown' : 'hidden'}}">
			                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
			                    </a>
			                    <ul class="{{isset(Auth::user()->name) ? 'dropdown-menu dropdown-alerts' : 'hidden'}}">
			                        <li>
			                            <a href="">
			                                <div>
			                                    <i class="fa fa-comment fa-fw"></i> New Comment
			                                    <span class="pull-right text-muted small">4 minutes ago</span>
			                                </div>
			                            </a>
			                        </li>

			                        <li class="divider"></li>
			                        <li>
			                            <a href="#">
			                                <div>
			                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
			                                    <span class="pull-right text-muted small">4 minutes ago</span>
			                                </div>
			                            </a>
			                        </li>
			                        <li class="divider"></li>
			                        <li>
			                            <a href="#">
			                                <div>
			                                    <i class="fa fa-tasks fa-fw"></i> New Task
			                                    <span class="pull-right text-muted small">4 minutes ago</span>
			                                </div>
			                            </a>
			                        </li>
			                        <li class="divider"></li>
			                        <li>
			                            <a href="#">
			                                <div>
			                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
			                                    <span class="pull-right text-muted small">4 minutes ago</span>
			                                </div>
			                            </a>
			                        </li>
			                        <li class="divider"></li>
			                        <li>
			                            <a class="text-center" href="#">
			                                <strong>See All Alerts</strong>
			                                <i class="fa fa-angle-right"></i>
			                            </a>
			                        </li>
			                    </ul>
			                </li>
			                <!-- END ALERT -->


			                <!-- USER -->
			                <li class="{{isset(Auth::user()->name) ? 'dropdown' : 'hidden'}}">
								<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{(isset(Auth::user()->name) && !is_numeric(Auth::user()->name)) ? Auth::user()->name : ''}} {{ isset(Auth::user()->name_social) ? Auth::user()->name_social : ''}} <span class="caret"></span></a>

								<ul class="dropdown-menu">
									<!-- Show admin page if admin -->
									<li class="{{(isset(Auth::user()->level) && (Auth::user()->level < 2)) ? '' : 'hidden'}}">
										<a href="{{route('admin.dashboard')}}"><i class="glyphicon glyphicon-th-list"> AdminPage</i></a>
									</li>
									<!-- Show level user -->
			                        <li>
			                            <a onclick="view_user('{{isset(Auth::user()->name) ? Auth::user()->id : ''}}')"><i class="fa fa-user fa-fw"></i>
			                                <i>
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='0')) ? 'Super Admin' :''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
			                                </i>
			                            </a>
			                        </li>
			                        <!-- End show level user -->

			                        <!-- Edit User logging (except user logging through social)-->
			                        <li class="{{(isset(Auth::user()->name) && is_numeric(Auth::user()->name)) ? 'hidden' : ''}}">
			                            <a onclick="edit_user('{{isset(Auth::user()->name) ? Auth::user()->id : ''}}')"><i class="fa fa-gear fa-fw"></i> Settings</a>
			                        </li>
			                        <!-- End edit User logging -->

			                        <!-- Logout -->
			                        <li role="separator" class="divider"></li>
			                        <li>
			                            <a href="{{route('user.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			                        </li>
			                        <!-- End Logout -->
								</ul>
							</li>
			                <!-- END USER -->

			            </ul>
					</div>
				</div>
				@extends('user_interface.user_account.user_edit')
				@extends('user_interface.user_account.user_information')
				<!-- Show Flash Message -->
			    <div>
			    	@foreach (['danger', 'warning', 'success', 'info', 'flash_welcome'] as $msg)
				        @if(Session::has('alert-' . $msg))
							<h2 class="flash text-center text-{{ $msg }}"><i>{{Session::get('alert-'. $msg)}}</i></h2>
				        @endif
				    @endforeach
			    </div>
	           <script type="text/javascript">$('h2.flash').delay(3000).slideUp();</script>
	           <!-- End Show Flash Message -->

			</nav>
		</div>
    </div>

	<!-- Modal Login-->
	<div id="login" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
		<div class="login modal-container">
			<div class="grid_3 grid_4">

				<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>

				<div class="agileinfo-w3lsrow login-top">
					<h3 class="w3ls-hdg">Login Form</h3>
					<form role="form" method="POST" action="" id="validate_login">

		                <h3 class="col-md-6 col-md-offset-3 error errorLogin flash text-center text-danger"></h3>

						<!-- Username -->
						<input id="username" type="text" name="username" placeholder="Please enter username">
							<div class="has-error"><i><span class="help-block error errorUserName"></span></i></div>
						<!-- Password -->
						<input id="user_password" type="password" name="user_password" placeholder="Please enter password">
							<div class="has-error"><i><span class="help-block error errorUserPassword"></span></i></div>

						<!-- Submit-->
						<input id="login_modal" type="submit" value="Sign In">
						<input type="reset" value="Reset">

						<!-- Other connect -->
						<p><i><strong>or Connect with.... </strong></i></p>
							<div class="social-icons">
								<ul>
									<li><a href="{{route('user.facebook')}}">Facebook </a></li>
									<li><a href="{{route('user.google')}}">Google </a></li>
								</ul>
								<div class="clearfix"> </div>
							</div>
					</form>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<!-- Modal Login Successful-->
	<div id="login_success" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	    <!-- Modal content-->
		    <div class="modal-content">
			    <div class="modal-body">
			        <h3 align="center" style="color:green;">Welcome '<span class ="username"></span>' to Studying English.</h3>
			    </div>
		    </div>
		</div>
	</div>

	<!-- Modal Register-->
	<div id="register" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
		<div class="login modal-container">
			<div class="register grid_4">
				<button type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>

				<div class="agileinfo-w3lsrow login-top">
					<h3 class="w3ls-hdg">Register Form</h3>
						<form id="validate_register" action="" method="POST">
							<h3 class="col-md-6 col-md-offset-3 error successRegister flash text-center text-danger"></h3>

							<input id="name" type="text" name="name" class="name active" placeholder="Your Name" autofocus />
								<div class="has-error"><i><span class="help-block error errorName"></span></i></div>
							<input id="email" type="text" name="email" class="email" placeholder="Email"/>
								<div class="has-error"><i><span class="help-block error errorEmail"></span></i></div>
							<input id="password" type="password" name="password" class="password" placeholder="Password"/>
								<div class="has-error"><i><span class="help-block error errorPassword"></span></i></div>
							<input id="password_confirmation" type="password" name="password_confirmation" class="password" placeholder="Confirm Password"/>
								<div class="has-error"><i><span class="help-block error errorPassword_confirmation"></span></i></div>

							<input id="register_modal" type="submit" value="Register"/>
							<input type="reset" value="Reset">
						</form>

					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

	  </div>
	</div>
	<!-- Modal Register Successful-->
	<div id="register_success" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	    <!-- Modal content-->
		    <div class="modal-content">
			    <div class="modal-body">
			        <h3 align="center" style="color:green;">Account '<span class ="username"></span>' signed up successful.</h3>
			    </div>
		    </div>
		</div>
	</div>

	<!-- banner -->
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php $i=0;?>
			@foreach($banner as $data)
			<?php $i++;?>
			<li data-target="#myCarousel" data-slide-to="{{$i-1}}" class="{{($i==1) ? 'active' :''}}"></li>
			@endforeach
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php $i=0;?>
			@foreach($banner as $data)
			<?php $i++;?>
			<div class="item {{($i==1 ? 'active' : 'item'.$i)}}">
				<div class="container">
					<div class="carousel-caption">
						<h2>{{$data->tittle}}</h2>
						<p>{!!htmlspecialchars_decode($data->introduce)!!}</p>
						<button class="btn_user btn{{$i}}" href="#{{$data->tittle}}" data-toggle="modal">{{$data->tittle}}</button>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>

		<!-- POP UP MESSAGE -->
		@foreach($banner as $data)
		<!-- {{$data->tittle}} -->
		<div id="{{$data->tittle}}" class="modal wthree-modal" tabindex="-1">
			<!-- Modal content -->
			<div class="modal-content modal-dialog-scroll">
				<div class="modal-tittle">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3 class="modal_header">{{$data->tittle}}</h3>
				</div>
				<div class="modal-body grid_3 modal-body-scroll">
					<p>
					{!!htmlspecialchars_decode($data->content)!!}
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_user warning" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		@endforeach
		<!-- ENDPOP UP MESSAGE -->
    </div>

	<!-- //banner -->
	<!-- //banner -->


@yield('content')
<!-- Contact -->
@extends('user_interface.layouts.contact')


	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3social-icons">Login with<br><br>
				<ul>
					<li><a href="{{route('user.facebook')}}" class="fb"><i class="fa fa-facebook"></i></a></li>
					<li><a href="{{route('user.google')}}" class="gp"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="w3copy-agile">
		<div class="container">
			<p class="footer-class">© 2017 Studying English Pages  <a href="" target="_blank">Free English</a> </p>
		</div>
	</div>
	<!-- //footer -->


	<!-- Script -->
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/easing.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.nicescroll.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/user_script.js')}}"></script>

</body>
</html>
