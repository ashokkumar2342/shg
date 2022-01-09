<div class="card card-primary table-responsive"> 
     <table id="district_table" class="table table-striped table-hover control-label">
         <thead>
             <tr>
                 <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Gram Panchayat Code</th>
                 <th class="text-nowrap">Gram Panchayat Name</th>
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($GramPanchayats as $GramPanchayat)
            
             <tr>
                 <td>{{ $GramPanchayat->states->name or '' }}</td>
                 <td>{{ $GramPanchayat->district->name or '' }}</td>
                 <td>{{ $GramPanchayat->blockMCS->name or '' }}</td>
                 <td>{{ $GramPanchayat->code }}</td>
                 <td>{{ $GramPanchayat->name }}</td>
                 <td class="text-nowrap">
                    
                     <a onclick="callPopupLarge(this,'{{ route('admin.Master.gram.panchayat.edit',$GramPanchayat->id) }}')" title="Edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                     <a  success-popup="true" select-triger="block_select_box" onclick="callAjax(this,'{{ route('admin.Master.gram.panchayat.delete',$GramPanchayat->id) }}')" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 