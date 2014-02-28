<!--Ito na yung result ng searching, malalagay ito sa loob ng res na div sa view-->
<!--sa view ito nakalagay-->

<div id = "material_result" style="border: 2px solid; padding: 20px;" >

	<?php if(isset($noresult)){ echo "No results found";} ?>	
	<?php if(isset($row)){ $picture = ($row->picture != '')? $row->id.".".$row->picture : "default.jpg" ?>
	<div id = "pic" style="float: left;"> <img src = <?= base_url("themes/imags/".$picture); ?> width="150" height="150"> </div>	<!--div for the picture-->
		<fieldset  class="book-info">
			<legend>Material ID: <?php echo $row->id; ?> </legend> <br />					
			Title: <?php echo $row->title; ?><br />
			<input type="hidden" value="<?php echo $row->title; ?>" id="<?php echo 'search_in'.$row->id;?>" name="search_in" />
			<input type="hidden" value="<?php echo $row->type; ?>" id="<?php echo 'type_in'.$row->id;?>" name="type_in" />
			Author: <?php echo $row->author; ?><br />
			Year: <?php echo $row->year; ?><br />
			Type: <?php echo $row->type; ?><br />
			<?php if($row->type == 'book'){ ?>
			Publisher: <?php echo $row->publisher; ?><br />
			Course Code: <?php echo $row->course_code; ?><br />
			<?php } else if($row->type == 'magazine'){ ?>
			Month: <?php echo $row->month; ?><br />
			Volume Number: <?php echo $row->volume_number; ?><br />
			<?php } else if($row->type == 'sp' || $row->type == 'thesis'){ ?> 
			Adviser: <?php echo $row->adviser; ?><br />
			Date Added: <?php echo $row->date_added; }?><br />

			 <div id = "stat" class="pull-right">	
				<?php echo	"<button onclick = \"reserve(".$row->material_id .")\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">Add to Cart</button>";  ?>
				<?php echo "<button onclick=\"showQueue(".$row->material_id .")\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#listModal\">Show List</button>"; ?>
			</div>
			<?php  }?>
		</fieldset>
</div>