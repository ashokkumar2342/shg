<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add Member</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.shg.detail.selfhelpgroup.store.member',Crypt::encrypt($selfHelpGroupId)) }}" method="post" class="add_form" button-click="btn_close,view_update_button{{$selfHelpGroupId}}">
      {{ csrf_field() }}
      
      <div class="card-body"> 
        <div class="row"> 
          <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">Member Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="member_name" class="form-control" placeholder="Enter Member Name" maxlength="100">
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">Insurance Type</label>
              <span class="fa fa-asterisk"></span>
              <select name="insurance_type" id="insurance_type" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($InsuranceTypes as $InsuranceType)       
                  <option value="{{$InsuranceType->id}}">{{$InsuranceType->insurance_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">Aadhar No.</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="aadhar_no" class="form-control" placeholder="Enter Aadhar No" maxlength="12" minlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">PPP ID</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="ppp_id" class="form-control" placeholder="Enter PPP ID" maxlength="10">
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">Mobile No.</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">Bank Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="100">
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">Branch Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="branch_name" class="form-control" placeholder="Enter Branch Name" maxlength="100">
          </div>
          <div class="col-lg-4 form-group">
              <label for="exampleInputPassword1">Account No.</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="account_no" class="form-control" placeholder="Enter Account No." maxlength="30" minlength="9">
          </div>
          <div class="col-lg-4 form-group" style="margin-top:30px"> 
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary1" name="aadhar_seeded">
                <label for="checkboxPrimary1">Aadhar Seeded</label> 
              </div> 
            </div>
          </div>
          <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary form-control">Submit</button> 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
