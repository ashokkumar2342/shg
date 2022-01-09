<table id="block_datatable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>States</th>
            <th>District</th>
            <th>Block Code</th>
            <th>Block Name</th> 
            <th>Action</th>
             
        </tr>
    </thead>
    <tbody>
       @foreach ($BlocksMcs as $BlockMc)
      
        <tr>
            <td>{{ $BlockMc->states->name or '' }}</td>
            <td>{{ $BlockMc->district->name or '' }}</td>
            <td>{{ $BlockMc->code }}</td>
            <td>{{ $BlockMc->name }}</td>
            
            <td class="text-nowrap">
                
            <a onclick="callPopupLarge(this,'{{ route('admin.Master.BlockMCSEdit',$BlockMc->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
            <a href="{{ route('admin.Master.BlockMCSDelete',Crypt::encrypt($BlockMc->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
        </tr> 
       @endforeach
    </tbody>
</table>