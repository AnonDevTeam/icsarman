<div class="material_list" style="border:1px solid black;width:300px;">
	<img src='' /><br />
	<p>Material Title: <?php echo $row->title?></p><br />
	<p>Author: <?php echo $row->author?></p><br />
	<p>Type: 
			<?php
			switch($row->type){
				case "book": echo "Book"; break;
				case "magazine": echo "Magazine"; break;
				case "sp_thesis": echo "SP/Thesis"; break;
				case "other": echo "Other"; break;
			}
			?>
	</p>
	<br />
	<p>Date Reserved: <?php echo  mdate("%M %d %Y",human_to_unix($row->date_reserved))?></p><br />
</div>
