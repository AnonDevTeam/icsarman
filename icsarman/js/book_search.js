$(document).ready(function(){		
		$("#ok-btn").bind('click', function(){
		$("#user-info").html("");
	});
});

function text(num){
		var id = "#res"+num;
		var text = $(id).text();
		document.getElementById("search_input").value= text;
		var type =document.getElementById("type").value;
		$("search").trigger('click');
		if(document.URL== "http://localhost/ICSArman/index.php/Index/search")
			location.href = '../searchController/searchMaterial?search_input='+text+'&type='+type;
		else
			location.href = 'searchMaterial?search_input='+text+'&type='+type;
}

function reserve(num){
	var id = "#result_view"+num;

	var book_title = $("#search_in"+num).val();
	var book_type =$( "#type_in"+num).val();

	var input1 = $('<input type="hidden" value="' + book_title +'" id="search_input" name="search_input"/>');
	var input2 = $('<input type="hidden" value="' + book_type +'" id="type" name="type"/>');

	$("#myModal #type").remove();
	$("#myModal #search_input").remove();

	$("#myModal form").append(input1);
	$("#myModal form").append(input2);

	
	$("#check_reserve").click(function(){
		var stdnum = $("#user_stdnum").val();
		var name = $("#user_name").val();
		

		$.ajax({
			type: "POST",
			url: "http://localhost/ICSArman/index.php/searchController/checkStudent",
			data: "name="+name+"&stdnum="+stdnum+"&id="+num,
			success: function(result){
				console.log(result);
				$("#for_reserve").fadeIn();
				$("#for_reserve").html(result);
				$("#for_reserve").delay(3000).fadeOut();
				if(result==1) $(".close").trigger("click");
			}
		});

		return false;
	});
	
}

$('#search_input').keyup(function(){
	var query = $("#search_input").val();
	//kukunin mo yung value nung type
	//tapos yung sa filter
	if(query.length > 0){
		$.ajax({
			type: "POST",
			url: "http://localhost/ICSArman/index.php/searchController/search",
			data: "input="+query, //iadd mo yung mga values dito
			//input=latentt&type=book&filter=title
			success: function(result){
				$("#search_result").html(result);
			}
		});
	}
	else $("#search_result").html("");
})

/*function suggest(){
	
}*/