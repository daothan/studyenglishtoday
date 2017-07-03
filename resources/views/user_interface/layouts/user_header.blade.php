<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

       <title>Studying English</title>
		<link rel="icon" href="{!! asset('/storage/uploads/interface_images/icon.ico') !!}"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="Fantastic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
			SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Responsive &amp; Touch-Friendly Audio Player" />

		<!-- Link share FB-->
		<meta property="og:url"           content="http://studyenglishtoday.org/" />
	 	<meta property="og:type"          content="StudyingEnglishToday" />
	  	<meta property="og:title"         content="Improving your English every day" />
	  	<meta property="og:description"   content="This website will provide you the way, knowledge may help you improving English" />
	  	<meta property="og:image"         content="http://studyenglishtoday.org/storage/uploads/files/study-english.jpg" />
	  	<meta property="og:image:width"   content="1200px" />
		<meta property="og:image:height"  content="630px" />
		<!-- Link share FB-->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		<link rel="icon" href="{!! asset('/storage/uploads/interface_images/icon.ico') !!}"/>

         <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/style.css')}}">
         <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/login_style.css')}}">
         <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/contact_style.css')}}">

        <!-- style -->

        <!-- bootstrap -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/bootstrap.min.css')}}">

        <!-- responsive -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/responsive.css')}}">


        <!-- font-awesome -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/font-awesome.min.css')}}">

        <!-- font-awesome -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/set2.css')}}">

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/normalize.css')}}">

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/component.css')}}">

		<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/animate.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface/css/audioplayer.css')}}">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<script>
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
		<!-- Add Js -->
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery-3.2.1.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.validate.min.js')}}"></script>

	    <!-- Ckeditor and Ckfinder -->
	    <script type="text/javascript" src="{{URL::asset('public/editor/ckeditor/ckeditor.js')}}" ></script>
	    <script type="text/javascript" src="{{URL::asset('public/editor/ckfinder/ckfinder.js')}}" ></script>
	    <script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/ckeditor_config.js')}}" ></script>


	</head>


    <body>

    	<!-- header -->

        	<header role="header">

            	<div class="container">

                	<!-- logo -->

                    	<h1>

                        	<h1 class="w3ls-logo {{((url()->current())!=route('home')) ? 'hidden' : ''}}"><a href="#top" class="logo"><p style="color:#36bdff;font-size: 22px;padding-top: 3px;">Studying</p><p style="color:#74ff5f;font-size: 22px;padding-top: 3px;">English</p><p style="color: #ff5353;font-size: 22px;padding-top: 3px;">Today</p></a></h1>
						<h1 class="w3ls-logo {{((url()->current())!=route('home')) ? '' : 'hidden'}}"><a href="{{route('home')}}" class="logo"><p style="color:#36bdff;font-size: 22px;padding-top: 3px;">Studying</p><p style="color:#74ff5f;font-size: 22px;padding-top: 3px;">English</p><p style="color: #ff5353;font-size: 22px;padding-top: 3px;">Today</p></a></h1>

                        </h1>

                    <!-- logo -->

                    <!-- nav -->

                    <nav role="header-nav" class="navy">

                        <ul>

                            <!-- Knowledge Library -->
								<li><a href="{{route('library')}}">Knowledge-Library</a></li>
							<!-- - -->
							<!-- Listening -->
								<li><a href="{{route('practice_listening')}}">Listening-Dictation</a></li>
							<!-- - -->
							<!-- Guide -->
								<li class="{{$guide_count==0 ? 'hidden':''}}"><a data-toggle="modal" data-target="" onclick="guide()" style="cursor: pointer;">Guide</a></li>
							<!-- - -->
							<!-- Contact -->
								<li><a data-toggle="modal" data-target="" onclick="contact_us()" style="cursor: pointer;">Contact</a></li>
							<!-- - -->

							<hr>

							<li class="{{isset(Auth::user()->name) || (url()->current()==route('register')) ? 'hidden' : null}}">
					        	<a data-toggle="modal" data-target="#login" style="cursor: pointer;">Login <span class="glyphicon glyphicon-log-in"></span></a>
					        </li>

					        <li class="{{isset(Auth::user()->name) || (url()->current()==route('login')) ? 'hidden' : null}}">
					        	<a data-toggle="modal" data-target="#register" style="cursor: pointer;"><span class="glyphicon glyphicon-user"></span> Register</a>
					        </li>
							<!-- Show information of User -->
			                <!-- USER -->
			                <li class="{{isset(Auth::user()->name) ? '' : 'hidden'}}">
								<a ><span class="glyphicon glyphicon-user"></span> {{(isset(Auth::user()->name) && !is_numeric(Auth::user()->name)) ? Auth::user()->name : ''}} {{ isset(Auth::user()->name_social) ? Auth::user()->name_social : ''}}</a>

							</li>
			                <!-- END USER -->
			                <li class=" {{isset(Auth::user()->name) ? '' : 'hidden'}}">
									<!-- Show admin page if admin -->
									<li class="{{(isset(Auth::user()->level) && (Auth::user()->level < 2)) ? '' : 'hidden'}}">
										<a href="{{route('admin.dashboard')}}"><i class="glyphicon glyphicon-th-list"> AdminPage</i></a>
									</li>
									<!-- Show level user -->
			                        <li class="{{isset(Auth::user()->name) ? '' : 'hidden'}}">
			                            <a onclick="view_user('{{isset(Auth::user()->name) ? Auth::user()->id : ''}}')"><i class="fa fa-diamond" aria-hidden="true"></i>
			                                <i>
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='0')) ? 'Super Admin' :''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
			                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
			                                </i>
			                            </a>
			                        </li>
			                        <!-- End show level user -->

			                        <!-- Edit User logging (except user logging through social)-->
			                        <li class="{{(isset(Auth::user()->name) && is_numeric(Auth::user()->name)) ? 'hidden' : ''}} {{isset(Auth::user()->name) ? '' : 'hidden'}}">
			                            <a onclick="edit_user('{{isset(Auth::user()->name) ? Auth::user()->id : ''}}')"><i class="fa fa-gear fa-fw"></i> Settings</a>
			                        </li>
			                        <!-- End edit User logging -->

			                        <!-- Logout -->
			                        <li role="separator" class="divider"></li>
			                        <li class="{{isset(Auth::user()->name) ? '' : 'hidden'}}">
			                            <a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			                        </li>
			                        <!-- End Logout -->
								</li>
                        </ul>


                    </nav>

                    <!-- nav -->

                </div>

            </header>

        <!-- header -->
  <!-- Like Button -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=121376408433469";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- Like Button -->



