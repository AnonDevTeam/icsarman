
		<div class="modal fade bs-modal-lg" id="myModal_delete<?= $item->material_id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this book?</h4>
		      </div>
		      
		      <div class="modal-body">
		        <form class = "modal_form" enctype="multipart/form-data" action = "/ICSArman/index.php/edit_material/callDeleteBook" method="post">
		      </div>		
		      
		      <div class="modal-footer">
		        
		      <input type="submit" class="btn btn-primary" value = "Yes"/>
		      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		    	</form>  
		      </div>
		    
		    </div>
		  </div>
		</div>
