<div class="tab-content">
<div class="tab-pane fade in active" id="material_container">
	<h3>Return Material</h3>

	<div id="material_container_admin">
	<form  id = "search_form_return" method="post">
        <h5>Search Material by: </h5>
        <select name = "choice" id="reftype_return">
        	<option value="id">ID</option>
			<option value="title">Title</option>
			<option value="author">Author</option>
		</select>
        <input type = "text" id="input_return" name="search_input" placeholder="Type Here"/>
        <input type = "submit" name = "search" class="btn btn-success" value="Search"/>
        <input type = "hidden" name = "clicked" value = "tab2">
    </form>
	<table style="text-align:center;"class="table table-bordered">

		<thead><tr>
			<td><center>Material ID</center></td>
			<td><center>Title</center></td>
			<td><center>Author</center></td>
			<td><center>Year</center></td>
			<td><center>Quantity</center></td>
			<td><center>Status</center></td>
			<td></td>
					
			</tr></thead>
		<tbody id="material_table">
		

		
		</tbody>
	</table>
</div>
</div>
</div>
