function change_borrow(input) {
	$("#borrowed_materials").html("");
	$.ajax({
		type: 'POST',
		url: window.base_url+'/index.php/c_icsarman/c_search_borrowed/',
		data: "input="+input,
		success: function(result){
			$("#borrowed_materials").html(result);
		}
	});
}

function change_reserve(input) {
	$("#reserved_materials").html("");
	$.ajax({
		type: 'POST',
		url: window.base_url+'/index.php/c_icsarman/c_search_reserved/',
		data: "input="+input,
		success: function(result){
			$("#reserved_materials").html(result);
		}
	});
}

function search_borrowed_reserved() {
	var input = $("#search_input").val();
	change_borrow(input);
	change_reserve(input);
}