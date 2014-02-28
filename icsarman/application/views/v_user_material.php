<!DOCTYPE html>
<html>
	<head>
		<title>User Material</title>
	</head>
	<body>
		<br/><br/><br/><br/>
		<form>
			<?php
				$data = array(
					'id' => 'search_input',
					'name' => 'search_input',
					'placeholder' => 'Search',
					'onkeyup' => 'search_borrowed_reserved();'
				);

				echo form_input($data);
			?>
		</form>

		<div id="info_popup"></div>

		<div id="alertbox">
			<?php
				if(!empty($alert)) echo "ALERT: You have one or more materials almost due or already overdue. Please settle this immediately."
			?>
		</div>
		
		<div id="borrow">
			<p>Cart</p>
			<div id="cart">
				<?php foreach($cart as $row): ?>
					<div class="material_list" style="border:1px solid black;width:300px;" >
						<img src="" /><br />
						Material Title: <?php echo  $row->title ?><br />
						Author: <?php echo  $row->author ?><br />
						Type: <?php 
							switch($row->type){
								case "book": echo "Book"; break;
								case "magazine": echo "Magazine"; break;
								case "sp_thesis": echo "SP/Thesis"; break;
								case "other": echo "Other"; break;
							}
						?><br />
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
	<?php include_once "links.html"; ?>
	<?php include_once "navbar.php"; ?>
	<?php include_once "footer.html"; ?>
</html>