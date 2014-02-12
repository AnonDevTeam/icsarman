
<!DOCTYPE html>

<html>
	<head>
		<script type="text/javascript" src=<?= base_url("themes/js/jquery-2.0.3.js"); ?>> </script>
		<script type="text/javascript" src=<?= base_url("themes/js/book_search.js"); ?>></script>
		<style type="text/css">
			.suggest_out {
				padding:0px;
			}
			.suggest_out:hover {
				background-color:rgb(200,200,200);
				cursor:pointer;
			}
			#for_reserve{
				display:none;
				background:yellow; 
				position: absolute;
				top: 50%;
				left: 50%;
				margin-left: -100px;
				margin-top: -75px;
				width: 300px;
				height: 175px;
			}
		</style>
		
	</head>
	<body>
	
		<div id = "searchdiv">
			<form action="<?= site_url('searchController/searchMaterial') ?>">
				<input autofill="false" autocomplete="off" type="text" placeholder="Search" name="search_input" id="search_input" onkeyup="suggest()">
				<select id = "type" name = "type" >
					<option>All</option>
					<option>Book</option>
					<option>Magazine</option>
					<option>SP_Thesis</option>
					<option>Other</option>
				</select></br></br>
				<div id = "search_result" style="background-color:pink; width: 150px; margin-top: -20px; margin-left: 2px;"> </div>
				<input type="submit" name = "search" id = "search" value="Go">
		
			</form>
		</div>
		
		<?php if(isset($result)) foreach ($result as $row): ?>
			<div id = "search" style="border: 2px solid; padding: 20px;">
			
				<div id = "pic" style="float: left;"> <img src =<?= base_url("$row->picture"); ?> width="150" height="150"> </div>	<!--div for the picture-->

					<fieldset  style="border:none;">
						<legend>Material ID: <?php echo $row->material_id; ?> <legend> </br>
						Title: <?php echo $row->title; ?></br>
						Author: <?php echo $row->author; ?></br>
						Year: <?php echo $row->year; ?></br>
						Type: <?php echo $row->type; ?></br>
						<?php if($row->type == 'book'){ ?>
							Publisher: <?php echo $row->publisher; ?></br>
							Course Code: <?php echo $row->course_code; ?></br>
						<?php } else if($row->type == 'magazine'){ ?>
							Month: <?php echo $row->month; ?></br>
							Volume Number: <?php echo $row->volume_number; ?></br>
						<?php } else if($row->type == 'sp' || $row->type == 'thesis'){ ?> 
							Adviser: <?php echo $row->adviser; ?></br>
						<?php } ?> 
						Date Added: <?php echo $row->date_added; ?></br>
						Quantity: <?php echo $row->quantity; ?></br></br>
					</fieldset>

				
				<div id = "stat" style="float:right; margin-right: 100px; margin-top: -200px;">	<!--div for the status and reserve button-->
					Status: <?php echo $row->status; ?></br></br></br></br></br></br></br>
					<?php if ($row->quantity > 0) echo	"<button onclick = \"reserve(".$row->material_id .")\" 
							>Reserve</button>"; ?>
				</div>
				
			</div></br>
		<?php endforeach; ?>
		
		<p> <?php if(isset($links)) echo $links ; ?></p>
		
		
		<div id = "for_reserve">
			<table>
				<tr><td>Username: </td>
					<td><input autofill="false" autocomplete = "false" type="text" name="user_name" id="user_name"  autofocus required></br></br> </td></tr>
				<tr><td>Student Number: </td>
					<td><input autofill="false" autocomplete="false" type="text" name="user_stdnum" id="user_stdnum"  required></br> </td></tr>
			</table>
				</br><br/>&nbsp&nbsp<button id = "check_reserve" >Go</button>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button id = "cancel" >Cancel</button>
		</div>
	
	</body>
</html>