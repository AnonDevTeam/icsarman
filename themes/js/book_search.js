function text(num){
		var id = "#res"+num;
		var text = $(id).text();
		document.getElementById("search_input").value= text;
		var type =document.getElementById("type").value;
		$("search").trigger('click');

		if(document.URL== "http://localhost/cmsc128_btt/")
			location.href = 'index.php/searchController/searchMaterial?search_input='+text+'&type='+type;
		else
			location.href = 'searchMaterial?search_input='+text+'&type='+type;
	}
	
function reserve(num){
	var id = "#result_view"+num;
	$( "#for_reserve" ).show();
	
	$("#check_reserve").click(function(){
		var stdnum = $("#user_stdnum").val();
		var name = $("#user_name").val();
		
		$.ajax({
			type: "POST",
			url: "http://localhost/cmsc128_btt/index.php/searchController/checkStudent",
			data: "name="+name+"&stdnum="+stdnum+"&id="+num,
			success: function(result){
				$("#for_reserve").html(result);
				$("#for_reserve").delay(3000).fadeOut(); 
			}
		});
	});
	
	$("#cancel").click(function(){
			$( "#for_reserve" ).hide();
	});
	
}	
function suggest(){
	var query = $("#search_input").val();
	//kukunin mo yung value nung type
	//tapos yung sa filter
	if(query.length > 0){
		$.ajax({
			type: "POST",
			url: "http://localhost/cmsc128_btt/index.php/searchController/search",
			data: "input="+query, //iadd mo yung mga values dito
			//input=latentt&type=book&filter=title
			success: function(result){
				$("#search_result").html(result);
			}
		});
	}
	else $("#search_result").html("");
}