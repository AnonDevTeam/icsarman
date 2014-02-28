<!DOCTYPE html>

<html>
	<head>
		<title>User Search</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>
		<?php include_once "navbar.php"; ?>	
		<br/><br/><br/>
		<div class="container">
			<div class="col-xs-12 col-md-3">
				<div class="searchdiv">
					<form id="select_book">
						<select id="type" name="suggest_type" onchange="suggest_material();"> <!-- kapag nagpalit ng type,trigger radio button -->
							<option selected='selected'>All</option>
							<option>Book</option>
							<option>Magazine</option>
							<option>SP</option>
							<option>Thesis</option>
							<option>Others</option>
						</select>
						<?php
							$data = array(
							 	'id' => 'search_input',
							 	'class' => 'form-control',
							 	'name' => 'search_input',
							 	'placeholder' => 'Search',
							 	'autofill' => 'off',
							 	'autocomplete' => 'off',
							 	'onkeyup' => 'suggest_material();',
								'object_clicked' => 'first'
							);
							echo form_input($data);
						?>
						<div id="suggest_material" class="suggest"></div>
					</form>
					<button id="search_go" class="btn btn-primary pull-right button_resize" onclick="search();">Go</button>
				</div>
			</div>
			<div class="col-xs-12 col-md-8">
		    	<div class="panel panel-default">
	            	<div class="panel-heading">
	                	<h3 class="panel-title">Search Results</h3>
	            	</div>
	            	<div id="scsalert" class="alert alert-success alert-dismissable panel-body">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>SUCCESS!</strong> <span id="scsmsg">  </span>.
					</div>
	            	<div id="search_results" class="panel-body">
	            		<?php if(!isset($result)) include('user_instruction.php'); ?>
					</div>
				</div>
				<?php include_once "footer.html"; ?>
			</div>
		</div>
	</body>
</html>