<!-- Login Form -->
	<div id="login" class="modal fade" role="dialog">
	  <div class="modal-dialog login-form" style="margin: -65px auto;">

	    <!-- Modal content-->
		<div class="login modal-container">
			<div class="grid_3 grid_4">

				<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>

				<div class="agileinfo-w3lsrow login-top">
					<h3 class="w3ls-hdg" align="center" style="color:#fff;">Login Form</h3>
					<form role="form" method="POST" action="" id="validate_login">

		                <div><h3 class="col-md-6 col-md-offset-3 error errorLogin flash text-center text-danger" style="width:100%;"></h3></div>

						<!-- Username -->
						<i class="fa fa-envelope fa-2x" aria-hidden="true" style="color:#fff; padding-right: 30px;"></i>
						<input id="username" type="text" name="username" placeholder="Username">
							<div class="has-error"><i><span class="help-block error errorUserName"></span></i></div>
						<!-- Password -->
						<i class="fa fa-key fa-2x" aria-hidden="true" style="color:#fff; padding-right: 30px;"></i>
						<input id="user_password" type="password" name="user_password" placeholder="Password">
							<div class="has-error"><i>
								<span class="help-block error errorUserPassword"></span></i>
							</div>
						<div id="loading_login" style="width: 55px;margin: auto; display: none;"><img src="/studyenglishtoday/storage/uploads/loading_images/loading_login.gif"></div>
						<!-- Submit-->
						<input id="login_modal" type="submit" value="Sign In">
						<input type="reset" value="Reset">

						<!-- Other connect -->
						<p><i><strong style="color: #fff;">or Connect with.... </strong></i></p>
						<ul class="social-w3-agileits">
							<li style="padding-right: 5px;"><a href="{{route('facebook')}}"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{route('google')}}"><i class="fa fa-google-plus"></i></a></li>
						</ul>
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
	  <div class="modal-dialog login-form">

	    <!-- Modal content-->
		<div class="login modal-container">
			<div class="register grid_4">
				<button type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>

				<div class="agileinfo-w3lsrow login-top">
					<h3 class="w3ls-hdg" align="center" style="color:#fff;">Register Form</h3>
						<form id="validate_register" action="" method="POST">
							<h3 class="col-md-8 col-md-offset-2 error successRegister flash text-center text-danger" style="width:100%;"></h3>

							<i class="fa fa-user fa-2x" aria-hidden="true" style="color:#fff; padding-right: 35px;"></i>
							<input id="name" type="text" name="name" class="name active" placeholder="Your Name" autofocus />
								<div class="has-error"><i><span class="help-block error errorName"></span></i></div>

							<i class="fa fa-envelope fa-2x" aria-hidden="true" style="color:#fff; padding-right: 29px;"></i>
							<input id="email" type="text" name="email" class="email" placeholder="Email"/>
								<div class="has-error"><i><span class="help-block error errorEmail"></span></i></div>
							<i class="fa fa-key fa-2x" aria-hidden="true" style="color:#fff; padding-right: 29px;"></i>
							<input id="password" type="password" name="password" class="password" placeholder="Password"/>
								<div class="has-error"><i><span class="help-block error errorPassword"></span></i></div>
							<i class="fa fa-key fa-2x" aria-hidden="true" style="color:#fff; padding-right: 29px;"></i>
							<input id="password_confirmation" type="password" name="password_confirmation" class="password" placeholder="Confirm Password"/>
								<div class="has-error"><i><span class="help-block error errorPassword_confirmation"></span></i></div>
							<div id="loading_register" style="width: 55px;margin: auto; display: none;"><img src="/studyenglishtoday/storage/uploads/loading_images/loading_login.gif"></div>

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

	<!-- Banner -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php $i=0;?>
			@foreach($banner as $data)
			<?php $i++;?>
			<li data-target="#carousel-example-generic" data-slide-to="{{$i-1}}" class="{{($i==1) ? 'active' :''}}"></li>
			@endforeach
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <!-- First slide -->
    	<?php $i=0;?>
		@foreach($banner as $data)
		<?php $i++;?>
        <div class="item deepskyblue {{($i==1 ? 'active' : 'item'.$i)}}">

        <div class="carousel-caption">
          <h3 class="icon-container" data-animation="animated bounceInDown" >
              <span>{{$data->tittle}}</span>
            </h3>
            <h3 data-animation="animated bounceInRight">
              {!!htmlspecialchars_decode($data->introduce)!!}
            </h3>
            <button class="btn_user btn{{$i}}" data-animation="animated zoomInRight" href="#{{tittle($data->tittle)}}" data-toggle="modal"><span>View</span></button>
          </div>
        </div> <!-- /.item -->
		@endforeach

      </div><!-- /.carousel-inner -->

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


		<!-- POP UP MESSAGE -->
		@foreach($banner as $data)
		<!-- {{$data->tittle}} -->
		<div id="{{tittle($data->tittle)}}" class="modal wthree-modal" tabindex="-1">
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


    <div class="form_search form_search col-md-10 col-md-offset-1">
	<form id="search_form">
		<i class="glyphicon glyphicon-search fa-2x" aria-hidden="true" style="padding-right: 12px;
    top: 9px;
    color: #fff;"></i>
		<input type="text" name="search" id="search_form_type" placeholder="Search ...">
	</form>
