<div class="pagination">
	<?php
		$max = 5;
		$prev_ellipsis = false;
		$next_ellipsis = false;
	?>
	
	<?php
		// if number of pages do not exceed the maximum pages which is 5;
		if($pageno <= $max){

			echo "<span id='first'>&laquo;   </span>";
			echo "<span id='previous'>&lsaquo;   </span>";

			for($i=1;$i<=$pageno;$i++){
				if($i==$currpage){
					echo "<span id='currpage'>{$i}    </span>";
				}
				else{
					echo "<a href='#' class='pagenum'>{$i}    </a>";
				}
			}
			echo "<span id='next'>&rsaquo;   </span>";
			echo "<span id='last'>&raquo;   </span>";
		}
		else{
			if($object_clicked == "first"){
				$firstnum = 1;
				$lastnum = $max;
				$next_ellipsis = true;
			}
			else if($object_clicked == "last"){
				$firstnum = $pageno - (($pageno -1) % $max);
				$lastnum = $pageno;
				$prev_ellipsis = true;
			}
			else if($object_clicked == "previous"){
				if($currpage == $firstnum -1 ){
					$firstnum = $currpage;
					$lastnum = $currpage + $max - 1;
					if($lastnum > $pageno) $lastnum = $pageno;
				}
				if($firstnum > 1) $prev_ellipsis = true;
				if($lastnum < $pageno) $next_ellipsis = true;
					
			}
			else if($object_clicked == "next"){
					$num = (($currpage - 1) / $max ) + 1; 
					if($currpage > $max && $currpage == ($lastnum + 1) ){
						$firstnum = $currpage - ($max-1);
						$lastnum = $currpage;
					}
				if($lastnum > $pageno) $lastnum = $pageno;
				if($firstnum!=1) $prev_ellipsis = true;
				if($lastnum != $pageno) $next_ellipsis = true;
			}
			else if($object_clicked == "prev_ellipse"){
				$firstnum = $currpage - ($max - 1);
				$lastnum = $currpage;
				if($firstnum <= 0) {
					$firstnum = 1; 
					$lastnum = 5;
					} 			
				if($lastnum < $pageno) $next_ellipsis = true;
				if($firstnum > 1) $prev_ellipsis = true;
			}
			else if($object_clicked == "next_ellipse"){
				$firstnum = $currpage;
				$lastnum = $firstnum + ($max - 1);
				if($lastnum > $pageno)  $lastnum = $pageno;
				if($lastnum < $pageno) $next_ellipsis = true;
				if($firstnum > 5) $prev_ellipsis = true;
			}
			else{
				if($firstnum!=1)  $prev_ellipsis = true;
				if($lastnum!=$pageno) $next_ellipsis = true;
			}

			if($currpage != 1){
					if ($firstnum > 1) echo "<a href='#' class='first' title='First'>&laquo;   </a>";
					else echo "<span id='first'>&laquo;  </span>";
					echo "<a href='#' class='previous' title='Previous'>&lsaquo;   </a>";
				}
			else{
					echo "<span id='first'>&laquo;   </span>";
					echo "<span id='previous'>&lsaquo;   </span>";
				}

			if($prev_ellipsis == true) echo "<a href='#' class='prev_ellipse'>&hellip;   </a>";

				for($i=$firstnum; $i<=$lastnum; $i++){
					if($i==$currpage){
						if($i==$firstnum) echo "<span id='currpage' class='firstnum' >{$i}   </span>";
						else if($i==$lastnum) echo "<span id='currpage' class='lastnum'>{$i}   </span>";
						else echo "<span id='currpage'>{$i}  </span>";
					}
					else{
						if($i==$firstnum) echo "<a href='#' class='pagenum firstnum' >{$i}   </a>";
						else if($i==$lastnum) echo "<a href='#' class='pagenum lastnum' >{$i}   </a>";
						else echo "<a href='#' class='pagenum' >{$i}   </a>";
					}
				}
			if($next_ellipsis == true) echo "<a href='#' class='next_ellipse'>&hellip;</a>";
			}
	?>	
	<?php
		if($currpage != $pageno){
			echo "<a href='#' class='next' title='Next'>&rsaquo;    </a>";
			if($lastnum < $pageno) echo "<a href='#' class='last' title='Last'>&raquo;    </a>";
			else echo "<span id='last'>&raquo;   </span>";
		}
		else{
			echo "<span id='next'>&rsaquo;   </span>";
			echo "<span id='last'>&raquo;   </span>";
		}
	?>

	<?php 
			echo form_hidden("maxpage",$pageno);
			echo form_hidden("firstnum",$firstnum);
			echo form_hidden("lastnum",$lastnum);
	?>
</div>
<script type="text/javascript" src="<?php echo base_url("js/pagination.js"); ?>"></script>