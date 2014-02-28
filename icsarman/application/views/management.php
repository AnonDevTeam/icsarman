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
			<h4>Transactions</h4>
			<?php

			if(!empty($_SESSION['success2'])){
			echo '<ul class="nav nav-pills nav-stacked col-md-2">'.
			  '<li ><a href="#tab1" data-toggle="pill">Add Material</a></li>'.
			  '<li class="active"><a href="#tab2" data-toggle="pill">Edit Material</a></li>'.
			  '<li><a href="#tab3" data-toggle="pill">Reports</a></li>'.
			  '<li><a href="#tab4" data-toggle="pill">Media Management</a></li>'.
			  '<li><a href="#tab5" data-toggle="pill">Suggestions</a></li>'.
			  '<li><a href="#tab6" data-toggle="pill">Account Request</a></li>'.
			'</ul>';
			}
			else{
			echo	'<ul class="nav nav-pills nav-stacked col-md-2">'.
			  '<li class="active"><a href="#tab1" data-toggle="pill">Add Material</a></li>'.
			  '<li ><a href="#tab2" data-toggle="pill">Edit Material</a></li>'.
			  '<li><a href="#tab3" data-toggle="pill">Reports</a></li>'.
			  '<li><a href="#tab4" data-toggle="pill">Media Management</a></li>'.
			  '<li><a href="#tab5" data-toggle="pill">Suggestions</a></li>'.
			  '<li><a href="#tab6" data-toggle="pill">Account Request</a></li>'.
			'</ul>';
			}
			?>
			<div class="tab-content col-md-10">
		        
				<?php
			        if(!empty($_SESSION['success2_show'])){
			        echo '<div class="tab-pane" id="tab1">';
			        }
			        else{

			        	echo '<div class="tab-pane active" id="tab1">';
			        }
			     ?>

			        <div class="panel panel-default">
				              <div class="panel-heading">
			        <?php include_once "addbook_view.php"; ?>
			    </div></div></div>
			    <?php
			        if(!empty($_SESSION['success2_show'])){
			        echo '<div class="tab-pane active" id="tab2">';
			        }
			        else{

			        	echo '<div class="tab-pane" id="tab2">';
			        }
			     ?>
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
			              	<?php include_once "media_management_view.php"; ?>
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
					
		</div>
		<hr>
	    <!-- end of user account -->
	    
	    <?php include_once "footer.html"; ?>
		
		<script>

// 	utils = {

// 	serializer : function(parentElement){

// 		inputs = $(parentElement).find("input,textarea");
// 		//inputs.pop();

// 		object = {};

// 		$.each(inputs,function(){

// 			if($(this).attr("type")!="submit"){
// 				key = $(this).attr("name");
// 				value = $(this).val();
// 				object[key] = value;
// 			}

// 		});

// 		return object;

// 	}

// }

			$("#search_form").submit(function(){

				search_input = $("#input").val();
				choice = $("#reftype").val();

				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized",
					success : function(data){
						console.log(data);
						$("#book_table").slideUp();
						$("#book_table").empty();
						$("#book_table").append(data);
						$("#book_table").slideDown();
					}

				});


				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_modals",
					success : function(data){
						console.log(data);
						$("#modal_container").slideUp();
						$("#modal_container").empty();
						$("#modal_container").append(data);
						$("#modal_container").slideDown();
					}

				});

				return false;
			});


			//edit magazines
			$("#search_form_mag").submit(function(){

				search_input = $("#input_mag").val();
				choice = $("#reftype_mag").val();

				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_mag",
					success : function(data){
						console.log(data);
						$("#magazines_table").slideUp();
						$("#magazines_table").empty();
						$("#magazines_table").append(data);
						$("#magazines_table").slideDown();
					}

				});


				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_modals_mag",
					success : function(data){
						console.log(data);
						$("#modal_container_mag").slideUp();
						$("#modal_container_mag").empty();
						$("#modal_container_mag").append(data);
						$("#modal_container_mag").slideDown();
					}

				});

				return false;
			});


			//edit sp_thesis
			$("#search_form_st").submit(function(){

				search_input = $("#input_st").val();
				choice = $("#reftype_st").val();

				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_st",
					success : function(data){
						console.log(data);
						$("#st_table").slideUp();
						$("#st_table").empty();
						$("#st_table").append(data);
						$("#st_table").slideDown();
					}

				});


				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_modals_st",
					success : function(data){
						console.log(data);
						$("#modal_container_st").slideUp();
						$("#modal_container_st").empty();
						$("#modal_container_st").append(data);
						$("#modal_container_st").slideDown();
					}

				});

				return false;
			});

			//edit others
			$("#search_form_others").submit(function(){

				search_input = $("#input_others").val();
				choice = $("#reftype_others").val();

				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_others",
					success : function(data){
						console.log(data);
						$("#others_table").slideUp();
						$("#others_table").empty();
						$("#others_table").append(data);
						$("#others_table").slideDown();
					}

				});


				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_modals_others",
					success : function(data){
						console.log(data);
						$("#modal_container_others").slideUp();
						$("#modal_container_others").empty();
						$("#modal_container_others").append(data);
						$("#modal_container_others").slideDown();
					}

				});

				return false;
			});

			$("#search_form_return").submit(function(){

				search_input = $("#input_return").val();
				choice = $("#reftype_return").val();

				$.ajax({

					type : "POST",
					data : "search_input="+search_input+"&choice="+choice,
					url : "http://localhost/ICSArman/index.php/edit_material/itemized_materials",
					success : function(data){
						console.log(data);
						$("#material_table").slideUp();
						$("#material_table").empty();
						$("#material_table").append(data);
						$("#material_table").slideDown();
					}

				});

				return false;
			});


			/*$("#modal_container").on("submit",".modal_form",function(){
		     x = utils.serializer($(event.currentTarget));

		     console.log(x);

		     $.ajax({

					type : "POST",
					data : { json : JSON.stringify(x) },
					url : "http://	",
					success : function(data){
						console.log(data);
						$("#modal_container").slideUp();
						$("#modal_container").empty();
						$("#modal_container").append(data);
						$("#modal_container").slideDown();
					}

				});
		return false;
	});*/

		</script>


	</body>
	

</html>