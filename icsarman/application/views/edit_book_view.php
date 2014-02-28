<?php
if(!empty($_SESSION['e_book'])){
  echo '<ul class="nav nav-tabs">'.
  '<li class="active"><a href="#book_container" data-toggle="tab">Book</a></li>'.
  '<li><a href="#magazine_container" data-toggle="tab">Magazine</a></li>'.
  '<li><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>'.
  '<li><a href="#other_container" data-toggle="tab">Others</a></li>'.
  '</ul>';
  unset($_SESSION['e_book']);
}
else if(!empty($_SESSION['e_mag'])){
  echo '<ul class="nav nav-tabs">'.
  '<li ><a href="#book_container" data-toggle="tab">Book</a></li>'.
  '<li class="active"><a href="#magazine_container" data-toggle="tab">Magazine</a></li>'.
  '<li><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>'.
  '<li><a href="#other_container" data-toggle="tab">Others</a></li>'.
  '</ul>';
  unset($_SESSION['e_mag']);
}
else if(!empty($_SESSION['e_spthesis'])){
  echo '<ul class="nav nav-tabs">'.
  '<li ><a href="#book_container" data-toggle="tab">Book</a></li>'.
  '<li><a href="#magazine_container" data-toggle="tab">Magazine</a></li>'.
  '<li class="active"><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>'.
  '<li><a href="#other_container" data-toggle="tab">Others</a></li>'.
  '</ul>';
  unset($_SESSION['e_spthesis']);
}
else if(!empty($_SESSION['e_others'])){
  echo '<ul class="nav nav-tabs">'.
  '<li ><a href="#book_container" data-toggle="tab">Book</a></li>'.
  '<li><a href="#magazine_container" data-toggle="tab">Magazine</a></li>'.
  '<li><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>'.
  '<li class="active"><a href="#other_container" data-toggle="tab">Others</a></li>'.
  '</ul>';
unset($_SESSION['e_others']);
}
else{
  echo '<ul class="nav nav-tabs">'.
  '<li class="active"><a href="#book_container" data-toggle="tab">Book</a></li>'.
  '<li><a href="#magazine_container" data-toggle="tab">Magazine</a></li>'.
  '<li><a href="#sps_thesis_container" data-toggle="tab">SP/Thesis</a></li>'.
  '<li><a href="#other_container" data-toggle="tab">Others</a></li>'.
  '</ul>';
}
?>
<div class="tab-content">

<?php 
	if(empty($_SESSION['start'])){
	echo '<div class="tab-pane fade in active" id="book_container">';
	}
	else{
	if(!empty($_SESSION['e_books'])){
	echo '<div class="tab-pane fade in active" id="book_container">';
	unset($_SESSION['e_books']);
	}
	else{
	echo '<div class="tab-pane fade" id="book_container">';	
	}
	}
?>

<?php
	
			if(!empty($_SESSION['success_1'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_1'].'</div>'; unset($_SESSION['success_1']);
				echo "<script language=\"javascript\">setTimeout(function() {
				    $('.alert').fadeOut(1500);
				}, 1000);</script>";
			}
?>

	<h3>Edit Books</h3>

	<div id="book_container_admin">
	<form  id = "search_form" method="post">
        <h5>Search Book by: </h5>
        <select name = "choice" id="reftype" style="width:15%;">
        	<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="year">Year Published</option>
			<option value="all">View All</option>
		</select>
		
        <input type = "text" id="input" name="search_input" style="width: 30%;" placeholder="Type Here"/>
        
        <input type = "submit" id="sub" name = "search" class="btn btn-success" value="Search"/>
        <input type = "hidden" name = "clicked" value = "tab2">
    </form>
	<table style="text-align:center;"class="table table-bordered">

		<thead><tr>
			<td><center>Material ID</center></td>
			<td><center>Title</center></td>
			<td><center>Author</center></td>
			<td><center>Year</center></td>

			<td><center>Course Code</center></td>
			<td><center>Publisher</center></td>
			<td></td>
			<td></td>
					
			</tr></thead>
			
		<tbody id="book_table">
		

		
		</tbody>
	</table>
</div>
</div>

<?php 
 if(!empty($_SESSION['e_mags'])){
 echo '<div class="tab-pane fade in active" id="magazine_container">';
 unset($_SESSION['e_mags']);
 }
 else{
 echo '<div class="tab-pane fade" id="magazine_container">';	
 }
