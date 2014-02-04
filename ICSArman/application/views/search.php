<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>
		
		<?php include_once "navbar.php"; ?>

	    <br/><br/><br/>

	    <div class="container">
			<div class="col-xs-12 col-md-3">
				<div class="row">
			    	<div class="input-group input-group-sm">
                        <h4>Filters</h4>
                    </div><br>
			    	<div class="input-group input-group-sm">
                        <span class="input-group-addon">Filter 1:</span>
                        <input type="text" class="form-control" >
                    </div><br>
			    	<div class="input-group input-group-sm">
                        <span class="input-group-addon">Filter 2:</span>
                        <input type="text" class="form-control" >
                    </div><br>
			    	<div class="input-group input-group-sm">
                        <span class="input-group-addon">Filter 3:</span>
                        <input type="text" class="form-control" >
                    </div><br>
			    	<div class="input-group input-group-sm">
                        <span class="input-group-addon">Filter 4:</span>
                        <input type="text" class="form-control" >
                    </div><br>
			    	<div class="input-group input-group-sm">
                        <input type="submit" class="form-control btn btn-primary" value="Show" >
                    </div><br>
			    </div>
			</div>
			    
		    <div class="col-xs-12 col-md-9">
		    	<div class="panel panel-default">
	              <div class="panel-heading">
	                <h3 class="panel-title">Search Results</h3>
	              </div>
	              <div class="panel-body">

	              	<table class="table table-bordered">
							  <th>Name</th>
							  <th>Information</th>
							  <th>Date</th>
							  <tr>
							    <td class="field-label col-xs-5">
							      <label>Book 1</label>
							    </td>
							    <td class="col-md-5">
							      Information 1
							    </td>
							    <td class="col-md-2">
							      Date 1
							    </td>
							  </tr>
							  <tr>
							    <td class="field-label col-xs-5">
							      <label>Book 2</label>
							    </td>
							    <td class="col-md-5">
							      Information 2
							    </td>
							    <td class="col-md-2">
							      Date 2
							    </td>
							  </tr>
							  <tr>
							    <td class="field-label col-xs-5">
							      <label>Book 3</label>
							    </td>
							    <td class="col-md-5">
							      Information 3
							    </td>
							    <td class="col-md-2">
							      Date 3
							    </td>
							  </tr>
							  <tr>
							    <td class="field-label col-xs-5">
							      <label>Book 4</label>
							    </td>
							    <td class="col-md-5">
							      Information 4
							    </td>
							    <td class="col-md-2">
							      Date 4
							    </td>
							  </tr>
							</table>

		    		<ul class="pagination">
					  <li><a href="#">&laquo;</a></li>
					  <li><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li><a href="#">&raquo;</a></li>
					</ul>
	              </div>
          		</div>
		    </div>
		</div>
	    <!-- end of search here -->

	    <hr>

	</body>
	<?php include_once "footer.html"; ?>
</html>