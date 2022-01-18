<div class="table-responsive"> 
     <table id="self_group" class="table table-striped table-hover table-bordered">
         <thead style="background-color: #605f6a;color: #fff">
             <tr>
                 {{-- <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Gram Panchayat</th> --}}
                 <th class="text-nowrap">Village</th>
                 <th class="text-nowrap">Group Name</th>
                 <th class="text-nowrap">NRLM SHG Code</th>
                 <th class="text-nowrap">Formation Date</th>
                 <th class="text-nowrap">Bank Name</th>
                 <th class="text-nowrap">Branch Name</th>
                 <th class="text-nowrap">Account No.</th>
                 <th class="text-nowrap">Loan Account No.</th>
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($selfHelpGroupList as $selfHelpGroupList)
            
             <tr>
                 {{-- <td>{{ $selfHelpGroupList->state_id }}</td>
                 <td>{{ $selfHelpGroupList->district_id }}</td>
                 <td>{{ $selfHelpGroupList->block_id }}</td>
                 <td>{{ $selfHelpGroupList->panchayat_id }}</td> --}}
                 <td>{{ $selfHelpGroupList->village_id }}</td>
                 <td>{{ $selfHelpGroupList->group_name }}</td>
                 <td>{{ $selfHelpGroupList->shg_code }}</td>
                 <td>{{ $selfHelpGroupList->formation_date }}</td>
                 <td>{{ $selfHelpGroupList->bank_name }}</td>
                 <td>{{ $selfHelpGroupList->branch_name }}</td>
                 <td>{{ $selfHelpGroupList->account_no }}</td>
                 <td>{{ $selfHelpGroupList->loan_account_no }}</td>
                 <td class="text-nowrap">
                    
                     <a onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.add',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-plus"></i> Add Member</a>

                     <a id="view_update_button{{ $selfHelpGroupList->id }}" onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.view.member',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-pencil"></i>      View & Update Member</a>

                     <a onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.edit',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-edit"></i> Edit</a>

                     
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 