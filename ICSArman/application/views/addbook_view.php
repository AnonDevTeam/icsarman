
<ul class="nav nav-tabs">
  <li class="active"><a href="#books_container" data-toggle="tab">Book</a></li>
  <li><a href="#magazines_container" data-toggle="tab">Magazine</a></li>
  <li><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>
  <li><a href="#others_container" data-toggle="tab">Others</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="books_container">
		<div class="panel-heading">
			    <h3 class="panel-title"><b>Add Book Here</b></h3>
		</div>

		<div id="book_container_admin">
		<form enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			
			<div class="form-group">
				        <label class="col-xs-2 control-label">Title</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control" name="title">
			    </div></div>
			
		   <br/>

				<div class="form-group">
				        <label class="col-xs-2 control-label" >Author</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control" name="author">
			    </div></div>
			
		   <br/>
		   
				<div class="form-group">
				        <label class="col-xs-2 control-label">Year</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control" name="year">
			    </div></div>
		   
		   <br/>
		   
				<div class="form-group">
				        <label class="col-xs-2 control-label">Publisher</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control" name="publisher">
			    </div></div>
			   
			<br/>		   
		   
				<div class="form-group">
				        <label class="col-xs-2 control-label">Quantity</label>
					    <div class="col-xs-10">
				        <input type="number"class="form-control" name="quantity">
			    </div></div>
		
		   <br/>
		   
				<div class="form-group">
				        <label class="col-xs-2 control-label">Course Code:</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control" name="course_code">
			    </div></div>
		
			<br/><br/>
			<div class="form-group">
				<label for="file" class="col-xs-2 control-label">Upload photo:</label><br/><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div>
			<input type="submit" class="btn btn-primary" name="add_book" value="Add Book"/>
			</form>
		
	</div>
	</div>
<div class="tab-pane fade" id="magazines_container">
		<div class="panel-heading">
			    <h3 class="panel-title"><b>Add Magazine Here</b></h3>
		</div>

		<div id="magazines_container_admin">
		<form enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div class="form-group">
				        <label class="col-xs-2 control-label">Title</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>

				<div class="form-group">
				        <label class="col-xs-2 control-label">Author</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>
		   
				<div class="form-group">
				        <label class="col-xs-2 control-label">Year</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			<div class="form-group">
			<label class="col-xs-2 control-label">Month</label> <div class="col-xs-10"> <select class="form-control" name="month">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select></div></div><br/>
			<div class="form-group">
				        <label class="col-xs-2 control-label">Volume Number</label>
					    <div class="col-xs-10">
				        <input type="number"class="form-control">
			    </div></div>
		
		   <br/>
		   <div class="form-group">
			<label class="col-xs-2 control-label">Quantity</label>
					    <div class="col-xs-10">
				        <input type="number"class="form-control">
			    </div></div>   
				
		
			<br/><br/>
			<div class="form-group">
				<label for="file" class="col-xs-2 control-label">Upload photo:</label><br/><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div>
			
			<input class="btn btn-primary" type="submit" name="add_mag" value="Add Magazine"/>
		</form>
</div>
</div>

<div class="tab-pane fade" id="sp_thesis_container">

		<div class="panel-heading">
			    <h3 class="panel-title"><b>Add SP/Thesis Here</b></h3>
		</div>

		<div id="sp_thesis_container_admin">
		<form enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div class="form-group">
				        <label class="col-xs-2 control-label">Title</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>

				<div class="form-group">
				        <label class="col-xs-2 control-label">Author</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>
		   <div class="form-group">
				        <label class="col-xs-2 control-label">Adviser</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>
				<div class="form-group">
				        <label class="col-xs-2 control-label">Year</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			<div class="form-group">
			<label class="col-xs-2 control-label">Quantity</label>
					    <div class="col-xs-10">
				        <input type="number"class="form-control">
			    </div></div> 

			<div class="form-group">
			<label class="col-xs-2 control-label">Type</label> <div class="col-xs-10"> <select class="form-control" name="month">
				<option value="SP">SP</option>
				<option value="Thesis">Thesis</option>
			</select></div></div><br/>
		   <br/>
		     
			<br/><br/>
			<div class="form-group">
				<label for="file" class="col-xs-2 control-label">Upload photo:</label><br/><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div>
			
			<input class="btn btn-primary" type="submit" name="add_mag" value="Add SP/Thesis"/>
		</form>
</div>
</div>

<div class="tab-pane fade" id="others_container">
		<div class="panel-heading">
			    <h3 class="panel-title"><b>Add Other Material Here</b></h3>
		</div>

		<div id="others_container_admin">
		<form enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div class="form-group">
				        <label class="col-xs-2 control-label">Title</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>

				<div class="form-group">
				        <label class="col-xs-2 control-label">Author</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>
		   <div class="form-group">
				        <label class="col-xs-2 control-label">Year</label>
					    <div class="col-xs-10">
				        <input type="text"class="form-control">
			    </div></div>
			
		   <br/>
			<div class="form-group">
			<label class="col-xs-2 control-label">Quantity</label>
					    <div class="col-xs-10">
				        <input type="number"class="form-control">
			    </div></div> 

			
			<div class="form-group">
			<label class="col-xs-2 control-label">Type</label> <div class="col-xs-10"> <select class="form-control" name="month">
				<option value="Betamax">Betamax</option>
				<option value="VHS">VHS</option>
				<option value="VCD">VCD</option>
				<option value="DVD">DVD</option>
			</select></div></div><br/>
		   <br/>
			<br/><br/>
			<div class="form-group">
				<label for="file" class="col-xs-2 control-label">Upload photo:</label><br/><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div>
			
			<input class="btn btn-primary" type="submit" name="add_mag" value="Add"/>
		</form>
</div>
</div>
</div>
