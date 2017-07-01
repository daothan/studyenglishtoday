<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

        <title>Studyenglishtoday</title>

		<link rel="icon" href="{!! asset('/storage/uploads/interface_images/icon.ico') !!}"/>



       

         <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/style.css')}}">

        <!-- style -->

        <!-- bootstrap -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/bootstrap.min.css')}}">

        <!-- responsive -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/responsive.css')}}">


        <!-- font-awesome -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/font-awesome.min.css')}}">

        <!-- font-awesome -->

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/set2.css')}}">

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/normalize.css')}}">

        <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/component.css')}}">

		<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/bootstrap/css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/user_interface1/css/animate.css')}}">
		<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

		<!-- Add Js -->
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery-3.2.1.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery.validate.min.js')}}"></script>

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

                        	<h1 class="w3ls-logo {{((url()->current())!=route('home')) ? 'hidden' : ''}}"><a href="#top" class="logo"><p style="color:#36bdff;">Studying</p><p style="color:#74ff5f;">English</p><p style="color: #ff5353;">Today</p></a></h1>
						<h1 class="w3ls-logo {{((url()->current())!=route('home')) ? '' : 'hidden'}}"><a href="{{route('home')}}" class="logo"><p style="color:#36bdff;">Studying</p><p style="color:#74ff5f;">English</p><p style="color: #ff5353;">Today</p></a></h1>

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
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="4500">
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
              <span class="glyphicon glyphicon-heart"></span>
            </h3>
            <h3 data-animation="animated bounceInRight">
              {{$data->tittle}}
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
	  <input type="text" name="search" placeholder="Search ...">
	</form>
</div>
@if(Session::has('error_search'))
  <div class="alert-box danger">
  <h2>{!! Session::get('error_search') !!}</h2>
  </div>
@endif
      @yield('content')
        <!-- footer -->

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

            <p class="copy-right">&copy; 2017 Studying English Pages - Improve you English everyday</p>
        </footer>

        <!-- footer -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


        <!-- custom -->
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/nav.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/custom.js')}}" ></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
		


		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/masonry.pkgd.min.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/imagesloaded.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/classie.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/AnimOnScroll.js')}}" ></script>

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/modernizr.custom.js')}}" ></script>

        <!-- jquery.countdown -->

		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface1/js/html5shiv.js')}}" ></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/move-top.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/easing.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.nicescroll.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/jquery.touchSwipe.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/user_script.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/audioplayer.js')}}"></script>
	    <script type="text/javascript" src="{{URL::asset('public/editor/user_interface/js/checkword.js')}}"></script>

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

