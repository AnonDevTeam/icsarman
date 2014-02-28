<tr>
				<td><?php echo $item->material_id;?></td>
				<td><?php echo $item->title;?></td>
				<td><?php echo $item->author;?></td>
				<td><?php echo $item->year;?></td>
				<td><?php echo $item->quantity;?></td>
				<td>
					<?php if($item->status === "onshelf") echo "On Shelf";?>
					<?php if($item->status === "borrowed") echo "Unavailable";?>
				</td>

		<form action = "/ICSArman/index.php/edit_material/callReturnMaterial" method = "post">
				<td>
				<button type = "submit" class="btn btn-success">Returned</button>
                <input type = "text" class="input_delete" name = "return" value = '<?php echo $item->material_id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $item->picture?>' hidden = "hidden"/>
				</td>
		</form>
		</tr>