?>
<?php
	
			if(!empty($_SESSION['success_2'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_2'].'</div>'; unset($_SESSION['success_2']);
				echo "<script language=\"javascript\">setTimeout(function() {
				    $('.alert').fadeOut(1500);
				}, 1000);</script>";
			}
?>

	<h3>Edit Magazines</h3>

	<div id="magazines_container_admin">
	<form  id = "search_form_mag" method="post">
        <h5>Search Magazines by: </h5>
        <select name = "choice" id="reftype_mag" style="width:15%;">
        	<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="year">Year Published</option>
			<option value="all">View All</option>
		</select>
        <input type = "text" id="input_mag" name="input_mag" style="width: 30%;" placeholder="Type Here"/>
        <input type = "submit" id="sub" name = "search" class="btn btn-success" value="Search"/>
        <input type = "hidden" name = "clicked" value = "tab2">
    </form>
	

	<table class="table table-bordered"style="text-align: center;">
		<thead><tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Volume No.</td>
			<td>Month</td>
			<td></td>
			<td></td>
		</tr><thead>

		<tbody id="magazines_table">
		

		
		</tbody>
		
	</table>
</div></div>
<?php 
if(!empty($_SESSION['e_spthesiss'])){
echo '<div class="tab-pane fade in active" id="sps_thesis_container">';
unset($_SESSION['e_spthesiss']);
}
else{
echo '<div class="tab-pane fade" id="sps_thesis_container">';	
}
?>
<?php
	
			if(!empty($_SESSION['success_3'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_3'].'</div>'; unset($_SESSION['success_3']);
				echo "<script language=\"javascript\">setTimeout(function() {
				    $('.alert').fadeOut(1500);
				}, 1000);</script>";
			}
?>

	<h3>Edit SP/Thesis</h3>

	<div id="sp_thesis_container_admin">
	
	<form  id = "search_form_st" method="post">
        <h5>Search SP/Thesis by: </h5>
        <select name = "choice" id="reftype_st" style="width:15%;">
        	<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="year">Year Published</option>
			<option value="all">View All</option>
		</select>
        <input type = "text" id="input_st" name="input_st" style="width: 30%;" placeholder="Type Here"/>
        
        <input type = "submit" id="sub" name = "search" class="btn btn-success" value="Search"/>
        <input type = "hidden" name = "clicked" value = "tab2">
    </form>
	

	<table style="text-align:center;"class="table table-bordered">
		<thead><tr>
			<td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Adviser</td>
			<td>Type</td>
			<td></td>
			<td></td>
		</tr></thead>

		<tbody id="st_table">
		

		
		</tbody>
		
	</table>
</div></div>

<?php 
if(!empty($_SESSION['e_otherss'])){
echo '<div class="tab-pane fade in active" id="other_container">';
unset($_SESSION['e_otherss']);
}
else{
echo '<div class="tab-pane fade" id="other_container">';	
}
?>
<?php
	
			if(!empty($_SESSION['success_4'])){
				echo '<br/><div class="alert alert-success" id="alert">'.$_SESSION['success_4'].'</div>'; unset($_SESSION['success_4']);
				echo "<script language=\"javascript\">setTimeout(function() {
				    $('.alert').fadeOut(1500);
				}, 1000);</script>";
			}
?>

	<h3>Edit Others</h3>

	<div id="others_container_admin">

	<form  id = "search_form_others" method="post">
        <h5>Search Others by: </h5>
        <select name = "choice" id="reftype_others" style="width:15%;">
        	<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="year">Year Published</option>
			<option value="all">View All</option>
		</select>
        <input type = "text" id="input_others" name="input_others" style="width: 30%;" placeholder="Type Here"/>
        
        <input type = "submit" id="sub" name = "search" class="btn btn-success" value="Search"/>
        <input type = "hidden" name = "clicked" value = "tab2">
    </form>
	

	<table style="text-align:center;"class="table table-bordered">
		<tr>
			<thead><td>Material ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Type</td>
			<td></td>
			<td></td>
		</tr></thead>

		<tbody id = "others_table">

		</tbody>
		
	</table>
</div></div>
</div>

<div id= "modal_container"></div>
<div id= "modal_container_mag"></div>
<div id= "modal_container_st"></div>
<div id= "modal_container_others"></div>
<div id= "delete_book_container"></div>