$(document).ready(function(){
	$("#submit_query").click(function(){
		var query = $("#search_query").val();

		$.ajax({
			type: "POST",
			url: "http://localhost/icsarman/index.php/c_icsarman/search_input",
			data: "search_query="+query,
			success: function(result){
				$("#search_result_pane").html(result);
			}
		});

	});

	$("button[name='borrow']").click(function(){
		var material_id = $(this).val();
		var id = 00000; //temporary; USE SESSION INSTEAD
		$.ajax({
			type: "POST",
			url: "http://localhost/icsarman/index.php/c_icsarman/borrow",
			data: "id="+id+"&material_id="+material_id,
			success: function(result){
				$("#search_popup").html(result);
			}
		});
	});
});