
<!-- Modal Add Detail-->

<div id="addcontactModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Add contact</h3>
            </div>

            <form action="" method="post" class="form-horizontal" role="form" id="validate_add_contact"  name="validate_add_contact">
                <div class="modal-body modal-body-detail">

                    <div class="form-group">
                        <label class="col-md-1 control-label">prior</label>
                        <div class="col-md-10">
                            <select name="prior_contact" id="prior_contact" class="form-control" >
                                <option disabled selected hidden>Please Choose Prior...</option>
                                <option value="1">show</option>
                                <option value="2">hide</option>
                           </select>
                        </div>
                        <div class="has-error"><i><span class="help-block error_tittle_add_contact"></span></i></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Address</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="address_contact" id="address_contact" placeholder="Cau Giay - Ha Noi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Phone</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="phone_contact" id="phone_contact" placeholder="+84 989 666 888">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="email_contact" id="email_contact" placeholder="email@gmail.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Hour Week</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hour_week_contact" id="hour_week_contact" placeholder="8:00 am to 9:00 pm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Hour Weekend</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hour_weekend_contact" id="hour_weekend_contact" placeholder="8:00 am to 9:00 pm">
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-body-footer">
                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" id="submit" class="btn_admin primary pull-left">Submit</button>
                            <button type="reset" class="btn_admin warning  pull-left">Reset</button>
                			<button type="button" class="btn_admin danger pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- message add success -->

<div id="add_contact_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">contact has added successfully !</h3>
            </div>
        </div>
    </div>
</div>