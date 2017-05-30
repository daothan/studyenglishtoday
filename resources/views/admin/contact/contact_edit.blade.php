
<!-- Modal Add Detail-->

<div id="editcontactModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-detail">
        <div class="content modal_background">
            <div class="panel-title">
                <h3 class="modal_header" align="center">Edit contact</h3>
            </div>

            <form action="" method="post" class="form-horizontal" role="form" id="validate_edit_contact"  name="validate_edit_contact">
                <div class="modal-body modal-body-detail">
                    <input type="text" name="old_id_contact" id="old_id_contact">
                    <div class="form-group">
                        <label class="col-md-1 control-label">prior</label>
                        <div class="col-md-10">
                            <select name="prior_contact_edit" id="prior_contact_edit" class="form-control" >
                                <option disabled selected hidden>Please Choose Prior...</option>
                                <option value="1">show</option>
                                <option value="2">hide</option>
                           </select>
                        </div>
                        <div class="has-error"><i><span class="help-block error_tittle_edit_contact"></span></i></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Address</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="address_contact_edit" id="address_contact_edit" placeholder="Cau Giay - Ha Noi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Phone</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="phone_contact_edit" id="phone_contact_edit" placeholder="+84 989 666 888">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="email_contact_edit" id="email_contact_edit" placeholder="email@gmail.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Hour Week</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hour_week_contact_edit" id="hour_week_contact_edit" placeholder="8:00 am to 9:00 pm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Hour Weekend</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hour_weekend_contact_edit" id="hour_weekend_contact_edit" placeholder="8:00 am to 9:00 pm">
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

<div id="edit_contact_success" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h3 align="center" style="color:green;">Contact has edited successfully !</h3>
            </div>
        </div>
    </div>
</div>