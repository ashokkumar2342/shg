<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Member</h4>
      <button type="button" id="btn_close1" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.shg.detail.selfhelpgroup.update.member',Crypt::encrypt($shg_member_detail_id)) }}" method="post" class="add_form" button-click="btn_close1,view_update_button{{$selfHelpGroupid}}">
      {{ csrf_field() }}
      
      <div class="card-body"> 
        <div class="row"> 
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Member Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="member_name" class="form-control" placeholder="Enter Member Name" maxlength="100" value="{{$rs_updates[0]->member_name}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Father/Husband Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="father_husband_name" class="form-control" placeholder="Enter Father/Husband Name" maxlength="100" value="{{$rs_updates[0]->father_husband_name}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option selected disabled>Select Gender Type</option>
                @foreach ($gender_type as $gender_typ)       
                  <option value="{{$gender_typ->id}}">{{$gender_typ->gender_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Relation</label>
              <select name="relation" id="relation" class="form-control">
                <option selected disabled>Select Relation Type</option>
                @foreach ($relation_type as $relation_type)       
                  <option value="{{$relation_type->id}}">{{$relation_type->relation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Religion</label>
              <select name="religion" id="religion" class="form-control">
                <option selected disabled>Select Religion Type</option>
                @foreach ($religion_type as $religion_typ)       
                  <option value="{{$religion_typ->id}}">{{$religion_typ->type_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Disability</label>
              <select name="disability" id="disability" class="form-control">
                <option selected disabled>Select Disability Type</option>
                @foreach ($disability_type as $disability_type)       
                  <option value="{{$disability_type->id}}">{{$disability_type->type_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">PIP Category</label>
              <select name="pip_category" id="religion" class="form-control">
                <option selected disabled>Select PIP Category</option>
                @foreach ($pip_category as $pip_category)       
                  <option value="{{$pip_category->id}}">{{$pip_category->type_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Education Level</label>
              <select name="education_level" id="education_level" class="form-control">
                <option selected disabled>Select Education Level</option>
                @foreach ($education_level as $education_level)       
                  <option value="{{$education_level->id}}">{{$education_level->edu_level_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Insurance Type</label>
              <span class="fa fa-asterisk"></span>
              <select name="insurance_type" id="insurance_type" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($InsuranceTypes as $InsuranceType)       
                  <option value="{{$InsuranceType->id}}">{{$InsuranceType->insurance_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Aadhar No.</label>
              
              <input type="text" name="aadhar_no" class="form-control" placeholder="Enter Aadhar No" maxlength="12" minlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">PPP ID</label>
              
              <input type="text" name="ppp_id" class="form-control" placeholder="Enter PPP ID" maxlength="10">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Mobile No.</label>
              
              <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Bank Name</label>
              
              <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="100">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Branch Name</label>
              
              <input type="text" name="branch_name" class="form-control" placeholder="Enter Branch Name" maxlength="100">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Account No.</label>
              
              <input type="text" name="account_no" class="form-control" placeholder="Enter Account No." maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
          </div>
          <div class="col-lg-6 form-group" style="margin-top:30px"> 
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary1" name="aadhar_seeded" value="1">
                <label for="checkboxPrimary1">Aadhar Seeded</label> 
              </div> 
            </div>
          </div>
          <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary form-control">Update</button> 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

