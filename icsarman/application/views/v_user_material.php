<!DOCTYPE html>

<html>
	<head>
		<title>User Integration - A*DevTeam</title>
		<script type="text/javascript" src="<?= base_url("themes/js/jquery-2.0.3.js"); ?>"> </script>
		<script type="text/javascript" src="<?= base_url("themes/js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?= base_url("themes/js/user_material.js"); ?>"></script>
		<style type="text/css">
			.due_alert {
				background: rgb(255,200,200);
			}

			.material_list:hover {
				cursor: pointer;
				background: rgb(210,200,200);
			}
		</style>
	</head>
	<body>
		<nav>
			<a href="<?=base_url()?>">Home</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_profile")?>">User Profile</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_search")?>">Search</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_material")?>">Material</a>
		</nav>

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
			<p>Borrowed Materials</p>
			<div id="borrowed_materials">
				<?php foreach($borrowed as $row): ?>
					<div class="material_list <?php if($row->diff <= 1) echo "due_alert"; ?>" id="borrowed<?=$row->material_id?>" style="border:1px solid black;width:300px;" >
						<img src="" /><br />
						Material Title: <?= $row->title ?><br />
						Author: <?= $row->author ?><br />
						Type: <?php 
							switch($row->type){
								case "book": echo "Book"; break;
								case "magazine": echo "Magazine"; break;
								case "sp_thesis": echo "SP/Thesis"; break;
								case "other": echo "Other"; break;
							}
						?><br />
						Date Borrowed: <?= mdate("%M %d %Y",human_to_unix($row->date_borrowed)); ?><br />
						Due Date: <?= mdate("%M %d %Y",human_to_unix($row->due_date)); ?><br />
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div id="reserve">
			<p>Reserved Materials</p>
			<div id="reserved_materials">
				<?php foreach($reserved as $row): ?>
					<div class="material_list" id="reserved<?= $row->material_id ?>" style="border:1px solid black;width:300px" >
						<img src="" /><br />
						Material Title: <?= $row->title ?><br />
						Author: <?= $row->author ?><br />
						Type: <?php 
							switch($row->type){
								case "book": echo "Book"; break;
								case "magazine": echo "Magazine"; break;
								case "sp_thesis": echo "SP/Thesis"; break;
								case "other": echo "Other"; break;
							}
						?><br />
						Date Reserved: <?= mdate("%M %d %Y",human_to_unix($row->date_reserved)); ?><br />
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>