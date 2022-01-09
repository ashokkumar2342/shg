<div class="table-responsive"> 
     <table id="vo_list" class="table table-striped table-hover table-bordered">
         <thead style="background-color: #605f6a;color: #fff">
             <tr>
                 {{-- <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Gram Panchayat</th> --}}
                 <th class="text-nowrap">Village</th>
                 <th class="text-nowrap">vo_name</th>
                 <th class="text-nowrap">registration_no</th>
                 <th class="text-nowrap">renewal_date</th>
                 {{-- <th class="text-nowrap">Bank Name</th>
                 <th class="text-nowrap">Branch Name</th>
                 <th class="text-nowrap">Account No.</th>
                 <th class="text-nowrap">Loan Account No.</th> --}}
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($voProfileLists as $voProfileLists)
            
             <tr>
                 {{-- <td>{{ $voProfileLists->state_id }}</td>
                 <td>{{ $voProfileLists->district_id }}</td>
                 <td>{{ $voProfileLists->block_id }}</td>
                 <td>{{ $voProfileLists->panchayat_id }}</td> --}}
                 <td>{{ $voProfileLists->village_id1 }}</td>
                 <td>{{ $voProfileLists->vo_name }}</td>
                 <td>{{ $voProfileLists->registration_no }}</td>
                 <td>{{ $voProfileLists->renewal_date }}</td>
                 
                 <td class="text-nowrap">
                    
                     <a onclick="callPopupLarge(this,'{{ route('admin.vo.profile.edit',Crypt::encrypt($voProfileLists->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-pencil"></i> VO Profile Edit</a>

                     <a onclick="callPopupLarge(this,'{{ route('admin.vo.profile.addshg',Crypt::encrypt($voProfileLists->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-plus"></i> Add SHG</a> 
                    
                     <a id="view_shg_button" onclick="callPopupLarge(this,'{{ route('admin.vo.profile.shgViewList',Crypt::encrypt($voProfileLists->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-eye"></i> View & Update SHG</a>

                    

                     
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 