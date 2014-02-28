<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search</title>
		<?php include_once "links.html"; session_start();?>
		</script>
	</head>
	<body>
		
		<?php include_once "navbar.php"; ?>

	    <br/><br/><br/>
		<div class="container">
		<!--for tabnav-->
		<div class="tabbable tabs-left">
	        <ul class="nav nav-tabs">
	          <li><a href="#user_based" data-toggle="tab" id = "ubased">User-based</a></li>
	          <li><a href="#material_based" data-toggle="tab" id = "mbased">Material-based</a></li>
	        </ul>
	        <div class="tab-content">
	         	<div class="tab-pane active" id="user_based">
	         		<br/>
	         		<div class="input-group input-group-sm">
                    	<span class="input-group-addon inlabel">Student number:</span>
                    	<input  type="text" id="stdnum" name="stdnum" placeholder="0000-00000" value="<?php echo set_value('stdnum'); ?>"/>
	     			</div><br/>
	     			<button name = "search_button" class="btn btn-success" id = "search_button"  onclick = "user_based();">Go</button>
	     			<br/><br/>
	     		</div>
	         	<div class="tab-pane" id="material_based">
	         		<div class="search_div"><br/>
								<select id = "type" name = "type">
							        	<option value="All" selected>All</option>
							        	<option value="Book">Book</option>
							        	<option value="Magazine">Magazine</option>
							        	<option value="SP_Thesis">SP/Thesis</option>
							        	<option value="Other" >Others</option>
							    </select>
							    	<input autofill="false" autocomplete="off" type="text" placeholder="Search title, author, publisher etc here" name="search_input" id="search_input" value="<?php echo set_value('search_input');?>"/>
							    	<input autofill="false" autocomplete="off" type="text" placeholder="Search year" name="search_year" id="search_year" value="<?php echo set_value('search_year');?>"/>
							    	<br/><div id = "search_result" > </div>
					  
							    <br/><button name = "search_button" class="btn btn-success " id = "search_button"  onclick = "search();">Go</button><br/><br/>
			        </div>
	     		</div>
	        </div>
	    </div>
      <!-- /tabs -->       
		</div>
	    <div class="container">
		    	<div class="panel panel-default">
	              <div class="panel-heading">
	                <h3 class="panel-title">Search Results</h3>
	              </div>
	              <div class="panel-body" id ="ins">

	            
				<!-- modal for the "show list" button -->
				<div id = "res" ></div>	
				<div class="modal fade bs-modal-lg res" id="listModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">List of </h4>
					      	</div>
					      	<div class="modal-body">
					      	<div id = "queue"></div>
					      	<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Ok</button>
					     	<br/>
					     	</div>
						</div>
					</div>
				</div>


				<?php //if() include('instruction.php'); ?> <!--Kinomment ko muna to, hindi ko maayos eh-->	

				<div class="modal fade bs-modal-lg res" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Account Information</h4>
					      </div>
					      <div class="modal-body">
					        <form class="book-info">
					        	<p id = "msg"></p>
					        	<p id = "msg2"</p>
							<div class="pull-right">
							<button class="btn btn-primary" id = "check_reserve2">Continue</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</div>
							<br/>
							</form>
							<div  id="for_reserve2"></div>
					    </div>
					  </div>
					</div>
				</div>

				  
		
				<!-- modal for the "add to cart" button -->
					<div class="modal fade bs-modal-lg res" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Account Information</h4>
					      </div>
					      <div class="modal-body">
					        <form class="book-info">
					        	<div class="input-group" >
					        		<span class="input-group-addon">Username:</span>
					        		<input autofill="false" class="form-control" autocomplete = "false" type="text" name="user_name" id="user_name"  autofocus required>
					        	</div>
					        	<br/>
					        	<div class="input-group ">
					        		<span class="input-group-addon">Student Number:</span>
					        		<input autofill="false" class="form-control" autocomplete="false" type="text" name="user_stdnum" id="user_stdnum"  required>
					        	</div>
							<br/>
							<div class="pull-right">
							<button class="btn btn-primary" id = "check_reserve">Go</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</div>
							<br/>
							</form>
							<div  id="for_reserve"></div>
					    </div>
					  </div>
					</div>
				</div>              	


	              </div>
	            </div>
	            <?php include_once "footer.html";?>
	    </div>
	    <hr />
	</body>
</html>