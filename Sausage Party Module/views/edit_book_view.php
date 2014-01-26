
<div id="books_container">
	<h3>Edit Books</h3>
	<table>
		<tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Date Added</td>
			<td>Quantity</td>
			<td>Status</td>
			<td>Picture</td>
			<td>Course Code</td>
			<td>Publisher</td>
		</tr>
		<?php for( $i = 0, $j = count($books); $i < $j; $i++){?>
		<form action='/ICSArman/index.php/portal/callEditBook' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $books[$i]->material_id;?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $books[$i]->title;?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $books[$i]->author;?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $books[$i]->year;?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $books[$i]->date_added;?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $books[$i]->quantity;?>'/></td>
				<td>
					<select name="status">
						<option value="0" <?php if($books[$i]->status == 0) echo 'selected = "selected"';?>>0</option>
						<option value="1" <?php if($books[$i]->status == 1) echo 'selected = "selected"';?>>1</option>
					</select>
				</td>
				<td><input type = "text" name="picture" value='<?php echo $books[$i]->picture;?>'/></td>
				<td><input type = "text" name="course_code" value='<?php echo $books[$i]->course_code;?>'/></td>
				<td><input type = "text" name="publisher" value='<?php echo $books[$i]->publisher;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/portal/callDeleteBook" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $books[$i]->material_id?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="magazines_container">
	<h3>Edit Magazines</h3>
	<table>
		<tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Date Added</td>
			<td>Quantity</td>
			<td>Status</td>
			<td>Picture</td>
			<td>Volume No.</td>
			<td>Month</td>
		</tr>
		<?php for( $i = 0, $j = count($magazines); $i < $j; $i++){?>
		<form action='/ICSArman/index.php/portal/callEditMagazine' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $magazines[$i]->material_id;?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $magazines[$i]->title;?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $magazines[$i]->author;?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $magazines[$i]->year;?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $magazines[$i]->date_added;?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $magazines[$i]->quantity;?>'/></td>
				<td>
					<select name="status">
						<option value="0" <?php if($magazines[$i]->status == 0) echo 'selected = "selected"';?>>0</option>
						<option value="1" <?php if($magazines[$i]->status == 1) echo 'selected = "selected"';?>>1</option>
					</select>
				</td>
				<td><input type = "text" name="picture" value='<?php echo $magazines[$i]->picture;?>'/></td>
				<td><input type = "number" name="volume_number" value='<?php echo $magazines[$i]->volume_number;?>'/></td>
				<td><input type = "number" name="month" value='<?php echo $magazines[$i]->month;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/portal/callDeleteMagazine" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $magazines[$i]->material_id?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="sp_thesis_container">
	<h3>Edit SP/Thesis</h3>
	<table>
		<tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Date Added</td>
			<td>Quantity</td>
			<td>Status</td>
			<td>Picture</td>
			<td>Adviser</td>
			<td>Type</td>
		</tr>
		<?php for( $i = 0, $j = count($sp_thesis); $i < $j; $i++){?>
		<form action='/ICSArman/index.php/portal/callEditSPThesis' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $sp_thesis[$i]->material_id;?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $sp_thesis[$i]->title;?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $sp_thesis[$i]->author;?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $sp_thesis[$i]->year;?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $sp_thesis[$i]->date_added;?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $sp_thesis[$i]->quantity;?>'/></td>
				<td>
					<select name="status">
						<option value="0" <?php if($sp_thesis[$i]->status == 0) echo 'selected = "selected"';?>>0</option>
						<option value="1" <?php if($sp_thesis[$i]->status == 1) echo 'selected = "selected"';?>>1</option>
					</select>
				</td>
				<td><input type = "text" name="picture" value='<?php echo $sp_thesis[$i]->picture;?>'/></td>
				<td><input type = "text" name="adviser" value='<?php echo $sp_thesis[$i]->adviser;?>'/></td>
				<td><input type = "text" name="type" value='<?php echo $sp_thesis[$i]->type;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/portal/callDeleteSPThesis" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $sp_thesis[$i]->material_id?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="others_container">
	<h3>Edit Others</h3>
	<table>
		<tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Date Added</td>
			<td>Quantity</td>
			<td>Status</td>
			<td>Picture</td>
			<td>Type</td>
		</tr>
		<?php for( $i = 0, $j = count($others); $i < $j; $i++){?>
		<form action='/ICSArman/index.php/portal/callEditOther' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $others[$i]->material_id;?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $others[$i]->title;?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $others[$i]->author;?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $others[$i]->year;?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $others[$i]->date_added;?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $others[$i]->quantity;?>'/></td>
				<td>
					<select name="status">
						<option value="0" <?php if($others[$i]->status == 0) echo 'selected = "selected"';?>>0</option>
						<option value="1" <?php if($others[$i]->status == 1) echo 'selected = "selected"';?>>1</option>
					</select>
				</td>
				<td><input type = "text" name="picture" value='<?php echo $others[$i]->picture;?>'/></td>
				<td><input type = "text" name="type" value='<?php echo $others[$i]->type;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/portal/callDeleteOther" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $others[$i]->material_id?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
</div>