</div>
@if(Session::has('error_search'))
  <div class="alert-box danger">
  <h2>{!! Session::get('error_search') !!}</h2>
  </div>
@endif
      @yield('content')
        <!-- footer -->
        <!-- Contact -->
		@extends('user_interface.layouts.contact')
		<!-- End Contact -->

		<!-- Guide -->
		@extends('user_interface.layouts.guide')
		<!-- End Guide -->
<!-- Analytics-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-101544002-1', 'auto');
	  ga('send', 'pageview');

	</script>
<!-- End analytics-->
        <footer role="footer">

            <!-- logo -->
            <!-- logo -->

            <!-- nav -->

            <nav role="footer-nav">

            	<ul>

                	 <!-- Knowledge Library -->
						<li><a href="{{route('library')}}">Knowledge-Library</a></li>
					<!-- - -->
					<!-- Listening -->
						<li><a href="{{route('practice_listening')}}">Listening-Dictation</a></li>
					<!-- - -->
					<!-- Guide -->
						<li class="{{$guide_count==0 ? 'hidden':''}}"><a data-toggle="modal" data-target="" onclick="guide()" style="cursor: pointer;">Guide</a></li>
					<!-- - -->
					<!-- Contact -->
						<li><a data-toggle="modal" data-target="" onclick="contact_us()" style="cursor: pointer;">Contact</a></li>
					<!-- - -->

                </ul>

            </nav>

            <!-- nav -->

            <ul role="social-icons">
            	<h4 style="color:rgba(0, 20, 255, 0.85);">Or Login with</h4>

                <li><a href="{{route('facebook')}}" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                <li><a href="{{route('google')}}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
            </ul>

            <p class="copy-right">&copy; 2017 Studying English Pages</p>
        </footer>

        <!-- footer -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


        <!-- custom -->
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/nav.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/custom.js')}}" ></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/masonry.pkgd.min.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/imagesloaded.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/classie.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/AnimOnScroll.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/modernizr.custom.js')}}" ></script>

        <!-- jquery.countdown -->

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/html5shiv.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/move-top.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/easing.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.nicescroll.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/bootstrap.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.touchSwipe.min.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/user_script.js')}}"></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/audioplayer.js')}}"></script>

	    <script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/checkword.js')}}"></script>

	    <script>$( function() { $( 'audio' ).audioPlayer(); } );</script>

<script type="text/javascript">
	/* Demo Scripts for Bootstrap Carousel and Animate.css article
* on SitePoint by Maria Antonietta Perna
*/
(function( $ ) {

	//Function to animate slider captions
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}

	//Variables on page load
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
	//Initialize carousel
	$myCarousel.carousel();
	//Animate captions in first slide on page load
	doAnimations($firstAnimatingElems);
	//Pause carousel
	$myCarousel.carousel('pause');

	//Other slides to be animated on carousel slide event
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});
})(jQuery);

/*Change class based on width screen*/
var $window = $(window);

function checkWidth() {
    if ($window.width() <= 800) {


        $('.facebook_button').removeClass('show_style').addClass('hide_style');
        $('.facebook_button1').removeClass('hide_style').addClass('show_style');

    };

    if ($window.width() > 800) {


        $('.facebook_button').removeClass('hide_style').addClass('show_style');
        $('.facebook_button1').removeClass('show_style').addClass('hide_style');

    }
}
checkWidth();
$(window).resize(checkWidth);
</script>

    </body>

</html>

