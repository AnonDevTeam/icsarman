<tr>
				<td><?php echo $item->id;?></td>
				<td><?php echo $item->title;?></td>
				<td><?php echo $item->author;?></td>
				<td><?php echo $item->year;?></td>
				<td><?php echo $item->course_code;?></td>
				<td><?php echo $item->publisher;?></td>



		<td>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $item->id;?>" name = "$item->id">
		  Edit
		</button>
		</td>

		<form action = "/ICSArman/index.php/delete_material/callDeleteBook" method = "post">
				<td>
				<button type = "submit" class="btn btn-danger" >Delete</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $item->id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $item->picture?>' hidden = "hidden"/>
				</td>
		</form>
</tr>