<div class="modal fade bs-modal-lg" id="myModal_others<?= $item->id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Other Materials</h4>
		      </div>
		      <div class="modal-body" style="max-height:420px;overflow-y:auto;">
		        <form class = "modal_form" enctype="multipart/form-data" action = "/ICSArman/index.php/edit_material/callEditOther" method="post">
		        		<input class="form-control"type = "hidden" name="material_id" value='<?php echo $item->id?>' /><br/>
		        		Material ID: <input class="form-control"type = "text" name="material_id" value='<?php echo $item->id?>' disabled /><br/>
						Title: <input class="form-control"type = "text" name="title" value='<?php echo $item->title?>'/><br/>
						Author: <input class="form-control"type = "text" name="author" value='<?php echo $item->author?>'/><br/>
						Date Added: <input class="form-control"type = "date" name="date_added" value='<?php echo $item->date_added;?>'/><br/>
						Year: <input class="form-control"type = "number" name="year" min="1600" value='<?php echo $item->year;?>'/><br/>
						Type: 
						<select name="type">
								<option class="form-control" value="Betamax" <?php if($item->type === "Betamax") echo 'selected = "selected"';?>>Betamax</option>
								<option class="form-control" value="VHS" <?php if($item->type === "VHS") echo 'selected = "selected"';?>>VHS</option>
								<option class="form-control" value="VCD" <?php if($item->type === "VCD") echo 'selected = "selected"';?>>VCD</option>
								<option class="form-control" value="DVD" <?php if($item->type === "DVD") echo 'selected = "selected"';?>>DVD</option>
						</select><br/><br/>
						
						<input type="file" name="file" id="file" size="50"/><br/>
		      
		      </div>
		      <div class="modal-footer">
		        
		        <input type="submit" class="btn btn-primary" value = "Save" id="sub"/>
		    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		    	</form>  
		      </div>
		    </div>
		  </div>
		</div>
