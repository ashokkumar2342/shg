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
					<td style="width: 1010px;background-color: #767d78;color: #fff;text-align: center;"><b>SHG Member List</b></td>
				</tr>
			</tbody>
		</table>			 
	</htmlpageheader> 
 	<table style="border-collapse: collapse; width: 100%;" border="1">
 	<tbody>
 	<tr>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	</tr>
 	<tr>
 	<td colspan="3">ddddd</td>
 	<td colspan="2">ddddd</td>
 	</tr>
 	<tr>
 	<td colspan="2">ddddd</td>
 	<td  colspan="2">ddddd</td>
 	<td>ddddd</td>
 	</tr>
 	<tr>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td colspan="2">ddddd</td>
 	</tr>
 	<tr>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td>ddddd</td>
 	<td colspan="2">ddddd</td>
 	</tr>
 	<tr>
 	<td colspan="2">ddddd</td>
 	<td>ddddd</td>
 	<td colspan="2">ddddd</td>
 	</tr>
 	</tbody>
 	</table>
 	<table style="width: 100%">
		<thead>
			<tr>
				
                <th>Member Name</th>
                <th>Father/Husband</th>
                <th>Social Category</th>
                <th>DOB</th>
                
				<th>Sub Category <br>Disability / Religion / Gender</th> 
                <th>PIP Category</th>
                <th>Leader</th> 
                <th>Joining Date</th>
                <th>Education </th>
                
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
