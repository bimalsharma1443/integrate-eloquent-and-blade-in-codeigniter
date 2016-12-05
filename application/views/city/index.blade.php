<?php $i = 0;?>
	
	<table>
		<tr>
			<th> Id </th>
			<th> City Name </th>
			<th> Edit </th>
			<th> Delete </th>
		</tr>
		@foreach($city as $row)
			<tr>
				<td> {{ $row['id'] }}  </td>
				 <td> {{ $row['city_name'] }} </td>
				 <td><a href="{{ 'edit/'.$row['id'] }}">edit</a></td>
				 <td><a href="{{ 'delete/'.$row['id'] }}">delete</a></td>
			</tr>
			<?php $i++; ?>
		@endforeach
	</table>
	
