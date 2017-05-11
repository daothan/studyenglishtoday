<!DOCTYPE html>
<html lang="en">
<head>
	<title>Studying English</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Fantastic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Add Css -->
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/style.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/carousel.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/font-awesome.css')}}">
	<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Add Js -->
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/user_script.js')}}"></script>


</head>
<body>

	<!-- navbar -->
	<div  class="navbar-wrapper">
		<div class="container">
			<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1 class="w3ls-logo"><a class="logo"><p>Free English</p></a></h1>
					</div>

					<div id="navbar" class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="#top">Home</a></li>
							<li><a href="#newest_post" class="scroll">Newest Posts</a></li>
							<li><a href="#listening_cate" class="scroll">Listening</a></li>
							<li><a href="#reading_cate" class="scroll">Reading</a></li>
							<li><a href="#writing_cate" class="scroll">Writing</a></li>
							<li><a href="#about" class="scroll">About</a></li>
							<li><a data-toggle="modal" data-target="#contact">Contact</a></li>
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
			                                    <span class="pull-right text-muted">
			                                        <em>Today</em>
			                                    </span>
			                                </div>
			                                <div>Than just comment </div>
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
								<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{isset(Auth::user()->name) ? Auth::user()->name : ''}} <span class="caret"></span></a>

								<ul class="dropdown-menu">
												<!-- Show level user -->
			                        <li>
			                            <a href="{{isset(Auth::user()->name) ? route('account.information', Auth::user()->id) : route('home')}}"><i class="fa fa-user fa-fw"></i>
			                                <i>
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='0')) ? 'Super Admin' :''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
			                                </i>
			                            </a>
			                        </li>
			                        <!-- End show level user -->

			                        <!-- Edit User logging -->
			                        <li>
			                            <a href="{{(isset(Auth::user()->name)) ? route('account.getEdit',Auth::user()->id) : null}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
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

				<!-- Show Flash Message -->
			    <div class="center-block">
			    	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				        @if(Session::has('alert-' . $msg))
							<h2 class="flash text-center text-success"><strong><i>{{Session::get('alert-success')}}</i></strong></h2>
				        @endif
				    @endforeach
			    </div>
	           <script type="text/javascript">$('h2.flash').delay(5000).slideUp();</script>
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
					<form role="form" method="POST" action="">

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
						<p>or Connect with.... </p>
							<div class="social-icons">
								<ul>
									<li><a href="#">Facebook </a></li>
									<li><a href="#">Google </a></li>
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


	<!-- Modal Register-->
	<div id="register" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
		<div class="login modal-container">
			<div class="grid_3 grid_4">
				<button type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>

				<div class="agileinfo-w3lsrow login-top">
					<h3 class="w3ls-hdg">Register Form</h3>
						<form action="" method="post">
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


	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h2>English</h2>
						<p>English is an important language nowadays. We have asked DPUIC students their opinions about English and why they are studying English</p>
						<button class="btn btn-default" href="#english" data-toggle="modal">English</button>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Studying English</h3>
						<p>Here are some helpful guidelines as to how to study that should help you vary your approach and improve more quickly.</p>
						<button class="btn btn-success" href="#study_english" data-toggle="modal">Study English</button>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Listening</h3>
						<p>Listening is key to all effective communication. Without the ability to listen effectively, messages are easily misunderstood. </p>
						<button class="btn btn-info" href="#listening" data-toggle="modal">Listening</button>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Reading</h3>
						<p>Students need good reading skills not just in English but in all classes. Here are some ways you can help them develop those skills..</p>
						<button class="btn btn-warning" href="#reading" data-toggle="modal">Reading</button>
					</div>
				</div>
			</div>
			<div class="item item5">
				<div class="container">
					<div class="carousel-caption">
						<h3>Writing</h3>
						<p>How to improve your writing skills.</p>
						<button class="btn btn-danger" href="#writing" data-toggle="modal">Writing</button>
					</div>
				</div>
			</div> 
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

		<!-- English -->
		<div id="english" class="modal wthree-modal" tabindex="-1"> 
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>English</h3>
				</div>
				<div class="modal-body grid_3">
					<p>
					1. English is the most commonly spoken language in the world. One out of five people can speak or at least understand English!
					2. English is the language of science, of aviation, computers, diplomacy, and tourism. Knowing English increases your chances of getting a good job in a multinational company within your home country or of finding work abroad.
					3. English is the official language of 53 countries. That is a lot of people to meet and speak to.
					4. English is spoken as a first language by around 400 million people around the world.
					5. English is the language of the media industry. If you speak English, you won’t need to rely on translations and subtitles anymore to enjoy your favourite books, songs, films and TV shows.
					</p>
					<p>
					6. English is also the language of the Internet. Many websites are written in English – you will be able to understand them and to take part in forums and discussions.
					7. English is based on a simple alphabet and it is fairly quick and easy to learn compared to other languages.
					8. English is not only useful — it gives you a lot of satisfaction. Making progress feels great. You will enjoy learning English, if you remember that every hour you spend gets you closer to perfection.
					9. Since English is spoken in so many different countries there are thousands of schools around the world that offer programmes in English. If you speak English, there’re lots of opportunities for you to find an appropriate school and course to suit your academic needs.
					10. Because it’s fun! By learning English, you will also learn about other cultures. Few experiences will make you grow as a person more than learning the values, habits and way of life in a culture that is different from yours.
					</p>
				</div>
			</div>
		</div>

		<!-- study_english -->
		<div id="study_english" class="modal wthree-modal" tabindex="-1">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Study English</h3>
				</div>
				<div class="modal-body grid_3">
					<p>Study Every Day

   						 It's important to study English every day. However, don't exaggerate! Study for thirty minutes every day instead of two hours once a week. Short, steady practice is much better for learning than long periods on an irregular basis. This habit of studying English every day will help keep English in your brain fresh.
					</p>
					<p>A Little Grammar, a Little Listening, a Little Reading, and a little Writing

						Next, make sure to study a number of areas rather than focusing on just one topic. Study a little grammar, then do a short listening exercise, then perhaps read an article on the same topic. Don't do too much, twenty minutes on three different types of exercises is plenty!
					</p>
				</div>
			</div>
		</div>

		<!-- Listening -->
		<div id="listening" class="modal wthree-modal" tabindex="-1">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Listening</h3>
				</div>
				<div class="modal-body grid_3">
					<p>Good listening skills also have benefits in our personal lives, including:

						A greater number of friends and social networks, improved self-esteem and confidence, higher grades at school and in academic work and even better health and general well-being.

						Studies have shown that, whereas speaking raises blood pressure, attentive listening can bring it down.
						Listening is Not the Same as Hearing

						Hearing refers to the sounds that enter your ears. It is a physical process that, provided you do not have any hearing problems, happens automatically.

						Listening, however, requires more than that: it requires focus and concentrated effort, both mental and sometimes physical as well.

						Listening means paying attention not only to the story, but how it is told, the use of language and voice, and how the other person uses his or her body. In other words, it means being aware of both verbal and non-verbal messages. Your ability to listen effectively depends on the degree to which you perceive and understand these messages.

						Listening is not a passive process. In fact, the listener can, and should, be at least as engaged in the process as the speaker. The phrase ‘active listening’ is used to describe this process of being fully involved.
				</div>
			</div>
		</div>

		<!-- Reading -->
		<div id="reading" class="modal wthree-modal" tabindex="-1">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Reading</h3>
				</div>
				<div class="modal-body grid_3">
					<p>
						how-to-improve-english-reading
						By yuliyageikhman
						Is Reading English Hard? Improve Your Reading Skills with 8 Easy Steps

						Did you read anything in English this past week?

						How much of it did you understand?

						Even if you read 15 English books every week, this doesn’t help your learning much unless you actually understand all those books.

						Understanding what is written is called “reading comprehension,” and even some native English speakers suffer from poor reading comprehension.

						The reasons can be different for everyone: maybe you don’t know enough vocabulary words to understand the text, or maybe you got interrupted halfway through and forgot where you were. Maybe it’s just a difficult or boring text.

						We’re always telling you to practice reading a lot, so it can be frustrating when you can’t understand a lot of what you read.

						If you’re having trouble with your reading comprehension, take some time to improve it, and you’ll find that learning English becomes a little easier!
				</div>
			</div>
		</div>

		<!-- Writing -->
		<div id="writing" class="modal wthree-modal" tabindex="-1">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Writing</h3>
				</div>
				<div class="modal-body grid_3">
					<p>
						1. USE FREE GRAMMAR CHECKERS
						I use Grammarly Lite, which is a great tool in my opinion. It corrects you every time you make a mistake. By using it you will become more aware of making the same mistakes, and will eventually learn to stop and remember the correct way. It works anywhere on the net, for example on Facebook, Twitter, websites and blogs. Or use other grammar checkers to instantly proofread your writing.

						2. UTILIZE USEFUL TOOLS
						Check out 2 of our most popular blog posts: 18 Websites That Help You to Improve Writing Skills in English and 6 Ways to Improve Your English Writing Skills. Plus 50 Free Resources That Will Improve Your Writing Skills where you will find resources even for professional writers.

						3. READ MORE
						To Improve your English writing skills you should read more. Start reading blogs and magazines about things that interest you. You will begin to recognise sentence structures, understand how they are formed and eventually use them in your own writing.
				</div>
			</div>
		</div>

		<!-- ENDPOP UP MESSAGE -->

    </div>
	<!-- //banner -->


