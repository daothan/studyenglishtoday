<!-- contact -->
	<div id="contactModal"  class="modal fade contact" role="dialog">
		<div class="modal-dialog"></div>

		<div class="container">
			<div class="contact-row agileits-w3layouts  grid_3 grid_4 contact_grid3">
			<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>
				<div class="agileits-title">
					<h3 class="w3ls-hdg contact_tittle">Contact Us </h3>
				</div>
				<div class="col-md-5 contact-w3lsleft">
					<div class="contact-grid agileits">
						<form action="" method="post" id="contact_validate">
							<h4 class="loading" align="center"></h4>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="name_contact" id="name_contact" placeholder="Name">							</div>
							<div class="styled-input">
								<input type="text" name="email_contact" id="email_contact" placeholder="Email">
							</div>
							<div class="styled-input">
								<textarea name="message_contact" id="message_contact" placeholder="Message"></textarea>
							</div>
							<input type="submit" value="SUBMIT" id="submit">
							<input type="reset" value="RESET">
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
							@foreach($contact as $data)
							<p>{{$data->address}} <br></p>
							@endforeach
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row w3-agileits">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Mail Us</h5>
							@foreach($contact as $data)
							<p><a href="mailto:info@example.com">{{$data->email}}</a></p>
							@endforeach
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Call Us</h5>
							@foreach($contact as $data)
							<p>{{$data->phone}}<br></p>
							@endforeach
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-xs-6 address-row">
						<div class="col-xs-3 address-left">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 address-right">
							<h5>Working Hours</h5>
							@foreach($last_contact as $data)
							<p>Mon - Fri : {{$data->hour_week}}<br>
							Sat - Sun : {{$data->hour_weekend}}</p>
							@endforeach
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

<!-- Contact success -->
<div id="loading" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h3 align="center" style="color:green;">Please wait...</h3>
      </div>
  </div>
</div>
