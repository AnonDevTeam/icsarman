<div class='material_info'>
	<?php
		switch($row->type){
			case "book":
				$defaultpic = "book_default.jpg";
				break;
			case "magazine":
				$defaultpic = "magazine_default.jpg";
				break;
			case "sp": case "thesis":
				$defaultpic = "sp_thesis_default.jpg";
				break;
			default:
				$defaultpic = "other_default.jpg";
				break;
		}
		$picture = ($row->picture != '')? $row->material_id.".".$row->picture : $defaultpic;
	?>
		

		<div class = "image_div">
			<img class='material_image' src=<?php echo base_url("images/".$picture); ?> /><br/>
		</div>
		<div class='material_data'>
			<div class="mat mat_title"><p><?php echo $row->title; ?></p></div>
			<?php if(isset($row->volume)) echo "<div class='mat mat_volume'><p>Volume: ".$row->volume."</p></div>"; ?></p>
			<?php if(isset($row->month)) echo "<div class='mat mat_month'><p>Month: ".$row->month."</p></div>"; ?></p>
			<div class="mat mat_author"><p>Author: <?php echo $row->author; ?></p></div>
			<?php if(isset($row->publisher)) echo "<div class='mat mat_publisher'><p>Publisher: ".$row->publisher."</p></div>"; ?></p>
			<div class="mat mat_year"><p>Year: <?php echo $row->year; ?></p></div>
			<div class="mat mat_type"><p>Type: <?php echo $row->type; ?></p></div>
			<?php if(isset($row->course_code)) echo "<div class='mat mat_ccode'><p>Course Code: ".$row->course_code."</p></div>"; ?></p>
			<?php if(isset($row->adviser)) echo "<div class='mat mat_adviser'><p>Adviser: ".$row->adviser."</p></div>"; ?></p>
		</div>
			<?php
				if($isInQueue){
			?>
					<div class="button_div">
						<?php echo "<div class='status_div'><p> <span>You Reserved This. </span></p></div>"; ?>
					</div>
			<?php
				}
				else{
			?>
					<div class="button_div">
						<button type="button" class="btn btn-primary btn-md" onclick="getQueue(<?php echo $row->id;?>)">
				  			<span>Add to Cart</span>
				  			<span class="glyphicon glyphicon-shopping-cart"></span> 
						</button>
						
					</div>

				<div class="modal fade" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Add <?php echo $row->title;?> to cart</h4>
				      </div>
				      <div class="modal-body">
				      		<p id="queuemsg"></p>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        <button type="button" class="btn btn-primary" href="#" data-dismiss="modal" onclick="enqueue(<?php echo $row->id.", ".$userid;?>)">Enqueue</button>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Success</h4>
				      </div>
				      <div class="modal-body">
				      		<p> You are now enqueued for reservation for <?php echo $row->title;?>. You will be contacted via e-mail or text when the material is available for you.</p>

				      </div>
				      <div class="modal-footer">
				      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refreshList()"> OK </button>
				  	</div>
				    </div>
				  </div>
				</div>
			<?php
				}
			?>
</div>