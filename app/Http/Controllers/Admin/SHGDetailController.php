<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\BlocksMc;
use App\Model\GramPanchayat; 
use App\Model\District;
use App\Model\Gender;
use App\Model\State;
use App\Model\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PDF;

class SHGDetailController extends Controller
{
   
    public function selfHelpGroup()
    {
         try {
            
          $States= State::orderBy('name','ASC')->get();
          $Shgtypes=DB::select(DB::raw("select * from `shg_type`;")); 
          $shg_prometed_types=DB::select(DB::raw("select * from `shg_prometed_type`;")); 
          $shg_meeting_frequencys=DB::select(DB::raw("select * from `shg_meeting_frequency`;")); 
          $saving_amts=DB::select(DB::raw("select * from `saving_amt`;")); 
          $trained_bookkeeper_opt=DB::select(DB::raw("select * from `trained_bookkeeper_opt`;")); 
           
          return view('admin.shgdetails.self_help_group',compact('States','Shgtypes','shg_prometed_types','shg_meeting_frequencys','saving_amts','trained_bookkeeper_opt'));
        } catch (Exception $e) {
            
        }
    }
    public function selfHelpGroupStore(Request $request)
    {
        try {
            $rules=[
             
            'states' => 'required', 
            'district' => 'required',  
            'block_mc' => 'required',  
            'gram_panchayat' => 'required',  
            'village' => 'required',  
            'group_name' => 'required', 
           
           
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $formation_date=date('Y-m-d',strtotime($request->formation_date));
        
        $selfHelpGroup=DB::select(DB::raw("insert into `selfhelpgroups` (`state_id` , `district_id` , `block_id` , `panchayat_id` , `village_id` , `group_name`, `shg_type_id` , `revival_date`, `promoted_by` , `account_opening_date` ,`shg_code` , `formation_date` , `bank_name` , `branch_name` , `account_no` , `loan_account_no` , `meeting_frequency` , `saving_amt` , `basic_training`, `subsidy_amt`, `trained_bookkeeper`, `book_keeper_name`) values ($request->states , $request->district , $request->block_mc ,$request->gram_panchayat , $request->village , '$request->group_name' , '$request->shg_type' ,'2020-12-12', '$request->prometed_by' , '$request->account_opening_date' ,'$request->shg_code' , '$formation_date' , '$request->bank_name' , '$request->branch_name' , '$request->account_no' , '$request->loan_account_no', '$request->shg_meeting_frequency', '$request->saving_amount', '$request->basic_training', '$request->subsidy_amt', '$request->trained_bookkeeper_no' ,'$request->name_of_bookkeeper');"));
        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }
    public function selfHelpGroupList(Request $request)
    {
       $selfHelpGroupList=DB::select(DB::raw(" select * from `selfhelpgroups` where `village_id`='$request->id'"));
       return view('admin.shgdetails.self_help_group_list',compact('selfHelpGroupList'));   
    }
    public function selfHelpGroupAdd($id)
    {
        $selfHelpGroupId=Crypt::decrypt($id);
        $InsuranceTypes=DB::select(DB::raw(" select * from `insurance_type`;"));
        $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
        $relation_type=DB::select(DB::raw("select * from `relation_type`;"));
        $religion_type=DB::select(DB::raw("select * from `religion_type`;"));
        $disability_type=DB::select(DB::raw("select * from `disability_type`;"));
        $pip_category=DB::select(DB::raw("select * from `pip_category`;"));
        $education_level=DB::select(DB::raw("select * from `education_level`;"));
       return view('admin.shgdetails.add_member',compact('selfHelpGroupId','InsuranceTypes','gender_type','relation_type','religion_type','disability_type','pip_category','education_level'));   
    }
    public function selfHelpGroupAddLeb2($id)
    {
       $selfHelpGroupId=Crypt::decrypt($id);
       $InsuranceTypes=DB::select(DB::raw(" select * from `insurance_type`;"));
       return view('admin.shgdetails.add_member_label2',compact('selfHelpGroupId','InsuranceTypes'));   
    }
    public function selfHelpGroupStoreMember(Request $request ,$id)
    {
        try {
            $rules=[ 
            'member_name' => 'required', 
            'insurance_type' => 'required', 
            'aadhar_no' => 'required', 
            'ppp_id' => 'required', 
            'mobile_no' => 'required', 
            'bank_name' => 'required', 
            'branch_name' => 'required', 
            'account_no' => 'required', 
            ];
            
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            }
            $selfHelpGroupid=Crypt::decrypt($id); 
            $selfHelpGroup=DB::select(DB::raw("insert into `shg_member_detail` (`shg_id` ,`member_name`, `relation_name` , `gender` , `relation_id` , `religion_id` , `disability_id` , `pip_category` , `education` , `insurance_type` , `aadhar_no` , `ppp_id` , `mobile_no` , `bank_name` , `branch_name` , `account_no` , `aadhar_seeded` ) values ($selfHelpGroupid , '$request->member_name' , '$request->father_husband_name' , '$request->gender' , '$request->relation' , '$request->religion' , '$request->disability' , '$request->pip_category' , '$request->education_level' , '$request->insurance_type' , '$request->aadhar_no' , '$request->ppp_id' ,' $request->mobile_no' ,'$request->bank_name' , '$request->branch_name' , '$request->account_no' ,1);"));
            $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }
    public function selfHelpGroupViewMember($id)
    {
       $selfHelpGroupid=Crypt::decrypt($id);
       $groupName=DB::select(DB::raw(" select * from `selfhelpgroups` where `id`='$selfHelpGroupid';"));
       $rs_updates=DB::select(DB::raw(" select * from `shg_member_detail` where `shg_id`='$selfHelpGroupid';"));
       return view('admin.shgdetails.view_member',compact('rs_updates','groupName','selfHelpGroupid'));   
    }

     public function selfHelpGroupEditMember($id,$selfHelpGroupid)
    {
       $shg_member_detail_id=Crypt::decrypt($id);
       $InsuranceTypes=DB::select(DB::raw(" select * from `insurance_type`;"));
       $rs_updates=DB::select(DB::raw(" select * from `shg_member_detail` where `id`='$shg_member_detail_id';"));
       return view('admin.shgdetails.edit_member',compact('rs_updates','InsuranceTypes','shg_member_detail_id','selfHelpGroupid'));   
    }

    public function selfHelpGroupUpdateMember(Request $request ,$id)
    {
        try {
            $rules=[ 
            'member_name' => 'required', 
            'insurance_type' => 'required', 
            'aadhar_no' => 'required', 
            'ppp_id' => 'required', 
            'mobile_no' => 'required', 
            'bank_name' => 'required', 
            'branch_name' => 'required', 
            'account_no' => 'required', 
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            }
            $shg_member_detail_id=Crypt::decrypt($id); 
            $shg_member_detail_update=DB::select(DB::raw("update `shg_member_detail` set `member_name` = '$request->member_name' , `insurance_type` =$request->insurance_type , `aadhar_no` ='$request->aadhar_no' , `ppp_id` ='$request->ppp_id' , `mobile_no` =$request->mobile_no , `bank_name` ='$request->bank_name' , `branch_name` ='$request->branch_name' , `account_no` ='$request->account_no' where `id` =$shg_member_detail_id;"));
            $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }
    public function voProfile()
    {
        try {
            
          $GramPanchayats=DB::select(DB::raw("select `id` , `name` , `code` from `gram_panchayat`;"));  
          return view('admin.voProfile.index',compact('GramPanchayats'));
        } catch (Exception $e) {
            
        }
    }
    public function voProfileStore(Request $request)
    {
        try {
            $rules=[ 
            'gram_panchayat' => 'required', 
            'village_1' => 'required',  
            'vo_name' => 'required', 
            'registration_no' => 'required', 
            
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            }
             
            $first_level_vo_profile=DB::select(DB::raw("insert into `first_level_vo_profile` (`panchayat_id` ,`village_id1`, `village_id2` , `vo_name` , `registration_no` , `renewal_date` , `vo_office_setup` , `vo_office_address` , `share_capital` , `monthly_subscription_amt`, `annual_membership_fee` , `formation_restructure_date`  , `cc_ac_cm_name`  , `cc_ac_cm_mobile`  , `book_keeper_name` , `book_keeper_mobile` , `vo_general_accno`  , `vo_gen_bank_name`  , `vo_gen_bank_branch`  , `vo_cif_accno`  , `vo_cif_bank_name` , `vo_cif_bank_branch`) values ('$request->gram_panchayat' ,$request->village_1 , $request->village_2 , '$request->vo_name' ,'$request->registration_no' ,'$request->renewal_date' , '$request->vo_office_setup' , '$request->vo_office_address' , '$request->share_capital' , '$request->monthly_subscription_amt' , '$request->annual_membership_fee' , '$request->formation_restructure_date' , '$request->cc_ac_cm_name' , '$request->cc_ac_cm_mobile' , '$request->book_keeper_name' , '$request->book_keeper_mobile' , '$request->vo_general_accno' , '$request->vo_gen_bank_name' , '$request->vo_gen_bank_branch' , '$request->vo_cif_accno' , '$request->vo_cif_bank_name' , '$request->vo_cif_bank_branch');"));
            $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }
    public function voProfileList(Request $request)
    {
       $voProfileLists=DB::select(DB::raw(" select * from `first_level_vo_profile` where `panchayat_id`='$request->id'"));
       return view('admin.voProfile.vo_list',compact('voProfileLists'));   
    }
    public function voProfileEdit($id)
    {
        $vo_profile_id=Crypt::decrypt($id);
        $voProfileList=DB::select(DB::raw(" select * from `first_level_vo_profile` where `id`=$vo_profile_id;"));
        return view('admin.voProfile.vo_edit',compact('vo_profile_id','voProfileList'));   
    }
    public function voProfileUpdate(Request $request , $id)
    {   
        $rules=[  
        'vo_name' => 'required', 
        'registration_no' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $vo_profile_id=Crypt::decrypt($id);    
        $first_level_vo_profile=DB::select(DB::raw("update `first_level_vo_profile` set `vo_name` = '$request->vo_name' , `registration_no` = '$request->registration_no' , `renewal_date` = '$request->renewal_date', `vo_office_setup` = '$request->vo_office_setup' , `vo_office_address` = '$request->vo_office_address' , `share_capital` = '$request->share_capital' , `monthly_subscription_amt` = '$request->monthly_subscription_amt' , `annual_membership_fee` = '$request->annual_membership_fee' , `formation_restructure_date` = '$request->formation_restructure_date' , `cc_ac_cm_name` = '$request->cc_ac_cm_name' , `cc_ac_cm_mobile` = '$request->cc_ac_cm_mobile' , `book_keeper_name` = '$request->book_keeper_name' , `book_keeper_mobile` = '$request->book_keeper_mobile' , `vo_general_accno` = '$request->vo_general_accno' , `vo_gen_bank_name` = '$request->vo_gen_bank_name' , `vo_gen_bank_branch` = '$request->vo_gen_bank_branch' , `vo_cif_accno` = '$request->vo_cif_accno' , `vo_cif_bank_name` = '$request->vo_cif_bank_name' , `vo_cif_bank_branch` = '$request->vo_cif_bank_branch' where `id` = $vo_profile_id;"));
        $response=['status'=>1,'msg'=>'update Successfully'];
        return response()->json($response);
    }
    public function addSHG($id)
    {   
        $vo_profile_id=Crypt::decrypt($id);
        $village_id=DB::select(DB::raw(" select `village_id1` , `village_id2`  from `first_level_vo_profile` where `id`='$vo_profile_id'"));
        $village_id1=$village_id[0]->village_id1;
        if (empty($village_id[0]->village_id2)) {
            $village_id2=0;
        }
        if (!empty($village_id[0]->village_id2)) {
            $village_id2=$village_id[0]->village_id2;
        }
        
        $selfHelpGroupList=DB::select(DB::raw(" select * from `selfhelpgroups` where `village_id` in ($village_id1 , $village_id2) and `id` not in (select distinct `shg_id` from `vo_shg_detail` where `village_id` in ($village_id1 , $village_id2));"));
        return view('admin.voProfile.add_shg',compact('vo_profile_id','village_id1','village_id2','selfHelpGroupList'));
    }
    public function shgWiseMember(Request $request)
    {   
        
        $ShgMemberLists=DB::select(DB::raw("select `id` , `member_name` , `mobile_no`  from `shg_member_detail` where `shg_id`=$request->id;"));
        $designation_ec=DB::select(DB::raw("select * from `designation_ec`"));
        return view('admin.voProfile.add_shg_form',compact('designation_ec','ShgMemberLists'));
    }
    public function ShgStore(Request $request , $vo_id , $village_id)
    {   
        try {
            $rules=[ 
            'shg_name_id' => 'required', 
            'joining_date' => 'required', 
            'shg_member_1' => 'required', 
            'designation_memeber_1' => 'required', 
              
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            }
            $vo_profile_id=Crypt::decrypt($vo_id);
            $village_id=Crypt::decrypt($village_id);
            $first_level_vo_profile=DB::select(DB::raw("insert into `vo_shg_detail` (`vo_id` ,`village_id`, `shg_id` , `joining_date` , `shg_member_detail_id_1` , `shg_member_detail_id_2` , `designation_memeber_1` , `designation_memeber_2`) values ($vo_profile_id , $village_id , $request->shg_name_id , '$request->joining_date' , $request->shg_member_1 , $request->shg_member_2 , $request->designation_memeber_1 , $request->designation_memeber_2);"));
            $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }  
       
    }
    public function ShgViewList($id)
    {   
        $vo_id=Crypt::decrypt($id);
        $voProfileLists=DB::select(DB::raw("select `vsd`.`id`, `vil`.`name` as `vil_name`, `shg`.`group_name` as `shg_name`,
        `shg`.`shg_code`, `vsd`.`joining_date`, `smd_1`.`member_name` as `member_1`,
        `smd_2`.`member_name` as `member_2`, `des_1`.`designation_name` as `designation_1`, `des_2`.`designation_name` as `designation_2`,
        `smd_1`.`mobile_no` as `mobile_1`, `smd_2`.`mobile_no` as `mobile_2` 
        from `vo_shg_detail` `vsd`
        inner join `selfhelpgroups` `shg` on `shg`.`id` = `vsd`.`shg_id`
        inner join `villages` `vil` on `vil`.`id` = `shg`.`village_id`
        left join `shg_member_detail` `smd_1` on `smd_1`.`id` = `vsd`.`shg_member_detail_id_1`
        left join `shg_member_detail` `smd_2` on `smd_2`.`id` = `vsd`.`shg_member_detail_id_2`
        left join `designation_ec` `des_1` on `des_1`.`id` = `vsd`.`designation_memeber_1`
        left join `designation_ec` `des_2` on `des_2`.`id` = `vsd`.`designation_memeber_2`
        where `vsd`.`vo_id` = $vo_id
        order by `vil`.`name`, `shg`.`group_name` ;"));
        return view('admin.voProfile.view_list',compact('voProfileLists'));  
    }
    public function ShgEdit($id)
    {
        $vo_shg_detail_id=Crypt::decrypt($id);
        $vo_shg_details=DB::select(DB::raw(" select *  from `vo_shg_detail` where `id`='$vo_shg_detail_id'"));
        $shg_id=$vo_shg_details[0]->shg_id;
        $ShgMemberLists=DB::select(DB::raw("select `id` , `member_name` , `mobile_no`  from `shg_member_detail` where `shg_id`=$shg_id;"));
        $designation_ec=DB::select(DB::raw("select * from `designation_ec`")); 
        return view('admin.voProfile.edit_shg',compact('vo_shg_details','ShgMemberLists','designation_ec')); 
    }
    public function ShgUpdate(Request $request , $vo_shg_detail_id)
    {   
        try {
            
            // if (!empty($request->shg_member_1)) {
            //     $response=array();
            //     $response["status"]=0;
            //     $response["msg"]='Please Select Designation Memeber 1';
            //     return response()->json($response);  
            // }
            // if (!empty($request->shg_member_2)) {
            //     $response=array();
            //     $response["status"]=0;
            //     $response["msg"]='Please Select Designation Memeber 2';
            //     return response()->json($response);  
            // }

            $vo_shg_detail_id=Crypt::decrypt($vo_shg_detail_id); 
            $member_1_id = $request->shg_member_1;
            $member_2_id = $request->shg_member_2;
            $desig_1_id = $request->designation_memeber_1;
            $desig_2_id = $request->designation_memeber_2;
            if (empty($member_1_id)) {
              $member_1_id =0; 
            }
            if (empty($member_2_id)) {
              $member_2_id =0;
            }
            if (empty($desig_1_id)) {
              $desig_1_id =0;
            }
            if (empty($desig_2_id)) {
              $desig_2_id =0;
            } 
           
            $first_level_vo_profile=DB::select(DB::raw("update `vo_shg_detail` set  `shg_member_detail_id_1` = $member_1_id , `shg_member_detail_id_2` = $member_2_id , `designation_memeber_1`= $desig_1_id , `designation_memeber_2` = $desig_2_id where `id` =$vo_shg_detail_id "));
            $response=['status'=>1,'msg'=>'update Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }  
       
    }
    public function removeMember($vo_shg_detail_id , $type)
    {   
        $vo_shg_detail_id=Crypt::decrypt($vo_shg_detail_id);
        if ($type==1) {
          $update_rs=DB::select(DB::raw("update `vo_shg_detail` set  `shg_member_detail_id_1` = 0 , `designation_memeber_1` = 0  where `id`=$vo_shg_detail_id ;"));  
        }
        if ($type==2) {
          $update_rs=DB::select(DB::raw("update `vo_shg_detail` set  `shg_member_detail_id_2` = '0' , `designation_memeber_2` = 0 where `id`=$vo_shg_detail_id ;"));  
        }
        
        $response=['status'=>1,'msg'=>'Remove Successfully'];
        return response()->json($response);
    }

    public function vomeeting()
    {   
        $voProfileLists=DB::select(DB::raw(" select `id` , `vo_name` from `first_level_vo_profile`;"));
        return view('admin.vomeeting.index',compact('voProfileLists'));  
    }
    public function vomeetingList(Request $request)
    {   
        $voProfileLists=DB::select(DB::raw(" select * from `vo_meeting_detail` where `vo_id` = $request->id;"));
        return view('admin.vomeeting.meeting_list',compact('voProfileLists'));  
    }

    public function vomeetingStore(Request $request)
    {
        try {
            $rules=[  
            'vo_name' => 'required', 
            
            ]; 
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            } 
            $vo_meeting_detail=DB::select(DB::raw("insert into `vo_meeting_detail` (`vo_id` ,`for_month` , `for_year` , `meeting_date_1` , `meeting_date_2`) values ( '$request->vo_name' , '$request->for_month' , '$request->for_year' , '$request->meeting_date_1' , '$request->meeting_date_2');"));
            $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }

}

