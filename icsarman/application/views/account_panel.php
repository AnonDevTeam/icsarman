<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account Panel</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>
		
		<?php include_once "navbar.php"; ?>

	    <br/><br/><br/><br/>

		<!-- user account -->
		<div class="container">
			<ul class="nav nav-pills nav-stacked col-md-2">
			  <li class="active"><a href="#tab1" data-toggle="pill">Profile</a></li>
			  <li><a href="#tab2" data-toggle="pill">Edit Account</a></li>
			</ul>
			<div class="tab-content col-md-10">
			        <div class="tab-pane active" id="tab1">
			        	<div class="panel panel-default">
			              <div class="panel-heading">
			                <h3 class="panel-title">Profile</h3>
			              </div>
			              <div class="panel-body">
			              	<div class="form-group">
							        <label class="col-xs-3 control-label">Admin Name:</label>
							        <div class="col-xs-9">
							            <p>Lance Larsen D. De Guzman</p>
							        </div>
							    </div>
								<div class="form-group">
							        <label class="col-xs-3 control-label">Information 1:</label>
							        <div class="col-xs-9">
							            <p>Information 1... information</p>
							        </div>
							    </div>
							    <div class="form-group">
							        <label class="col-xs-3 control-label">Information 2:</label>
							        <div class="col-xs-9">
							            <p>Information 2... information</p>
							        </div>
							    </div>
							</div>
		          		</div>
			        </div>
			        <div class="tab-pane" id="tab2">
			             <div class="panel panel-default">
			              <div class="panel-heading">
			                <h3 class="panel-title">Edit Account</h3>
			              </div>
			              <div class="panel-body">
			              	<form class="form-horizontal">
						        <div class="form-group">
							        <label class="col-xs-3 control-label">Administrator name:</label>
							        <div class="col-xs-9">
							            <input type="text"class="form-control" value="lance@gmail.com">
							        </div>
							    </div>
								<div class="form-group">
							        <label class="col-xs-3 control-label">Password:</label>
							        <div class="col-xs-9">
							            <input type="password" class="form-control" value="password">
							        </div>
							    </div>
							    <div class="form-group">
							        <label class="col-xs-3 control-label">Retype Password:</label>
							        <div class="col-xs-9">
							            <input type="password" class="form-control" value="password">
							        </div>
							    </div>
						        <div class="form-group">
				       				<div class="col-xs-offset-4 col-xs-8">
						        		<input type="submit" class="btn btn-primary" value="Update">
						        	</div>
						        </div>
							</form>
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