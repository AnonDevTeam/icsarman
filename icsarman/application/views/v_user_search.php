<!DOCTYPE html>
<html>
	<head>
		<title>User Integration - A*DevTeam</title>
		<style type="text/css">
			.suggest_out {
				padding:0px;
			}
			.suggest_out:hover {
				background-color:rgb(200,200,200);
				cursor:pointer;
			}
			.material_info{
				border: 1px solid black;
			}
			#reserve_popup{
				display:none;
			}
			#borrow_popup{
				display:none
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
			</form>
			<span id="borrow_due"><h4>Due Date: <span id="due_date">this date<span></h4></span>
			<button id="borrow_button" disabled='true' value="" onclick="borrow();">Borrow</button>
		</div>
		<div>
			<form>
				<?php
					$data = array(
						'id' => 'search_input',
						'name' => 'search_input',
						'placeholder' => 'Search',
						'autocomplete' => 'off',
						'onkeyup' => 'suggest_material();'
					);
					echo form_input($data);
				?>
				<select id="type" name="suggest_type" > <!-- kapag nagpalit ng type,trigger radio button -->
					<option selected='selected'>All</option>
					<option>Book</option>
					<option>Magazine</option>
					<option>SP</option>
					<option>Thesis</option>
					<option>Others</option>
				</select></br></br>
				<input type='checkbox' id='filter_all' class='filter' name='filter' value='all' checked='checked'/>
				<?= form_label('All','filter_all') ?>
				<input type='checkbox' id='filter_title' class='filter' name='filter' value='title' />
				<?= form_label('Title','filter_title') ?>
				<input type='checkbox' id='filter_author' class='filter' name='filter' value='author' />
				<?= form_label('Author','filter_author') ?>
				<input type='checkbox' id='filter_publisher' class='filter' name='filter' value='publisher' />
				<?= form_label('Publisher','filter_publisher') ?>
				<input type='checkbox' id='filter_adviser' class='filter' name='filter' value='adviser' />
				<?= form_label('Adviser','filter_adviser') ?>
			</form>
			<button id="search_go" onclick="search();">Go</button>
			<div id="suggest_material"></div>
			<div id="search_result"></div>
		</div>
		<script type="text/javascript" src="<?= base_url("themes/js/jquery-2.0.3.js"); ?>"> </script>
		<script type="text/javascript" src="<?= base_url("themes/js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?= base_url("themes/js/user_search.js"); ?>"></script>
	</body>
</html>