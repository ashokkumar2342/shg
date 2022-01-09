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
                                            <option selected disabled>Select Gram Panchayat</option>
                                             
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Group Name</label> 
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="group_name" id="group_name" class="form-control" placeholder="Enter Group Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">NRLM SHG Code</label>
                                        
                                        <input type="text" name="shg_code" id="shg_code" class="form-control" placeholder="Enter NRLM SHG Code" maxlength="10">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Formation Date</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="date" name="formation_date" id="formation_date" class="form-control">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Branch Name</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name" maxlength="100">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Account No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="account_no" id="account_no" class="form-control" placeholder="Enter Account No." maxlength="30">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Loan Account No.</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="loan_account_no" id="loan_account_no" class="form-control" placeholder="Enter Loan Account No." maxlength="30">
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

