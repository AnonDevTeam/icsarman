<!--result ng sinearch na student number-->
<div id = "material_result" style="border: 2px solid; padding: 20px;" >
			
	<?php if(isset($nores)){ echo "No results found";  } $counter = 1;?>	

	<?php if(isset($info[0])){ $picture = ($info[0]->picture != '')? $info[0]->material_id.".".$info[0]->picture : "user_default.jpg" ?>
	<div id = "pic" style="float: left;"> <img src =<?= base_url("themes/imags/".$picture); ?> width="150" height="150"> </div>	<!--div for the picture-->
		<fieldset  class="book-info">
			<legend>User ID: <?php echo $info[0]->id; ?> </legend> 				
			Name: <?php echo $info[0]->lastname.", ".$info[0]->firstname." ".$info[0]->middleinitial; ?><br />
			Student Number: <?php echo $info[0]->studentnumber; ?><br />
			Username: <?php echo $info[0]->username; ?><br />
			Email: <?php echo $info[0]->email; ?><br />
			School : <?php echo $info[0]->school; ?><br />
			Type: <?php echo $info[0]->type; ?><br />
			Status: <?php echo $info[0]->status; ?><br /><br /><br />
			<?php if(isset($mat)){ ?>
				<table class="table table-striped table-bordered table-condensed"> 
					<tr>
						<td> Type </td>
						<td> Title </td>
						<td> Author </td>
						<td> Year Published </td>
						<td> Action </td>
						<td> Action </td>
					</tr>
			
				Queue: <?php foreach($mat as $row){ ?> <br />
				<?php foreach($row as $row1){ ?>
					<tr>
						<td>
							<?php	if($counter < $count) { ?>
							<?php	echo $row1->type;?>
							<?php	} else{ ?>
							<?php	echo $row1->type; ?>
							<?php	} $counter += 1; ?>
						</td>
						<td> <?php	echo $row1->title;?> </td>
						<td> <?php	echo $row1->author;?> </td>
						<td> <?php	echo $row1->year;?> </td>
						<td> <?php echo	"<button onclick = \"checkOut(".$row1->id.",". $info[0]->id.")\" class=\"btn btn-primary btn-sm\">Check Out</button>";  ?> </td>
						<td> <?php echo "<button onclick=\"removeToCart(".$row1->id.",". $info[0]->id.")\" class=\"btn btn-primary btn-sm\">Remove to Cart</button>"; ?> </td>
					</tr>
				<?php }?>
				<?php }?>

				</table>
				<?php }?>
			<?php }?>
		</fieldset>
</div><br />