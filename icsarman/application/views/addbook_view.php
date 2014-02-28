
<?php
if(!empty($_SESSION['mag'])){

echo '<ul class="nav nav-tabs">'.'<li><a href="#books_container" data-toggle="tab">Book</a></li>'.'<li  class="active"><a href="#magazines_container" data-toggle="tab">Magazine</a></li>'
  .'<li><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>'
 .'<li><a href="#others_container" data-toggle="tab">Others</a></li>'
.'</ul>';
unset($_SESSION['mag']);
}
else if(!empty($_SESSION['spthesis'])){

echo '<ul class="nav nav-tabs">'.'<li><a href="#books_container" data-toggle="tab">Book</a></li>'.'<li><a href="#magazines_container" data-toggle="tab">Magazine</a></li>'
  .'<li class="active"><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>'
 .'<li><a href="#others_container" data-toggle="tab">Others</a></li>'
.'</ul>';
unset($_SESSION['spthesis']);
}
else if(!empty($_SESSION['others'])){

echo '<ul class="nav nav-tabs">'.'<li><a href="#books_container" data-toggle="tab">Book</a></li>'.'<li  ><a href="#magazines_container" data-toggle="tab">Magazine</a></li>'
  .'<li><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>'
 .'<li class="active"><a href="#others_container" data-toggle="tab">Others</a></li>'
.'</ul>';
unset($_SESSION['others']);
}
else if(!empty($_SESSION['bookss'])){
echo '<ul class="nav nav-tabs">'.'<li class="active"><a href="#books_container" data-toggle="tab">Book</a></li>'.'<li  ><a href="#magazines_container" data-toggle="tab">Magazine</a></li>'
  .'<li><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>'
 .'<li><a href="#others_container" data-toggle="tab">Others</a></li>'
.'</ul>';
unset($_SESSION['bookss']);
}
else{
echo '<ul class="nav nav-tabs">'.'<li class="active"><a href="#books_container" data-toggle="tab">Book</a></li>'.'<li  ><a href="#magazines_container" data-toggle="tab">Magazine</a></li>'
  .'<li><a href="#sp_thesis_container" data-toggle="tab">SP/Thesis</a></li>'
 .'<li><a href="#others_container" data-toggle="tab">Others</a></li>'
.'</ul>';

}

?>


<div class="tab-content">
<?php
if(empty($_SESSION['bookslala'])){
echo '<div class="tab-pane fade in active" id="books_container">';
	}
else{
if(!empty($_SESSION['booksss'])){
echo '<div class="tab-pane fade in active" id="books_container">';
unset($_SESSION['booksss']);
	}
else{

	echo '<div class="tab-pane fade" id="books_container">';
}
}
?>

	<?php
	
			if(!empty($_SESSION['success'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success'].'</div>'; unset($_SESSION['success']);
				echo "<script language=\"javascript\">setTimeout(function() {
    $('.alert').fadeOut(1500);
}, 1000);</script>";
			}
	?>
	<form class="form-inline" >
	<div class="form-group" style="margin-left: 40px;margin-top:-10px;">
	<div class="col-sm-15">
			    
			    <h3>Add Book Here</h3>
	</div>
	</div>
	</form>
	
		<div id="book_container_admin">
		<form class="form-inline" enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			
			

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Title:</label>
				        <input type="text"class="form-control" name="title" style="margin-left:75px;width:50%;" required>
			    </div>
			
		   		<br/>

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Author:</label>
					    
				        <input type="text"class="form-control" name="author" style="margin-left:60px;width:50%;" required>
			    </div>
			
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Year:</label>
					    
				        <input type="number"class="form-control" name="year" style="margin-left:77px;width:20%;" value="1900" min="1600" max="2014" required>
			    </div>
		   
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Publisher:</label>
					    
				        <input type="text"class="form-control" name="publisher" style="margin-left:40px;width:50%;" required>
			    </div>
			   
			<br/>

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Quantity:</label>
					    
				        <input type="number"class="form-control" name="quantity" style="margin-left:50px; width:20%;" value="1" min="1" required>
			    </div>
		
			<br/>		   
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Course Code:</label>
					    
				        <input type="text"class="form-control" name="course_code" style="margin-left:15px;width:50%;" required>
			    </div>
		
			<br/>
			<div style="margin-left: 100px; margin-top:-10px;">
				<label for="file">Upload photo:</label><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div><br/>
			<div style="margin-left: 100px; margin-top:-10px;">
			<input type="submit" class="btn btn-primary" name="add_book" value="Add" id="sub"/>
			</div>
			</form>
		
	</div>
	</div>

	<?php
if(!empty($_SESSION['mags'])){
echo '<div class="tab-pane fade in active" id="magazines_container">';
unset($_SESSION['mags']);
	}
else{

	echo '<div class="tab-pane fade" id="magazines_container">';
}

