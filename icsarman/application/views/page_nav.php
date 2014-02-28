<!--nakalasgay din ito sa view. Para sa links ng pagination-->
<div class="pagination">
	<a href="#" class="first" title="First">&laquo;</a>
	<a href="#" class="previous" title="Previous">&lsaquo;</a>  
	<?php
		for($i=1;$i<=$pageno;$i++){
			if($i==$currpage){
				echo "<span id='currpage'>{$i}  </span>";
			}
			else{
				echo "<a href='#' class='pagenum'>{$i}  </a>";
			}
		}
	?>					
	<a href="#" class="next" title="Next">&rsaquo;</a>
	<a href="#" class="last" title="Last">&raquo;</a>
	<?php 
		echo form_hidden("maxpage",$pageno);
	?>
</div>
<script type="text/javascript" src="<?php echo base_url("js/admin_pagination.js"); ?>"></script>