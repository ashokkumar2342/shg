<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">SHG List</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      
    <div class="table-responsive"> 
     <table id="self_group" class="table table-striped table-hover table-bordered">
         <thead style="background-color: #605f6a;color: #fff">
             <tr>
                 <th class="text-nowrap">vill name</th>
                 <th class="text-nowrap">shg name</th>
                 <th class="text-nowrap">shg code</th>
                 <th class="text-nowrap">joining date</th>
                 <th class="text-nowrap">member 1</th>
                 <th class="text-nowrap">designation 1</th>
                 <th class="text-nowrap">mobile 1</th>
                 <th class="text-nowrap">member 2</th>
                 <th class="text-nowrap">designation 2</th> 
                 <th class="text-nowrap">mobile 2</th> 
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($voProfileLists as $voProfileList)
            
             <tr>
                
                 <td>{{ $voProfileList->vil_name }}</td>
                 <td>{{ $voProfileList->shg_name }}</td>
                 <td>{{ $voProfileList->shg_code }}</td>
                 <td>{{ $voProfileList->joining_date }}</td>
                 <td>{{ $voProfileList->member_1 }}</td>
                 <td>{{ $voProfileList->designation_1 }}</td>
                 <td>{{ $voProfileList->mobile_1 }}</td>
                 <td>{{ $voProfileList->member_2 }}</td>
                 <td>{{ $voProfileList->designation_2 }}</td> 
                 <td>{{ $voProfileList->mobile_2 }}</td> 
                 <td class="text-nowrap">  
                    <a onclick="callPopupLevel2(this,'{{ route('admin.vo.profile.shgedit',Crypt::encrypt($voProfileList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-pencil"></i> Update SHG</a>

                    <a success-popup="true" button-click="view_shg_button" onclick="callAjax(this,'{{ route('admin.vo.profile.remove.member',[Crypt::encrypt($voProfileList->id),1]) }}')" title="Edit" class="btn btn-danger btn-xs" style="color:#fff"><i class="fa fa-remove"></i> Remove Member 1</a>

                    <a success-popup="true" button-click="view_shg_button" onclick="callAjax(this,'{{ route('admin.vo.profile.remove.member',[Crypt::encrypt($voProfileList->id),2]) }}')" title="Edit" class="btn btn-danger btn-xs" style="color:#fff"><i class="fa fa-remove"></i> Remove Member 2</a>

                     

                     
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 
    
    </div>
  </div>
</div>

