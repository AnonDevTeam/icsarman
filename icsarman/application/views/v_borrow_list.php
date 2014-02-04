<div class="material_list" <?php if($row->diff <=1) echo " due_alert"; ?> style="border:1px solid black;width:300px;">
	<img src='' /><br />
	Material Title: <?= $row->title;?> <br />
	Author: <?= $row->author; ?><br /> 
	Type: 
	<?php
		switch($row->type){
			case "book": echo "Book"; break;
			case "magazine": echo "Magazine"; break;
			case "sp_thesis": echo "SP/Thesis"; break;
			case "other": echo "Other"; break;
		}
	?>
	<br />
	Date Borrowed: <?= mdate("%M %d %Y",human_to_unix($row->date_borrowed));?> <br />
	Due Date: <?=mdate("%M %d %Y",human_to_unix($row->due_date));?><br />
</div>