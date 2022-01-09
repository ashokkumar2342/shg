<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit VO Profile</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="card card-default">
            <div class="card-header" style="background-color:#979393;color: black;">
                <h3 class="card-title"><b>First Level SHG Federation (VO) Profile</b></h3> 
            </div>
            <form action="{{ route('admin.vo.profile.update',Crypt::encrypt($vo_profile_id)) }}" method="post" class="add_form" select-triger="gram_panchayat" button-click="btn_close">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO Name</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_name" class="form-control" maxlength="100" placeholder="Enter VO Name" value="{{$voProfileList[0]->vo_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Registration No.</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="registration_no" class="form-control" maxlength="10" placeholder="Enter Registration No" value="{{$voProfileList[0]->registration_no}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Renewal Date</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="date" name="renewal_date" class="form-control" value="{{$voProfileList[0]->renewal_date}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO Office Setup</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_office_setup" class="form-control" maxlength="100" placeholder="Enter VO Office Setup" value="{{$voProfileList[0]->vo_office_setup}}"> 
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO Office Address</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_office_address" class="form-control" maxlength="100" placeholder="Enter VO Office Address" value="{{$voProfileList[0]->vo_office_address}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Share Capital</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="share_capital" class="form-control" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Share Capital" value="{{$voProfileList[0]->share_capital}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Monthly Subscription Amt.</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="monthly_subscription_amt" class="form-control" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Monthly Subscription Amt." value="{{$voProfileList[0]->monthly_subscription_amt}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Annual Membership Fee</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="annual_membership_fee" class="form-control" maxlength="8" placeholder="Enter Annual Membership Fee" value="{{$voProfileList[0]->annual_membership_fee}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Formation Restructure Date</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="date" name="formation_restructure_date" class="form-control" value="{{$voProfileList[0]->formation_restructure_date}}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label for="exampleInputEmail1">CC AC CM Name</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="cc_ac_cm_name" class="form-control" placeholder="Enter CC AC CM Name" maxlength="50" value="{{$voProfileList[0]->cc_ac_cm_name}}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label for="exampleInputEmail1">CC AC CM Mobile No.</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="cc_ac_cm_mobile" class="form-control" placeholder="Enter CC AC CM Mobile" maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$voProfileList[0]->cc_ac_cm_mobile}}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label for="exampleInputEmail1">Book Keeper Name</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="book_keeper_name" class="form-control" maxlength="100" placeholder="Enter Book Keeper Name" value="{{$voProfileList[0]->book_keeper_name}}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label for="exampleInputEmail1">Book Keeper Mobile No.</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="book_keeper_mobile" class="form-control" placeholder="Enter Book Keeper Mobile" maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$voProfileList[0]->book_keeper_mobile}}">
                    </div>
                </div> 
            </div> 
       
        <div class="card card-default">
            <div class="card-header" style="background-color:#979393;color: black;">
                <h3 class="card-title"><b>Details of Bank Accounts</b></h3> 
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO General Account No.</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_general_accno" class="form-control" maxlength="30" minlength="9" placeholder="Enter VO General Account No." value="{{$voProfileList[0]->vo_general_accno}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO General Bank Name</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="date" name="vo_gen_bank_name" maxlength="100" class="form-control" value="{{$voProfileList[0]->vo_gen_bank_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO General Bank Branch</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_gen_bank_branch" class="form-control" maxlength="100" placeholder="Enter VO General Bank Branch" value="{{$voProfileList[0]->vo_gen_bank_branch}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO CIF Account</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_cif_accno" class="form-control" maxlength="30" minlength="9" placeholder="Enter VO CIF Account" value="{{$voProfileList[0]->vo_cif_accno}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO CIF Bank Name</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_cif_bank_name" class="form-control" maxlength="100" placeholder="Enter Book Keeper Name" value="{{$voProfileList[0]->vo_cif_bank_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">VO CIF Bank Branch</label>
                        <span class="fa fa-asterisk"></span> 
                        <input type="text" name="vo_cif_bank_branch" class="form-control" maxlength="100" placeholder="Enter Book Keeper Name" value="{{$voProfileList[0]->vo_cif_bank_branch}}">
                    </div>
                    
                </div> 
            </div> 
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
    </div>
  </div>
</div>