@yield('content')



<!-- contact -->
	<div id="contact"  class="modal fade contact" role="dialog">
		<div class="modal-dialog"></div>

		<div class="container">
			<div class="contact-row agileits-w3layouts grid_3 grid_4">
			<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>
				<div class="agileits-title">
					<h3 class="w3ls-hdg">Contact Us</h3>
				</div>
				<div class="col-md-5 contact-w3lsleft">
					<div class="contact-grid agileits">
						<h4>Send us your messages </h4>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="Email" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="Subject" required="">
								<label>Subject</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="Message" required=""></textarea>
								<label>Message</label>
								<span></span>
							</div>
							<input type="submit" value="SEND">
						</form>
					</div>
				</div>
				<div class="col-md-7 contact-w3lsright w3llist-grids-btm2">
					<h6><span>Free English </span>where you can improve your English skills . </h6>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Visit Us</h5>
							<p>Cau Giay district <br>Ha Noi capital</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row w3-agileits">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:daothan1211@gmail.com"> daothan1211@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Call Us</h5>
							<p>+84 989 677 020<br></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Working Hours</h5>
							<p>Mon - Fri : 8:00 am to 10:30 pm<br>
							Sat - Sun : 9:00 am to 11:30 pm</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //contact -->


	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3social-icons">
				<ul>
					<li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="gp"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#" class="twit"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="drbl"><i class="fa fa-dribbble"></i></a></li>
				</ul>
			</div>
			<div class="support">
				<form action="#" method="post">
					<input type="email" placeholder="Enter email...." required="">
					<input type="submit" value="SUBMIT" class="botton">
				</form>
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

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
					event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});

		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});

		/*Home top*/
		 $("a[href='#top']").click(function() {
		     $("html, body").animate({ scrollTop: 0 }, "slow");
		     return false;
		  });

	</script>


	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.nicescroll.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/scripts.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/bootstrap.js')}}"></script>

</body>
</html>
