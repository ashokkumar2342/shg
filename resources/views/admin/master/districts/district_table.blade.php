<table id="district_datatable" class="table table-striped table-hover control-label">
    <thead>
        <tr>
            <th>States</th>
            <th>District Code</th>
            <th>District Name</th>
            
            <th>Action</th>
             
        </tr>
    </thead>
    <tbody> 
@foreach ($Districts as $District)

 <tr>
     <td>{{ $District->states->name or '' }}</td>
     <td>{{ $District->code }}</td>
     <td>{{ $District->name }}</td>
     <td class="text-nowrap">
         
     <a onclick="callPopupLarge(this,'{{ route('admin.Master.districtsEdit',$District->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
     <a href="{{ route('admin.Master.districtsDelete',Crypt::encrypt($District->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
     </td>
 </tr> 
@endforeach
</tbody>
</table>