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
         
     <a onclick="callPopupLarge(this,'{{ route('admin.Master.districtsEdit',$voProfileList->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
     <a href="{{ route('admin.Master.districtsDelete',Crypt::encrypt($voProfileList->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
     </td>
 </tr> 
@endforeach
</tbody>
</table>