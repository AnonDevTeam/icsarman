<?php
		$this->load->database();
		$books = mysql_query('SELECT * FROM suggest_material WHERE type = "book" AND status = "pending"');
		$magazines = mysql_query('SELECT * FROM suggest_material WHERE type = "magazine" AND status = "pending"');
		$others = mysql_query('SELECT * FROM suggest_material WHERE type = "others" AND status = "pending"');
?>

<ul class="nav nav-tabs">
  <li class="active"><a href="#book_suggestion" data-toggle="tab">Book</a></li>
  <li><a href="#magazine_suggestion" data-toggle="tab">Magazine</a></li>
  <li><a href="#other_suggestion" data-toggle="tab">Others</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade in active" id="book_suggestion">
	<h4>Book Suggestions</h4>

	<div id="book_container_admin">
	<table style="text-align: center;" class="table table-bordered">
		<tr>
			<td>Request ID</td>
			<td>User ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Publisher</td>
			<td>Year of Publication</td>
			<td>Date Suggested</td>
			
		</tr>
		<?php while ( $book = mysql_fetch_array($books) ) { ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/add_material/callAddMaterial' method="post">
			<tr>
				<td><?php echo $book['auxil_id'];?></td>
				<td><?php echo $book['id'];?></td>
				<td><?php echo $book['title'];?></td>
				<td><?php echo $book['author'];?></td>
				<td><?php echo $book['publisher'];?></td>
				<td><?php echo $book['date_published'];?></td>
				<td><?php echo $book['date_suggested'];?></td>

				<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Approve</button></td>
		</form>

		<form action = "/ICSArman/index.php/suggestions/callDeleteSuggestion" method = "post">
			<td>
				<button type = "submit" class="btn btn-danger btn-sm">Disapprove</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $book['auxil_id']?>' hidden = "hidden"/>
			</td>
		</form>
			</tr>
		<?php }?>
	</table>
</div>
</div>


<div class="tab-pane fade" id="magazine_suggestion">
	<h4>Magazine Suggestions</h4>

	<div id="magazine_container_admin">
	<table style="text-align: center;" class="table table-bordered">
		<tr>
			<td>Request ID</td>
			<td>User ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year of Publication</td>
			<td>Date Suggested</td>
		</tr>
		<?php while ( $magazine = mysql_fetch_array($magazines) ) { ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/add_material/callAddMaterial' method="post">
			<tr>
				<td><?php echo $magazine['auxil_id'];?></td>
				<td><?php echo $magazine['id'];?></td>
				<td><?php echo $magazine['title'];?></td>
				<td><?php echo $magazine['author']?></td>
				<td><?php echo $magazine['date_published'];?></td>
				<td><?php echo $magazine['date_suggested'];?></td>

				<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Approve</button></td>
		</form>
		<form action = "/ICSArman/index.php/suggestions/callDeleteSuggestion" method = "post">
			<td>
				<button type = "submit" class="btn btn-danger">Delete</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $magazine['auxil_id'];?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
</div>

<div class="tab-pane fade" id="other_suggestion">
	<h4>Other Suggestions</h4>

	<div id="other_container_admin">
	<table style="text-align: center;" class="table table-bordered">
		<tr>
			<td>Request ID</td>
			<td>User ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year of Publication</td>
			<td>Date Suggested</td>
		</tr>
		<?php while ( $other = mysql_fetch_array($others) ) { ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/add_material/callAddMaterial' method="post">
			<tr>
				<td><?php echo $other['auxil_id'];?></td>
				<td><?php echo $other['id'];?></td>
				<td><?php echo $other['title'];?></td>
				<td><?php echo $other['author'];?></td>
				<td><?php echo $other['date_published'];?></td>
				<td><?php echo $other['date_suggested'];?></td>

				<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Approve</button></td>
		</form>
		<form action = "/ICSArman/index.php/suggestions/callDeleteSuggestion" method = "post">
			<td>
				<button type = "submit" class="btn btn-danger">Delete</button>
                <input type = "text" class="input_delete" name = "delete" value = '<?php echo $other['auxil_id']?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>
</div>
</div>