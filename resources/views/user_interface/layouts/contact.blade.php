
	<div id="contactModal"  class="modal fade contact" role="dialog">
		<div class="content-w3ls">
			<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black; padding: 20px;"><span class="glyphicon glyphicon-remove"></span></button>
			<div class="content1-agile">
				<div class="info-w3l">
					<h2 class="wthree">Contact Us</h2>

					<form action="" method="post" class="form-agileits" id="contact_validate">
						<h4 class="loading" align="center"></h4>
						<input type="text" id="name_contact" name="name_contact" placeholder="Username" title="Please enter your First Name">
						<input type="email" id="email_contact" name="email_contact" placeholder="mail@example.com" title="Please enter a Valid Email Address" >
						<textarea id="message_contact" name="message_contact" placeholder="Your Message" title="Please enter Your Comments"></textarea>
						<input type="submit" class="sign-in" value="Submit">
					</form>
					<p class="agileinfo">Or Login</p>
					<div class="social-bottons-w3ls">
						<a href="{{route('facebook')}}" class="hvr-shutter-out-vertical facebook"><i align="center" class="fa fa-facebook" aria-hidden="true"></i><span align="center">Sign in with Facebook</span></a>
						<a href="{{route('google')}}" class="hvr-shutter-out-vertical google"><i align="center" class="fa fa-google" aria-hidden="true"></i><span align="center">Sign in with Google</span></a>
					</div>
				</div>
			</div>
			<div class="content2-agile contact-w3lsright w3llist-grids-btm2" style="padding-top: 100px;">
				<div class="col-xs-6 address-row">
					<div class="col-xs-12 address-right">
						<h5>Visit Us</h5>
						@foreach($contact as $data)
						<p>{{$data->address}} <br></p>
						@endforeach
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-xs-6 address-row w3-agileits">
					<div class="col-xs-12 address-right">
						<h5>Mail Us</h5>
						@foreach($contact as $data)
						<p><a href="mailto:info@example.com">{{$data->email}}</a></p>
						@endforeach
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-xs-6 address-row">
					<div class="col-xs-12 address-right">
						<h5>Call Us</h5>
						@foreach($contact as $data)
						<p>{{$data->phone}}<br></p>
						@endforeach
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-xs-6 address-row">
					<div class="col-xs-12 address-right">
						<h5>Working Hours</h5>
						@foreach($last_contact as $data)
						<p>Mon - Fri : {{$data->hour_week}}<br>
						Sat - Sun : {{$data->hour_weekend}}</p>
						@endforeach
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clear"></div>
		</div>

	</div>


<!-- Contact success -->
<div id="contact_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">Thanks for your idea, we will reply your email as soon as possible.</h3>
            </div>
        </div>
    </div>
</div>

<!-- //contact -->
