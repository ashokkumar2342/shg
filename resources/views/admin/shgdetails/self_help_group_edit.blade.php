<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add Member</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.shg.detail.selfhelpgroup.update',Crypt::encrypt($selfHelpGroupId)) }}" method="post" class="add_form" button-click="btn_close" select-triger="village_select_box">
          {{ csrf_field() }} 
              <div class="row">  
              <div class="col-lg-4 form-group">
                  <label for="exampleInputEmail1">Group Name</label> 
                  <span class="fa fa-asterisk"></span>
                  <input type="text" name="group_name" id="group_name" class="form-control" placeholder="Enter Group Name" maxlength="100" value="{{$selfHelpGroupList[0]->group_name}}">
              </div>
              <div class="col-lg-4 form-group">
                  <label for="exampleInputEmail1">NRLM SHG Code</label> 
                  <input type="text" name="shg_code" id="shg_code" class="form-control" placeholder="Enter NRLM SHG Code" maxlength="10" value="{{$selfHelpGroupList[0]->shg_code}}">
              </div>
              <div class="col-lg-4 form-group">
                  <label for="exampleInputEmail1">Formation Date</label> 
                  <input type="date" name="formation_date" id="formation_date" class="form-control" value="{{$selfHelpGroupList[0]->formation_date}}"> 
              </div>
              <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">SHG Type</label>
                  <select name="shg_type"  class="form-control">
                          <option selected disabled>Select SHG Type</option>
                          @foreach ($Shgtypes as $Shgtype)
                          <option value="{{ $Shgtype->id }}"{{ $Shgtype->id==$selfHelpGroupList[0]->shg_type_id?'selected':'' }}>{{ $Shgtype->shgtype_name }}</option>  
                          @endforeach
                  </select>
              </div>
              <div class="col-lg-4 form-group">
                  <label for="exampleInputEmail1">Date of Cooption</label> 
                  <input type="date" name="formation_date" id="formation_date" class="form-control" value="{{$selfHelpGroupList[0]->revival_date}}">
              </div>
              <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">Prometed By</label>
                  <select name="prometed_by"  class="form-control">
                          <option selected disabled>Select Prometed By</option>
                          @foreach ($shg_prometed_types as $shg_prometed_type)
                          <option value="{{ $shg_prometed_type->id }}"{{ $shg_prometed_type->id==$selfHelpGroupList[0]->promoted_by?'selected':'' }}>{{ $shg_prometed_type->type_name }}</option>  
                          @endforeach
                  </select>
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Bank Name</label> 
                  <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="100" value="{{$selfHelpGroupList[0]->bank_name}}">
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Branch Name</label> 
                  <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name" maxlength="100" value="{{$selfHelpGroupList[0]->bank_name}}">
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Account No.</label>
                  <input type="text" name="account_no" id="account_no" class="form-control" placeholder="Enter Account No." maxlength="9" maxlength="30" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$selfHelpGroupList[0]->account_no}}">
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Account Opening Date</label> 
                  <input type="date" name="account_opening_date" id="account_opening_date" class="form-control" value="{{$selfHelpGroupList[0]->account_opening_date}}">
              </div>
              <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">Shg Meeting Frequency</label>
                  <select name="shg_meeting_frequency"  class="form-control">
                          <option selected disabled>Select Meeting Frequency</option>
                          @foreach ($shg_meeting_frequencys as $shg_prometed_type)
                          <option value="{{ $shg_prometed_type->id }}"{{ $shg_prometed_type->id==$selfHelpGroupList[0]->meeting_frequency?'selected':'' }}>{{ $shg_prometed_type->type_code }}--{{ $shg_prometed_type->type_name }}</option>  
                          @endforeach
                  </select>
              </div>
              <div class="col-lg-4 form-group">
              <label for="exampleInputEmail1">Saving Amount</label>
                  <select name="saving_amount"  class="form-control">
                          <option selected disabled>Select saving Amount</option>
                          @foreach ($saving_amts as $shg_prometed_type)
                          <option value="{{ $shg_prometed_type->id }}"{{ $shg_prometed_type->id==$selfHelpGroupList[0]->saving_amt?'selected':'' }}>{{ $shg_prometed_type->amt }}</option>  
                          @endforeach
                  </select>
              </div>
              {{-- <div class="col-lg-3 form-group text-center">
                  <label for="exampleInputEmail1">Basic Traning Received</label>
                  <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary3" name="basic_traininge" value="0" checked>
                      <label for="radioPrimary3">NO</label> 
                    </div> &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="basic_training" value="1">
                      <label for="radioPrimary1">Yes</label> 
                    </div> 
                  </div>
              </div> --}} 
              <div class="col-lg-4 form-group">
                  <label for="exampleInputEmail1">Loan Account No.</label> 
                  <input type="text" name="loan_account_no" id="loan_account_no" class="form-control" placeholder="Enter Loan Account No." maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$selfHelpGroupList[0]->loan_account_no}}">
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Subsidy Amount</label> 
                  <input type="text" name="subsidy_amt" id="subsidy_amt" class="form-control" placeholder="Enter Loan Account No." maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$selfHelpGroupList[0]->subsidy_amt}}">
              </div>
              <div class="col-lg-3 form-group">
              <label for="exampleInputEmail1">Amount of Capital</label>
                  <select name="amount_of_capital"  class="form-control">
                          <option selected disabled>Select Amount of Capital</option>
                          @foreach ($saving_amts as $shg_prometed_type)
                          <option value="{{ $shg_prometed_type->id }}"{{ $shg_prometed_type->id==$selfHelpGroupList[0]->trained_bookkeeper?'selected':'' }}>{{ $shg_prometed_type->amt }}</option>  
                          @endforeach
                  </select>
              </div>
              <div class="col-lg-3 form-group">
              <label for="exampleInputEmail1">Trained Bookkeeper No.</label>
                  <select name="trained_bookkeeper_no"  class="form-control">
                          <option selected disabled>Select Trained Bookkeeper No.</option>
                          @foreach ($trained_bookkeeper_opt as $shg_prometed_type)
                          <option value="{{ $shg_prometed_type->id }}"{{ $shg_prometed_type->id==$selfHelpGroupList[0]->trained_bookkeeper?'selected':'' }}>{{ $shg_prometed_type->opt_name }}</option>  
                          @endforeach
                  </select>
              </div>
              <div class="col-lg-3 form-group">
                  <label for="exampleInputEmail1">Name of Bookkeeper</label> 
                  <input type="text" name="name_of_bookkeeper" id="name_of_bookkeeper" class="form-control" placeholder="Enter Name of Bookkeeper Name" maxlength="100" value="{{ $selfHelpGroupList[0]->book_keeper_name }}">
              </div> 
          </div> 
          <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
    </div>
  </div>
</div>

