<script type="text/javascript">
			$(document).ready(function(){
					$("div#books_container").hide();
					$("div#magazines_container").hide();
					$("div#sp_thesis_container").hide();
					$("div#others_container").hide();
			$("#x").on("change",function(){

				$(".active").slideUp();
				$(".active").removeClass("active")
				
				if($("#x").val()=="book"){
				z = $("div#books_container");
					z.slideDown();
				z.attr("class","active");
				}
				if($("#x").val()=="magazine"){
				z = $("div#magazines_container");
					z.slideDown();
				z.attr("class","active");
				}
				if($("#x").val()=="sp_thesis"){
				z = $("div#sp_thesis_container");
					z.slideDown();
				z.attr("class","active");
				}
				if($("#x").val()=="other"){
				z = $("div#others_container");
					z.slideDown();
				z.attr("class","active");
				}

			});
					
			});
		</script>
<select id="x">
	<option></option>
	<option id="book_option" value="book">Book</option>
	<option id="magazine_option" value="magazine">Magazine</option>
	<option id="sp_thesis_option" value="sp_thesis">SP/Thesis</option>
	<option id="others_option" value="other">Others</option>
</select>
<div id="books_container">
	<h3>Edit Books</h3>

	<div id="book_container_admin">
	<form action='/ICSArman/index.php/edit_material/search_book' id = "search_form" method="post">
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
    </form>
	</div>

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
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditBook' method="post">
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
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "text" name="course_code" value='<?php echo $books[$i]->course_code;?>'/></td>
				<td><input type = "text" name="publisher" value='<?php echo $books[$i]->publisher;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/edit_material/callDeleteBook" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $books[$i]->material_id?>' hidden = "hidden"/>
                <input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $books[$i]->picture?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="magazines_container">
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
	</div>

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
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditMagazine' method="post">
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
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "number" name="volume_number" value='<?php echo $magazines[$i]->volume_number;?>'/></td>
				<td><input type = "number" name="month" value='<?php echo $magazines[$i]->month;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/edit_material/callDeleteMagazine" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $magazines[$i]->material_id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $magazines[$i]->picture?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="sp_thesis_container">
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
	</div>

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
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditSPThesis' method="post">
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
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "text" name="adviser" value='<?php echo $sp_thesis[$i]->adviser;?>'/></td>
				<td><input type = "text" name="type" value='<?php echo $sp_thesis[$i]->type;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/edit_material/callDeleteSPThesis" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $sp_thesis[$i]->material_id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $sp_thesis[$i]->picture?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
<div id="others_container">
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
	</div>

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
		<form enctype="multipart/form-data" action='/ICSArman/index.php/edit_material/callEditOther' method="post">
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
				<td><input type="file" name="file" id="file" size="50"/></td>
				<td><input type = "text" name="type" value='<?php echo $others[$i]->type;?>'/></td>
				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/ICSArman/index.php/edit_material/callDeleteOther" method = "post">
			<td>
				<input type = "submit" value = 'X'/>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $others[$i]->material_id?>' hidden = "hidden"/>
				<input type = "text" class="input_delete" name = "deletepic" value = '<?php echo $others[$i]->picture?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
</div>