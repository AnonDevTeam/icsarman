
		<div class="modal fade bs-modal-lg" id="myModal<?= $item->id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Book</h4>
		      </div>
		      <div class="modal-body" style="max-height:420px;overflow-y:auto;">
		        <form class = "modal_form" enctype="multipart/form-data" action = "/ICSArman/index.php/edit_material/callEditBook" method="post">
		        		<input class="form-control"type = "hidden" name="material_id" value='<?php echo $item->id?>' /><br/>
		        		Material ID: <input class="form-control"type = "text" name="material_id" value='<?php echo $item->id?>' disabled /><br/>
						Title: <input class="form-control"type = "text" name="title" value='<?php echo $item->title?>'/><br/>
						Author: <input class="form-control"type = "text" name="author" value='<?php echo $item->author?>'/><br/>
						Date Added: <input class="form-control"type = "date" name="date_added" value='<?php echo $item->date_added;?>'/><br/>
						Year: <input class="form-control"type = "number" name="year" value='<?php echo $item->year;?>'/><br/>
						Course Code: <input type = "text" class="form-control" name="course_code" value='<?php echo $item->course_code;?>'/><br/>
						Publisher: <input type = "text" class="form-control" name="publisher" value='<?php echo $item->publisher;?>'/><br/>
						
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
