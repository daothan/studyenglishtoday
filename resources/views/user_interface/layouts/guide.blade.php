  <div id="guideModal"  class="modal fade contact" role="dialog" style="padding-top: 20px;">
      <div class="modal-dialog "></div>

      <div class="container content-w3ls" style="padding: 50px 0px 50px 0px;">
          <div class="contact-row agileits-w3layouts  grid_3 grid_4 contact_grid3 col-md-10 col-md-offset-1" style="background-color: rgba(27, 32, 88, 0.75)">
          <button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;padding: 15px 0px;"><span class="glyphicon glyphicon-remove"></span></button>
              <div style="width: 260px; margin:auto; padding-bottom: 25px; padding-top: 20px;" class="button_guide">
                  <button class="btn_user info" id="btn_vi">Vietnamese</button>
                  <button class="btn_user info" id="btn_en">English</button>
              </div>
              <div class="col-md-12 contact-w3lsleft" id="VI">
                  @foreach($guide_vi as $guide)
                    <div class="agileits-title">
                      <h3 class="w3ls-hdg contact_tittle">{{$guide->tittle}}</h3>
                     </div>
                    <div class="guide-grid ">
                       {!!htmlspecialchars_decode($guide->content)!!}
                    </div>
                  @endforeach
              </div>
              <div class="col-md-12 contact-w3lsleft" id="EN">
                  @foreach($guide_en as $guide)
                    <div class="agileits-title">
                      <h3 class="w3ls-hdg contact_tittle">{{$guide->tittle}}</h3>
                    </div>
                    <div class="guide-grid ">
                       {!!htmlspecialchars_decode($guide->content)!!}
                    </div>
                  @endforeach
              </div>
              <div class="clearfix">
                  <button type="button" class="btn_user warning pull-right" data-dismiss="modal" style="margin-top: 20px;">Close</button>
              </div>
          </div>
      </div>
  </div>

