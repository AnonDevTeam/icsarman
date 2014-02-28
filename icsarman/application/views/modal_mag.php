
		<div class="modal fade bs-modal-lg" id="myModal_mag<?= $item->id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Magazine</h4>
		      </div>
		      <div class="modal-body" style="max-height:420px;overflow-y:auto;">
		        <form class = "modal_form" enctype="multipart/form-data" action = "/ICSArman/index.php/edit_material/callEditMagazine" method="post">
		        		<input class="form-control"type = "hidden" name="material_id" value='<?php echo $item->id?>' /><br/>
		        		Material ID: <input class="form-control"type = "text" name="id" value='<?php echo $item->id?>' disabled /><br/>
						Title: <input class="form-control"type = "text" name="title" value='<?php echo $item->title?>'/><br/>
						Author: <input class="form-control"type = "text" name="author" value='<?php echo $item->author?>'/><br/>
						Date Added: <input class="form-control"type = "date" name="date_added" value='<?php echo $item->date_added;?>'/><br/>
						Year: <input class="form-control"type = "number" name="year" value='<?php echo $item->year;?>'/><br/>
						Volume Number: <input type = "number" min="1" class="form-control" name="volume_number" value='<?php echo $item->volume_number;?>'/><br/>
						Month: <select name="month">
								<option class="form-control" value="1" <?php if($item->month == 1) echo 'selected = "selected"';?>>January</option>
								<option class="form-control" value="2" <?php if($item->month == 2) echo 'selected = "selected"';?>>February</option>
								<option class="form-control" value="3" <?php if($item->month == 3) echo 'selected = "selected"';?>>March</option>
								<option class="form-control" value="4" <?php if($item->month == 4) echo 'selected = "selected"';?>>April</option>
								<option class="form-control" value="5" <?php if($item->month == 5) echo 'selected = "selected"';?>>May</option>
								<option class="form-control" value="6" <?php if($item->month == 6) echo 'selected = "selected"';?>>June</option>
								<option class="form-control" value="7" <?php if($item->month == 7) echo 'selected = "selected"';?>>July</option>
								<option class="form-control" value="8" <?php if($item->month == 8) echo 'selected = "selected"';?>>August</option>
								<option class="form-control" value="9" <?php if($item->month == 9) echo 'selected = "selected"';?>>September</option>
								<option class="form-control" value="10" <?php if($item->month == 10) echo 'selected = "selected"';?>>October</option>
								<option class="form-control" value="11" <?php if($item->month == 11) echo 'selected = "selected"';?>>November</option>
								<option class="form-control" value="12" <?php if($item->month == 12) echo 'selected = "selected"';?>>December</option>

						</select><br/><br/>
						
						<input type="file" name="file" id="file" size="50"/>
		      </div>
		      <div class="modal-footer">
		        
		        <input type="submit" class="btn btn-primary" value = "Save" id="sub"/>
		    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		    	</form>  
		      </div>
		    </div>
		  </div>
		</div>
