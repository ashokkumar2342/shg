<table id="vo_meeting_list_datatable" class="table table-striped table-hover control-label">
    <thead>
        <tr>
           
            <th>For Month</th>
            <th>For Year</th>
            <th>Meeting Date 1</th>
            <th>Meeting Date 2</th>
            <th>Action</th>
             
        </tr>
    </thead>
    <tbody> 
@foreach ($voProfileLists as $voProfileList)

 <tr>
     <td>{{ $voProfileList->for_month }}</td>
     <td>{{ $voProfileList->for_year }}</td>
     <td>{{ $voProfileList->meeting_date_1 }}</td>
     <td>{{ $voProfileList->meeting_date_2 }}</td>
     <td class="text-nowrap">
         
     <a onclick="callPopupLarge(this,'{{ route('admin.vomeeting.edit',$voProfileList->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
     <a  onclick="callAjax(this,'{{ route('admin.vomeeting.delete',Crypt::encrypt($voProfileList->id)) }}')" select-triger="vo_name"  success-popup="true" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
     </td>
 </tr> 
@endforeach
</tbody>
</table>