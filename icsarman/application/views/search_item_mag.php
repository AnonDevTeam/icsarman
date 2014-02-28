<tr>
				<td><?php echo $item->id;?></td>
				<td><?php echo $item->title;?></td>
				<td><?php echo $item->author;?></td>
				<td><?php echo $item->year;?></td>
				<td><?php if($item->volume_number == 1) echo "January";
						  else if($item->volume_number == 2) echo "February";
						  else if($item->volume_number == 3) echo "March";
						  else if($item->volume_number == 4) echo "April";
						  else if($item->volume_number == 5) echo "May";
						  else if($item->volume_number == 6) echo "June";
						  else if($item->volume_number == 7) echo "July";
						  else if($item->volume_number == 8) echo "August";
						  else if($item->volume_number == 9) echo "September";
						  else if($item->volume_number == 10) echo "October";
						  else if($item->volume_number == 11) echo "November";
						  else if($item->volume_number == 12) echo "December";

				?></td>
				<td><?php echo $item->month;?></td>
				


		<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_mag<?= $item->id;?>" name = "$item->id">
		  Edit
		</button>
		</td>

		<form action = "/ICSArman/index.php/delete_material/callDeleteMagazine" method = "post">
			<td>
				<button type = "submit" class="btn btn-danger">Delete</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $item->id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $item->picture?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>