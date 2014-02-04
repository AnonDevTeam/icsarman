<?php 
$this->load->database();
$books = mysql_query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.course_code,b.publisher FROM material m,book b WHERE m.material_id=b.material_id ORDER BY material_id");
$magazines = mysql_query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.volume_number,b.month FROM material m,magazine b WHERE m.material_id=b.material_id ORDER BY material_id");
$sp_thesis = mysql_query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.adviser,b.type FROM material m,sp_thesis b WHERE m.material_id=b.material_id ORDER BY material_id");
$others = mysql_query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.type FROM material m,other b WHERE m.material_id=b.material_id ORDER BY material_id");

?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#book_container" data-toggle="tab">Book</a></li>
  <li><a href="#magazine_container" data-toggle="tab">Magazine</a></li>
  <li><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>
  <li><a href="#other_container" data-toggle="tab">Others</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="book_container">
	<h3>Edit Books</h3>

	<div id="book_container_admin">
	<!-- <form action='/ICSArman/index.php/edit_material/search_book' id = "search_form" method="post">
        <h5>Search Book: </h5>
        <input type = "text" id = "book_id_search" name="via_id" placeholder="Material ID"/>
        <input type = "text" id = "title_search" name="via_title" placeholder="Title"/>
        <input type = "text" id = "author_search" name="via_author" placeholder="Author"/>
        <input type = "text" id = "year_search" name="via_year" placeholder="Year"/>
        <input type = "text" id = "date_search" name="via_date" placeholder="Date Added"/>
        <input type = "text" id = "status_search" name="via_status" placeholder="Status"/>
        <input type = "text" id = "course_code_search" name="via_course_code" placeholder="Course Code"/>
        <input type = "text" id = "publisher_search" name="via_publisher" placeholder="Publisher"/>
        <input type = "submit" id = "search_admin_submit" name = "search" value="Search"/>
    </form> -->
	<table class="table table-bordered">
		<tr>
			<td><center>Material ID</center></td>
			<td><center>Title</center></td>
			<td><center>Author</center></td>
			<td><center>Year</center></td>
			<td><center>Quantity</center></td>
			<td><center>Status</center></td>
			<td><center>Course Code</center></td>
			<td><center>Publisher</center></td>
					
		</tr>
		<?php while($row = mysql_fetch_array( $books )){ ?>
		<!-- <form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditBook' method="post">
		 -->	<tr>
				<td><?php echo $row['material_id'];?></td>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['author'];?></td>
				<td><?php echo $row['year'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td>
					<?php if($row['status'] === "onshelf") echo "On Shelf";?>
					<?php if($row['status'] === "borrowed") echo "Unavailable";?>
				</td>
				<td><?php echo $row['course_code'];?></td>
				<td><?php echo $row['publisher'];?></td>



		<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
		  Edit
		</button>
		</td>
<!-- Modal -->
		<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Book</h4>
		      </div>
		      <div class="modal-body">
		        <form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditBook' method="post">
		        		<input class="form-control"type = "hidden" name="material_id" value='<?php echo $row['material_id']?>' /><br/>
		        		Material ID: <input class="form-control"type = "text" name="material_id" value='<?php echo $row['material_id']?>' disabled /><br/>
						Title: <input class="form-control"type = "text" name="title" value='<?php echo $row['title']?>'/><br/>
						Author: <input class="form-control"type = "text" name="author" value='<?php echo $row['author']?>'/><br/>
						Date Added: <input class="form-control"type = "date" name="date_added" value='<?php echo $row['date_added'];?>'/><br/>
						Year: <input class="form-control"type = "number" name="year" value='<?php echo $row['year'];?>'/><br/>
						Quantity: <input class="form-control"type = "number" name="quantity" value='<?php echo $row['quantity'];?>'/><br/>
						
						Book Status:	<select name="status">
								<option class="form-control" value="onshelf" <?php if($row['status'] === "onshelf") echo 'selected = "selected"';?>>On Shelf</option>
								<option class="form-control" value="borrowed" <?php if($row['status'] === "borrowed") echo 'selected = "selected"';?>>Unavailable</option>
							</select><br/>
						
						<input type="file" name="file" id="file" size="50"/><br/>
						Course Code: <input type = "text" class="form-control" name="course_code" value='<?php echo $row['course_code'];?>'/><br/>
						Publisher: <input type = "text" class="form-control" name="publisher" value='<?php echo $row['publisher'];?>'/><br/>
		      
		      </div>
		      <div class="modal-footer">
		        
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      <button type="submit" class="btn btn-primary">Save changes</button>
		    	</form>  
		      </div>
		    </div>
		  </div>
		</div>

				<!-- <td><button class="btn btn-primary" data-toggle="modal" data-target=".bs-modal-lg">Edit</button></td> -->
				<!-- <td><button type = "submit" class="btn btn-info">Edit</button></td>
		</form> -->

		<form action = "/ICSArman/index.php/delete_material/callDeleteBook" method = "post">
				<td>
				<button type = "submit" class="btn btn-danger">Delete</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $row['material_id']?>' hidden = "hidden"/>
                <input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $row['picture']?>' hidden = "hidden"/>
				</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
</div>



<div class="tab-pane fade" id="magazine_container">
	<h3>Edit Magazines</h3>

	<div id="magazines_container_admin">
	<form action='/ICSArman/index.php/edit_material/search_magazine' id = "search_form" method="post">
        <h5>Search Book: </h5>
        <input type = "text" id = "magazine_id_search" name="via_id" placeholder="Material ID"/>
        <input type = "text" id = "title_search" name="via_title" placeholder="Title"/>
        <input type = "text" id = "author_search" name="via_author" placeholder="Author"/>
        <input type = "text" id = "year_search" name="via_year" placeholder="Year"/>
        <input type = "text" id = "date_search" name="via_date" placeholder="Date Added"/>
        <input type = "text" id = "status_search" name="via_status" placeholder="Status"/>
        <input type = "text" id = "volume_no_code_search" name="via_volume" placeholder="Volume No."/>
        <input type = "text" id = "month_search" name="via_month" placeholder="Month"/>
        <input type = "submit" id = "search_admin_submit" name = "search" value="Search"/>
    </form>
	

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
		<?php while($row2 = mysql_fetch_array( $magazines )){ ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditMagazine' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $row2['material_id']?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $row2['title']?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $row2['author']?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $row2['year'];?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $row2['date_added'];?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $row2['quantity'];?>'/></td>
				<td>
					<select name="status">
						<option value="onshelf" <?php if($row2['status'] === "onshelf") echo 'selected = "selected"';?>>On Shelf</option>
						<option value="borrowed" <?php if($row2['status'] === "borrowed") echo 'selected = "selected"';?>>Unavailable</option>
					</select>
				</td>
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "number" name="volume_number" value='<?php echo $row2['volume_number'];?>'/></td>
				<td><input type = "number" name="month" value='<?php echo $row2['month'];?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/delete_material/callDeleteMagazine" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $row2['material_id']?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $row2['picture']?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div></div>
<div class="tab-pane fade" id="sps_thesis_container">
	<h3>Edit SP/Thesis</h3>

	<div id="sp_thesis_container_admin">
	<form action='/ICSArman/index.php/edit_material/search_sp_thesis' id = "search_form" method="post">
        <h5>Search Book: </h5>
        <input type = "text" id = "sp_thesis_id_search" name="via_id" placeholder="Material ID"/>
        <input type = "text" id = "title_search" name="via_title" placeholder="Title"/>
        <input type = "text" id = "author_search" name="via_author" placeholder="Author"/>
        <input type = "text" id = "year_search" name="via_year" placeholder="Year"/>
        <input type = "text" id = "date_search" name="via_date" placeholder="Date Added"/>
        <input type = "text" id = "status_search" name="via_status" placeholder="Status"/>
        <input type = "text" id = "adviser_search" name="via_adviser" placeholder="Adviser"/>
        <input type = "text" id = "type_search" name="via_type" placeholder="Type"/>
        <input type = "submit" id = "search_admin_submit" name = "search" value="Search"/>
    </form>
	

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
		<?php while($row3 = mysql_fetch_array( $sp_thesis )){ ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditSPThesis' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $row3['material_id'];?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $row3['title'];?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $row3['author'];?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $row3['year'];?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $row3['date_added'];;?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $row3['quantity'];;?>'/></td>
				<td>
					<select name="status">
						<option value="onshelf" <?php if($row3['status'] === "onshelf") echo 'selected = "selected"';?>>On Shelf</option>
						<option value="borrowed" <?php if($row3['status'] === "borrowed") echo 'selected = "selected"';?>>Unavailable</option>
					</select>
				</td>
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "text" name="adviser" value='<?php echo $row3['adviser'];?>'/></td>
				<td><input type = "text" name="type" value='<?php echo $row3['type'];?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/delete_material/callDeleteSPThesis" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $row3['material_id'];?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $row3['picture'];?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div></div>
<div class="tab-pane fade" id="other_container">
	<h3>Edit Others</h3>

	<div id="others_container_admin">
	<form action='/ICSArman/index.php/edit_material/search_other' id = "search_form" method="post">
        <h5>Search Book: </h5>
        <input type = "text" id = "other_id_search" name="via_id" placeholder="Material ID"/>
        <input type = "text" id = "title_search" name="via_title" placeholder="Title"/>
        <input type = "text" id = "author_search" name="via_author" placeholder="Author"/>
        <input type = "text" id = "year_search" name="via_year" placeholder="Year"/>
        <input type = "text" id = "date_search" name="via_date" placeholder="Date Added"/>
        <input type = "text" id = "status_search" name="via_status" placeholder="Status"/>
        <input type = "text" id = "type_search" name="via_type" placeholder="Type"/>
        <input type = "submit" id = "search_admin_submit" name = "search" value="Search"/>
    </form>
	

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
		<?php while($row4 = mysql_fetch_array( $others )){ ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditOther' method="post">
			<tr>
				<td><input type = "text" readonly="readonly" name = "material_id"  value = '<?php echo $row4['material_id'];?>'/></td>
				<td><input type = "text" name="title" value='<?php echo $row4['title'];?>'/></td>
				<td><input type = "text" name="author" value='<?php echo $row4['author'];?>'/></td>
				<td><input type = "number" name="year" value='<?php echo $row4['year'];?>'/></td>
				<td><input type = "date" name="date_added" value='<?php echo $row4['date_added'];?>'/></td>
				<td><input type = "number" name="quantity" value='<?php echo $row4['quantity'];?>'/></td>
				<td>
					<select name="status">
						<option value="onshelf" <?php if($row4['status'] === "onshelf") echo 'selected = "selected"';?>>On Shelf</option>
						<option value="borrowed" <?php if($row4['status'] === "borrowed") echo 'selected = "selected"';?>>Unavailable</option>
					</select>
				</td>
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "text" name="type" value='<?php echo $row4['type'];?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/delete_material/callDeleteOther" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $row4['material_id']?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $row4['picture']?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div></div>
</div>