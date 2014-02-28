<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Suggest</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>
		
		<?php include_once "navbar.php"; ?>

	    <br/><br/><br/>

	    <!-- suggestion box -->
	    <div class="container">
	    	<div class="well">
		    	<h3>Suggest A Book<small> Help us expand our library.</small></h3>
		    	<hr>
				<form class="form-horizontal">
			        <div class="form-group">
				        <label class="col-xs-2 control-label">Title</label>
				        <div class="col-xs-10">
				            <input type="text"class="form-control">
				        </div>
				    </div>
					<div class="form-group">
				        <label class="col-xs-2 control-label">Author</label>
				        <div class="col-xs-10">
				            <input type="text" class="form-control">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-xs-2 control-label">Others</label>
				        <div class="col-xs-10">
				            <input type="text" class="form-control">
				        </div>
				    </div>
			        <div class="form-group">
	       				<div class="col-xs-offset-4 col-xs-8">
			        		<input type="submit" class="btn btn-primary" value="Suggest">
			        	</div>
			        </div>
				</form>
			</div>
        </div>
        <!-- end of suggestion box -->
	</body>
    <hr>
	<?php include_once "footer.html"; ?>
</html>