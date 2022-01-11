<!DOCTYPE html>
<html>
<head>
<style>
 table,th, td {
  border: 1px solid black;
  border-collapse:collapse;
  text-align:center; 
}
@page { footer: html_otherpagesfooter; 
	    header: html_otherpageheader;
	} 
</style>
</head>
<body>
	<htmlpagefooter name="otherpagesfooter" style="display:none">
		<div style="text-align:right;">
			{nbpg}  {PAGENO}
		</div>
	    
	</htmlpagefooter>
	<htmlpageheader name="otherpageheader" style="display:none">
		<table>
			<tbody>
				<tr>
					<td style="width: 750px;background-color: #767d78;color: #fff;text-align: center;"><b>Member List</b></td>
				</tr>
			</tbody>
		</table>			 
	</htmlpageheader> 
 <table style="width: 750px">
		<thead>
			<tr>
				
                <th>Member Name</th>
                <th>Insurance</th>
                <th>Aadhar No.</th>
                <th>Mobile No.</th> 
                <th>Bank</th>
                <th>Branch</th>
                <th>Account No.</th>
			</tr>
		</thead>
		<tbody> 
	    @foreach ($voProfileLists as $voProfileList) 
	    	<tr> 
		        <td>{{ $voProfileList->vil_name }}</td>
				<td>{{ $voProfileList->shg_name }}</td>
				<td>{{ $voProfileList->shg_code }}</td> 
				<td>{{ $voProfileList->joining_date }}</td> 
				<td>{{ $voProfileList->member_1 }} <br> {{ $voProfileList->member_2 }}</td> 
				<td>{{ $voProfileList->designation_1 }} <br> {{ $voProfileList->designation_2 }}</td> 
				<td>{{ $voProfileList->mobile_1 }} <br> {{ $voProfileList->mobile_2 }}</td>  
	        </tr> 
	    @endforeach 
		</tbody>
	</table>
</body>
</html>
