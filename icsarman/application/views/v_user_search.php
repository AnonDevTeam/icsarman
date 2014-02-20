<!DOCTYPE html>

<html>
	<head>
		<?php session_start(); ?>
		<title>User Integration - A*DevTeam</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url("css/styles.css"); ?>" />
	</head>
	<body>
		<div id="overlap"></div>
		<div id="reserve_popup">
			<h2>Reserve</h2>
			<h4>You are trying to reserve <span id="reserve_material_title">this material</span></h4>
			<h4>Please indicate the date of reservation below</h4>
			<form>
				<?= form_label('Reservation Date: ','reserve_date'); ?>
				<input type="date" id="reserve_date" name="reserve_date" onblur="reserve_blur();"/>
			</form>
			<button id="reserve_button" disabled='true' value="" onclick="reserve();">Reserve</button>
		</div>
		<div id="borrow_popup">
			<h1>Borrow</h1>
			<h4>You are trying to borrow <span id="borrow_material_title">this material</span></h4>
			<h4>Please indicate the date of borrow below</h4>
			<form>
				<?= form_label('Borrow Date: ','borrow_date'); ?>
				<input type="date" id="borrow_date" name="borrow_date" onblur="borrow_blur();"/>
				<input type="hidden" id="borrow_due_date" name="borrow_due_date" />
			</form>
			<span id="borrow_due"><h4>Due Date: <span id="due_date">this date<span></h4></span>
			<button id="borrow_button" disabled='true' value="" onclick="borrow();">Borrow</button>
		</div>
		<div id="status_popup">
			<h1><span id="status_type"></span></h1>
			<h4><span id="status_type2"></span> <span id="status_material">this material</span></h4>
			<h4>on <span id="status_date">this date</span></h4>
			<h5><span id="status_additional"></span><h5>
		</div>
		<nav>
			<a href="<?=base_url()?>">Home</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_profile")?>">User Profile</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_search")?>">Search</a>
			<a href="<?=base_url("index.php/c_icsarman/c_user_material")?>">Material</a>
		</nav>
		<div>
			<form>
				<?php
					$data = array(
						'id' => 'search_input',
						'name' => 'search_input',
						'placeholder' => 'Search',
						'autocomplete' => 'off',
						'onkeyup' => 'suggest_material();',
						'object_clicked' => 'first'
					);
					echo form_input($data);
				?>
				<select id="type" name="suggest_type" onchange="suggest_material();"> <!-- kapag nagpalit ng type,trigger radio button -->
					<option selected='selected'>All</option>
					<option>Book</option>
					<option>Magazine</option>
					<option>SP</option>
					<option>Thesis</option>
					<option>Others</option>
				</select></br></br>
			</form>
			<?php
				$_SESSION['firstnum'] = 1;
				$_SESSION['lastnum'] = 5;
			?>
			<button id="search_go" onclick="search();">Go</button>
			<div id="suggest_material"></div>
			<div id="search_result"></div>
		</div>
		<script type="text/javascript" src="<?= base_url("js/jquery-2.0.3.js"); ?>"> </script>
		<script type="text/javascript" src="<?= base_url("js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?= base_url("js/user_search.js"); ?>"></script>
		<script type="text/javascript" src="<?= base_url("js/icsarman.js"); ?>"></script>
	</body>
</html>