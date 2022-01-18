@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>VO Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="card card-default">
                    <div class="card-header" style="background-color:#979393;color: black;">
                        <h3 class="card-title"><b>First Level SHG Federation (VO) Profile</b></h3> 
                    </div>
                    <form action="{{ route('admin.vo.profile.store') }}" method="post" class="add_form" select-triger="gram_panchayat" no-reset="true" reset-input-text="group_name,formation_date,bank_name,branch_name,account_no,loan_account_no">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Gram Panchayat</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="gram_panchayat" class="form-control" id="gram_panchayat"  onchange="callAjax(this,'{{ route('admin.Master.GramPanchayatWiseVillage') }}','village_select_box');callAjax(this,'{{ route('admin.Master.GramPanchayatWiseVillage') }}','village_select_box1');callAjax(this,'{{ route('admin.vo.profile.list') }}','vo_profile_list')">
                                    <option selected disabled>Select Gram Panchayat</option>
                                    @foreach ($GramPanchayats as $GramPanchayat)
                                    <option value="{{ $GramPanchayat->id }}">{{ $GramPanchayat->code }}--{{ $GramPanchayat->name }}</option>  
                                    @endforeach   
                                         
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Village - 1</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="village_1" class="form-control" id="village_select_box" >
                                    <option selected disabled>Select Village</option>
                                     
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Village - 2</label> 
                                <select name="village_2" class="form-control" id="village_select_box1">
                                    <option selected disabled>Select Village</option>
                                     
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO Name</label>
                                 
                                <input type="text" name="vo_name" class="form-control" maxlength="100" placeholder="Enter VO Name">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Registration No.</label>
                                 
                                <input type="text" name="registration_no" class="form-control" maxlength="10" placeholder="Enter Registration No">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Renewal Date</label>
                                 
                                <input type="date" name="renewal_date" class="form-control">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO Office Setup</label>
                                 
                                <input type="text" name="vo_office_setup" class="form-control" maxlength="100" placeholder="Enter VO Office Setup">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO Office Address</label>
                                 
                                <input type="text" name="vo_office_address" class="form-control" maxlength="100" placeholder="Enter VO Office Address">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Share Capital</label>
                                 
                                <input type="text" name="share_capital" class="form-control" maxlength="15" placeholder="Enter Share Capital" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Monthly Subscription Amt.</label>
                                 
                                <input type="text" name="monthly_subscription_amt" class="form-control" maxlength="5" placeholder="Enter Monthly Subscription Amt." onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Annual Membership Fee</label>
                                 
                                <input type="text" name="annual_membership_fee" class="form-control" maxlength="5" placeholder="Enter Annual Membership Fee" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">Formation Restructure Date</label>
                                 
                                <input type="date" name="formation_restructure_date" class="form-control">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">CC AC CM Name</label>
                                 
                                <input type="text" name="cc_ac_cm_name" class="form-control" placeholder="Enter CC AC CM Name" maxlength="100">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">CC AC CM Mobile No.</label>
                                 
                                <input type="text" name="cc_ac_cm_mobile" class="form-control" placeholder="Enter CC AC CM Mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" minlength="10">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Book Keeper Name</label>
                                 
                                <input type="text" name="book_keeper_name" class="form-control" placeholder="Enter Book Keeper Name" maxlength="100">
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Book Keeper Mobile No.</label>
                                 
                                <input type="text" name="book_keeper_mobile" class="form-control" placeholder="Enter Book Keeper Mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" minlength="10">
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
                                
                                <input type="text" name="vo_general_accno" class="form-control" maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter VO General Account No.">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO General Bank Name</label>
                                
                                <input type="date" name="vo_gen_bank_name" class="form-control" maxlength="100">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO General Bank Branch</label>
                                
                                <input type="text" name="vo_gen_bank_branch" class="form-control" placeholder="Enter VO General Bank Branch" maxlength="100">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO CIF Account</label>
                                
                                <input type="text" name="vo_cif_accno" class="form-control" placeholder="Enter VO CIF Account" maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO CIF Bank Name</label>
                                
                                <input type="text" name="vo_cif_bank_name" class="form-control" placeholder="Enter Book Keeper Name" maxlength="100">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">VO CIF Bank Branch</label>
                                
                                <input type="text" name="vo_cif_bank_branch" class="form-control" placeholder="Enter Book Keeper Name" maxlength="100">
                            </div>
                            
                        </div> 
                    </div> 
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <div id="vo_profile_list">
                
            </div> 
        </div>
    </div> 
</section>
@endsection
@push('scripts')

@endpush  

