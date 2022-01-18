@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Self Help Group</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"> 
                            <form action="{{ route('admin.shg.detail.selfhelpgroup.store') }}" method="post" class="add_form" select-triger="village_select_box" no-reset="true" reset-input-text="group_name,formation_date,bank_name,branch_name,account_no,loan_account_no">
                                {{ csrf_field() }} 
                                    <div class="row"> 
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">States</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="states" id="state_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.Master.stateWiseDistrict') }}','district_select_box')">
                                            <option selected disabled>Select States</option>
                                            @foreach ($States as $State)
                                            <option value="{{ $State->id }}">{{ $State->code }}--{{ $State->name }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')">
                                            <option selected disabled>Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Block MCS</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="block_mc" class="form-control" id="block_select_box"  onchange="callAjax(this,'{{ route('admin.Master.BlockWiseGramPanchayat') }}','gram_panchayat')">
                                            <option selected disabled>Select Block MCS</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Gram Panchayat</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="gram_panchayat" class="form-control" id="gram_panchayat" data-table="district_table" onchange="callAjax(this,'{{ route('admin.Master.GramPanchayatWiseVillage') }}','village_select_box')">
                                            <option selected disabled>Select Gram Panchayat</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control" id="village_select_box" data-table="self_group" onchange="callAjax(this,'{{ route('admin.shg.detail.selfhelpgroup.list') }}','self_help_group_list')">
                                            <option selected disabled>Select Village</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Group Name</label> 
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="group_name" id="group_name" class="form-control" placeholder="Enter Group Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">NRLM SHG Code</label>
                                        
                                        <input type="text" name="shg_code" id="shg_code" class="form-control" placeholder="Enter NRLM SHG Code" maxlength="10">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Formation Date</label>
                                        
                                        <input type="date" name="formation_date" id="formation_date" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">SHG Type</label>
                                        <select name="shg_type"  class="form-control">
                                                <option selected disabled>Select SHG Type</option>
                                                @foreach ($Shgtypes as $Shgtype)
                                                <option value="{{ $Shgtype->id }}">{{ $Shgtype->shgtype_name }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Date of Cooption</label>
                                        
                                        <input type="date" name="formation_date" id="formation_date" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Prometed By</label>
                                        <select name="prometed_by"  class="form-control">
                                                <option selected disabled>Select Prometed By</option>
                                                @foreach ($shg_prometed_types as $shg_prometed_type)
                                                <option value="{{ $shg_prometed_type->id }}">{{ $shg_prometed_type->type_name }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        
                                        <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Branch Name</label>
                                        
                                        <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Account No.</label>
                                        
                                        <input type="text" name="account_no" id="account_no" class="form-control" placeholder="Enter Account No." maxlength="9" maxlength="30" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Account Opening Date</label>
                                        
                                        <input type="date" name="account_opening_date" id="account_opening_date" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Shg Meeting Frequency</label>
                                        <select name="shg_meeting_frequency"  class="form-control">
                                                <option selected disabled>Select Meeting Frequency</option>
                                                @foreach ($shg_meeting_frequencys as $shg_prometed_type)
                                                <option value="{{ $shg_prometed_type->id }}">{{ $shg_prometed_type->type_code }}--{{ $shg_prometed_type->type_name }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Saving Amount</label>
                                        <select name="saving_amount"  class="form-control">
                                                <option selected disabled>Select saving Amount</option>
                                                @foreach ($saving_amts as $shg_prometed_type)
                                                <option value="{{ $shg_prometed_type->id }}">{{ $shg_prometed_type->amt }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group text-center">
                                        <label for="exampleInputEmail1">Basic Traning Received</label>
                                        <div class="form-group clearfix">
                                          <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary3" name="basic_training" value="0" checked>
                                            <label for="radioPrimary3">NO</label> 
                                          </div> &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1" name="basic_training" value="1">
                                            <label for="radioPrimary1">Yes</label> 
                                          </div> 
                                        </div>
                                    </div> 
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Loan Account No.</label>
                                        
                                        <input type="text" name="loan_account_no" id="loan_account_no" class="form-control" placeholder="Enter Loan Account No." maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Subsidy Amount</label>
                                        
                                        <input type="text" name="subsidy_amt" id="subsidy_amt" class="form-control" placeholder="Enter Loan Account No." maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Amount of Capital</label>
                                        <select name="amount_of_capital"  class="form-control">
                                                <option selected disabled>Select Amount of Capital</option>
                                                @foreach ($saving_amts as $shg_prometed_type)
                                                <option value="{{ $shg_prometed_type->id }}">{{ $shg_prometed_type->amt }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                    <label for="exampleInputEmail1">Trained Bookkeeper No.</label>
                                        <select name="trained_bookkeeper_no"  class="form-control">
                                                <option selected disabled>Select Trained Bookkeeper No.</option>
                                                @foreach ($trained_bookkeeper_opt as $shg_prometed_type)
                                                <option value="{{ $shg_prometed_type->id }}">{{ $shg_prometed_type->opt_name }}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="exampleInputEmail1">Name of Bookkeeper</label>
                                        
                                        <input type="text" name="name_of_bookkeeper" id="name_of_bookkeeper" class="form-control" placeholder="Enter Name of Bookkeeper Name" maxlength="100">
                                    </div> 
                                </div> 
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form> 
                    </div> 
                    <div class="col-lg-12" id="self_help_group_list">
                        
                    </div>
            </div> 
        </div> 
    </section>
    @endsection
    @push('scripts')
    <script type="text/javascript"> 
        $('#btn_click_by_form').click();
    </script> 
  @endpush  

