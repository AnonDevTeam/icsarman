<!--Inalis ko na sa controller yuung mga echo para sa reult nung dropdown, malalagay ito sa loob ng search_result na div sa view-->
<!--sa view ito nakalagay-->
<div style="width:150px;">
	<?php $n = "res".$num; $js = "text(".$num.")";  ?>
		<div style="width:150px;" id = "<?php echo $n; ?>" onclick = "<?php echo $js; ?>" class='suggest_out'>
			<?php 
				if($type ==1)
					echo $row->title;
				else if ($type == 2)
					echo $row->author;
				else if($type==3)
					echo $row->publisher;
				else
					echo $row->adviser;
			?>

		</div>

</div>	