?>

	<?php
	
			if(!empty($_SESSION['success_mag'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_mag'].'</div>'; unset($_SESSION['success_mag']);
				echo "<script language=\"javascript\">setTimeout(function() {
    $('.alert').fadeOut(1500);
}, 1000);</script>";
			}
	?>
	<form class="form-inline" >
	<div class="form-group" style="margin-left: 40px;margin-top:-10px;">
	<div class="col-sm-15">
		<h3>Add Magazine Here</h3>
	</div>
	</div>
	</form>

		<div id="magazines_container_admin">
		<form class="form-inline" enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Title:</label>
				        <input type="text"class="form-control" name="title" style="margin-left:75px;width:50%;" required>
			    </div>
			
		   		<br/>

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Author:</label>
					    
				        <input type="text"class="form-control" name="author" style="margin-left:60px;width:50%;" required>
			    </div>
			
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Month:</label>
					    
				        <select class="form-control" name="month" style="margin-left:62px;width:20%;" required>
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
						</select>
			    </div>
		   
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Year:</label>
					    
				        <input type="number"class="form-control" name="year" style="margin-left:77px;width:20%;" value="1900" min="1600" max="2014" required>
			    </div>
			   
			<br/>
			<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Volume:</label>
					    
				        <input type="number"class="form-control" name="volume_no" style="margin-left:57px;width:20%;" min="1" value="1" required>
			    </div>
		
			<br/>		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Quantity:</label>
					    
				        <input type="number"class="form-control" name="quantity" value="1" min="1" style="margin-left:50px; width:20%;" required>
			    </div>
		
			<br/>
			<div style="margin-left: 100px; margin-top:-10px;">
				<label for="file">Upload photo:</label><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div><br/>
			<div style="margin-left: 100px; margin-top:-10px;">
			<input type="submit" class="btn btn-primary" name="add_mag" value="Add" id="sub"/>
			</div>
			</form>
</div>
</div>
<?php
if(!empty($_SESSION['spthesiss'])){
echo '<div class="tab-pane fade in active" id="sp_thesis_container">';
	unset($_SESSION['spthesiss']);
	}
else{

	echo '<div class="tab-pane fade" id="sp_thesis_container">';
}

?>

	<?php
	
			if(!empty($_SESSION['success_spthesis'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_spthesis'].'</div>'; unset($_SESSION['success_spthesis']);
				echo "<script language=\"javascript\">setTimeout(function() {
    $('.alert').fadeOut(1500);
}, 1000);</script>";
			}
	?>
<form class="form-inline" >
<div class="form-group" style="margin-left: 40px;margin-top:-10px;">
<div class="col-sm-15">
		<h3>Add SP/Thesis Here</h3>
</div>
</div>
</form>
		<div id="sp_thesis_container_admin">
		<form class="form-inline" enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Title:</label>
				        <input type="text"class="form-control" name="title" style="margin-left:75px;width:50%;" required>
			    </div>
			
		   		<br/>

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Author:</label>
					    
				        <input type="text"class="form-control" name="author" style="margin-left:60px;width:50%;" required>
			    </div>
			
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Adviser:</label>
					    
				        <input type="text"class="form-control" name="adviser" style="margin-left:55px;width:50%;" required>
			    </div>
		   
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Year:</label>
					    
				        <input type="number"class="form-control" name="year" value="1900"style="margin-left:77px;width:20%;" min="1600" max="2014" required>
			    </div>
			   
			<br/>
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Type:</label>
					    
				        <select class="form-control" name="type" style="margin-left:75px;width:20%;" required>
							<option value="Thesis">Thesis</option>
							<option value="SP">SP</option>
						</select>
			    </div>

						
			<br/>		   
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Quantity:</label>
					    
				        <input type="number"class="form-control" name="quantity" style="margin-left:50px; width:20%;" value="1" min="1" required>
			    </div>

		
			<br/>
			<div style="margin-left: 100px; margin-top:-10px;">
				<label for="file">Upload photo:</label><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div><br/>
			<div style="margin-left: 100px; margin-top:-10px;">
			<input class="btn btn-primary" type="submit" name="add_spthesis" value="Add" id="sub"/>
			</div>
		</form>
</div>
</div>

<?php
if(!empty($_SESSION['otherss'])){
echo '<div class="tab-pane fade in active" id="others_container">';
	unset($_SESSION['otherss']);
	}
else{

	echo '<div class="tab-pane fade" id="others_container">';
}

?>
	<?php
	
			if(!empty($_SESSION['success_other'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_other'].'</div>'; unset($_SESSION['success_other']);
				echo "<script language=\"javascript\">setTimeout(function() {
    $('.alert').fadeOut(1500);
}, 1000);</script>";
			}
	?>
	<form class="form-inline" >
<div class="form-group" style="margin-left: 40px;margin-top:-10px;">
<div class="col-sm-15">
		<h3>Add Other Material Here</h3>
</div>
</div>
</form>
		<div id="others_container_admin">
		<form class="form-inline" enctype="multipart/form-data" action="/ICSArman/index.php/add_material/callAddMaterial" method="post">
			<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Title:</label>
				        <input type="text"class="form-control" name="title" style="margin-left:75px;width:50%;" required>
			    </div>
			
		   		<br/>

				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Author:</label>
					    
				        <input type="text"class="form-control" name="author" style="margin-left:60px;width:50%;" required>
			    </div>
			
		   <br/>
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Year:</label>
					    
				        <input type="number"class="form-control" name="year" style="margin-left:77px;width:20%;" value="1900"min="1600" max="2014" required>
			    </div>
		   
		   <br/>
		   
				
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label >Type:</label>
					    
				        <select class="form-control" name="type" style="margin-left:75px;width:20%;" required>
							<option value="Betamax">Betamax</option>
							<option value="DVD">DVD</option>
							<option value="VCD">VCD</option>
							<option value="VHS">VHS</option>

						</select>
			    </div>

						
			<br/>		   
		   
				<div style="margin-left: 100px; margin-top:-10px;">
				        <label>Quantity:</label>
					    
				        <input type="number"class="form-control" name="quantity" style="margin-left:50px; width:20%;" min="1"value="1"required>
			    </div>

		
			<br/>
			<div style="margin-left: 100px; margin-top:-10px;">
				<label for="file">Upload photo:</label><br/>
				<input type="file" name="file" id="file" size="50"/>
			</div><br/>
			<div style="margin-left: 100px; margin-top:-10px;">
			<input class="btn btn-primary" type="submit" name="add_other" value="Add" id="sub"/>
			</div>
		</form>
</div>
</div>
</div>
