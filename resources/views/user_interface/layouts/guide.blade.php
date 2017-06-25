  <div id="guideModal"  class="modal fade contact" role="dialog">
      <div class="modal-dialog"></div>

      <div class="container">
          <div class="contact-row agileits-w3layouts  grid_3 grid_4 contact_grid3 col-md-8 col-md-offset-2">
          <button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>
              <div class="agileits-title">
                  <h3 class="w3ls-hdg contact_tittle">How to study on this website effectively </h3>
              </div>
              <div style="width: 225px; margin:auto; padding-bottom: 25px; padding-top: 20px;">
                  <button class="btn_user info">Vietnamese</button>
                  <button class="btn_user info">English</button>
              </div>
              <div class="col-md-12 contact-w3lsleft">
                  <div class="guide-grid ">
                  @foreach($guide as $guide)
                     {!!htmlspecialchars_decode($guide->content)!!}
                  @endforeach
                  </div>
              </div>
              <div class="clearfix">
                  <button type="button" class="btn_user warning pull-right" data-dismiss="modal" style="margin-top: 20px;">Close</button>
              </div>
          </div>
      </div>
  </div>
