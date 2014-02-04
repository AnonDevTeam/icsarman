<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account Panel</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>
		
		<?php include_once "navbar.php"; ?>

	    <br/><br/><br/>

		<!-- user account -->
		<div class="container">
			<h3>Hello, Admin Lance Larsen!</h3><hr>
			<h4>Transactions</h4>
			<ul class="nav nav-pills nav-stacked col-md-2">
			  <li class="active"><a href="#tab1" data-toggle="pill">Add Material</a></li>
			  <li><a href="#tab2" data-toggle="pill">Edit Material</a></li>
			  <li><a href="#tab3" data-toggle="pill">Reports</a></li>
			  <li><a href="#tab4" data-toggle="pill">Media Management</a></li>
			  <li><a href="#tab5" data-toggle="pill">Suggestions</a></li>
			  <li><a href="#tab6" data-toggle="pill">Account Request</a></li>
			  <li><a href="#tab7" data-toggle="pill">Borrow Request</a></li>
			</ul>
			<div class="tab-content col-md-10">
		        
				<div class="tab-pane active" id="tab1"> 
			        <div class="panel panel-default">
				              <div class="panel-heading">
			        <?php include_once "addbook_view.php"; ?>
			    </div></div></div>
			        <div class="tab-pane" id="tab2">
			             <div class="panel panel-default">
				              <div class="panel-heading">
				 	 <?php include_once "edit_book_view.php"; ?>
							  </div>
						 </div>
					</div>                
			        <div class="tab-pane" id="tab3">
			             <div class="panel panel-default">
			              <div class="panel-heading">
			                <h3 class="panel-title">Reports</h3>
			              </div>
			              <div class="panel-body">
			              	<p>Reports here...</p>
			              </div>
		          		</div>
			        </div>
			        <div class="tab-pane" id="tab4">
			             <div class="panel panel-default">
			              <div class="panel-heading">
			                <h3 class="panel-title">Media Management</h3>
			              </div>
			              <div class="panel-body">
			              </div>
		          		</div>
			        </div>
			        <div class="tab-pane" id="tab5">
			             <div class="panel panel-default">
				              <div class="panel-heading">
				 	 			<?php include_once "manage_suggestion_view.php"; ?>
							  </div>
						 </div>
					</div>
			        
					<div class="tab-pane" id="tab6">
			             <div class="panel panel-default">
				              <div class="panel-heading">
				 	 			<?php include_once "approve_accounts_view.php"; ?>
							  </div>
						 </div>
					</div>
					<div class="tab-pane" id="tab7">
			             <div class="panel panel-default">
				              <div class="panel-heading">
				 	 			<?php include_once "manage_requests_view.php"; ?>
							  </div>
						 </div>
					</div>
					</div>
		</div>
		<hr>
	    <!-- end of user account -->

	</body>
	<?php include_once "footer.html"; ?>
</html>