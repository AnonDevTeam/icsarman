$(document).ready(function(){
	$(".filter").click(function(){
		var value = $(this).val();
		switch(value){
			case "all":
				$("#filter_title").removeAttr('checked');
				$("#filter_author").removeAttr('checked');
				$("#filter_publisher").removeAttr('checked');
				$("#filter_adviser").removeAttr('checked');
				break;
			case "title":
				$("#filter_all").removeAttr('checked');
				$("#filter_title").attr('checked');
				break;
			case "author":
				$("#filter_all").removeAttr('checked');
				$("#filter_author").attr('checked');
				break;
			case "publisher":
				$("#filter_all").removeAttr('checked');
				$("#filter_publisher").attr('checked');
				break;
			case "adviser":
				$("#filter_all").removeAttr('checked');
				$("#filter_adviser").attr('checked');
				break;
		}

		$("#search_input").trigger('keyup');
	});

	$("[name='suggest_type']").change(function(){
		var value = $(this).val();
		$(".filter").each(function(){
			$(this).removeAttr('disabled');
		});
		switch(value){
			case "Book":
				$("#filter_adviser").attr('disabled','disabled');
				break;
			case "Magazine":
				$("#filter_publisher").attr('disabled','disabled');
				$("#filter_adviser").attr('disabled','disabled');
				break;
			case "SP":
				$("#filter_publisher").attr('disabled','disabled');
				break;
			case "Thesis":
				$("#filter_publisher").attr('disabled','disabled');
				break;
			case "Others":
				$("#filter_publisher").attr('disabled','disabled');
				$("#filter_adviser").attr('disabled','disabled');
				break;
		}

		$("#search_input").trigger('keyup');
	});
});

function suggest_material(){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();
	var filter = [];
	var i=0;
	$(".filter:checked:not([disabled='disabled'])").each(function(){
		filter[i++] = $(this).val();
	});

	if(input.length > 0){
		$.ajax({
			type: "POST",
			url: "http://localhost/icsarman/index.php/c_icsarman/c_suggest_material/",
			data: "input="+input+"&type="+type+"&filter="+filter,
			success: function(result){
				$("#suggest_material").html(result);
			}
		});
	}
	else $("#suggest_material").html("");
}

function autocomplete(num){
	var id = "#suggest"+num;
	var input = $(id).text();
	$("#search_input").val(input);
}

function search(){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();
	var filter = [];
	var i=0;

	$("#suggest_material").html("");

	$(".filter:checked:not([disabled='disabled'])").each(function(){
		filter[i++] = $(this).val();
	});

	$.ajax({
		type: "POST",
		url: "http://localhost/icsarman/index.php/c_icsarman/c_search_material/",
		data: "input="+input+"&type="+type+"&filter="+filter,
		success: function(result){
			$("#search_result").html(result);
		}
	});
}

function reserve_popup(title,material_id){
	//$("#reserve_material_title").text(title);
	//$("#reserve_button").val(material_id);
	console.log("virgin");
	$("#reserve_popup").fadeIn();
}

// $(".res_button").click(function(){console.log("nelo");});


function reserve_blur(){
	if($("#reserve_date").val() != "") $("#reserve_button").fadeIn();
}

function borrow_popup(title,material_id){
	//$("#borrow_material_title").text(title);
	//$("#borrow_button").val(material_id);
	$("#borrow_popup").fadeIn();
}

function borrow_blur(){
	if($("#borrow_date").val() != ""){
		var setdate = $("#borrow_date").val();

		var dateparts = setdate.split("-");
		var date = new Date(parseInt(dateparts[0]), parseInt(dateparts[1])-1, parseInt(dateparts[2])+3);
		var year = date.getFullYear();
		var month = date.getMonth()+1;
		var day = date.getDate();
		var due = year+'-'+(month<10? '0' : '')+month+'-'+(day<10? '0' : '')+day
		var due_date = new Date(due);

		$("#due_date").text(due_date.toDateString());
		$("#borrow_button").fadeIn();
	}
}

// function borrow(){
// 	var query = $("#search_query").val();

// 	$.ajax({
// 		type: "POST",
// 		url: "http://localhost/icsarman/index.php/c_icsarman/search_input",
// 		data: "search_query="+query,
// 		success: function(result){
// 			$("#search_result").html(result);
// 		}
// 	});
// }

// function reserve(){
// 	var material_id = $(this).val();
// 	var id = 00000; //temporary; USE SESSION INSTEAD
// 	$.ajax({
// 		type: "POST",
// 		url: "http://localhost/icsarman/index.php/c_icsarman/borrow",
// 		data: "id="+id+"&material_id="+material_id,
// 		success: function(result){
// 			$("#search_result").html(result);
// 		}
// 	});

// }

//javascript for diasabling
//use jquery
//tingnan mo muna yung value nung type
//$(radio_publisher).attr(disabled,disabled);