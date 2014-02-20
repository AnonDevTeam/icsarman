function suggest_material(){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();

	if(input.length > 0){
		$.ajax({
			type: "POST",
			url: window.base_url+"/index.php/c_icsarman/c_suggest_material/",
			data: "input="+input+"&type="+type,
			success: function(result){
				$("#suggest_material").html(result);
			}
		});
	}
	else $("#suggest_material").html("");

	var cleartimeout = setTimeout(function(){
		$("#suggest_material").html("");
	},3000);
	
	$("#suggest_material").hover(function(){
		clearTimeout(cleartimeout);
	}).mouseleave(function(){
		var cleartimeout = setTimeout(function(){
			$("#suggest_material").html("");
		},5000);
	});
}

function autocomplete(num){
	var id = "#suggest"+num;
	var input = $(id).text();
	$("#search_input").val(input);
	var button = $("#search_go");
	button.trigger('click');
}

function search(){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();
	$("#suggest_material").html("");

	$.ajax({
		type: "POST",
		url: window.base_url+"/index.php/c_icsarman/c_search_material/",
		data: "input="+input+"&type="+type+"&page=1"+"&object_clicked=first",
		success: function(result){
			$("#search_result").html(result);
		}
	});
}

function reserve_popup(title,material_id){
	$("#reserve_material_title").text(title);
	$("#reserve_button").val(material_id);
	$("#overlap").fadeIn();
	$("#reserve_popup").fadeIn();
}

function reserve_blur(){
	if($("#reserve_date").val() != "") $("#reserve_button").removeAttr('disabled');
}

function borrow_popup(title,material_id){
	$("#borrow_material_title").text(title);
	$("#borrow_button").val(material_id);
	$("#overlap").fadeIn();
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

		year = due_date.getFullYear();
		month = due_date.getMonth()+1;
		day = due_date.getDate();
		var due_string = year+'-'+(month<10? '0' : '')+month+'-'+(day<10? '0' : '')+day

		$("#borrow_due_date").val(due_string);
		$("#due_date").text(due_date.toDateString());
		$("#borrow_due").fadeIn();
		$("#borrow_button").removeAttr('disabled');
	}
}

function borrow(){
	var material_id = $("#borrow_button").val();
	var date = $("#borrow_date").val();
	var due = $("#borrow_due_date").val();
	var input = $("#search_input").val();
	var name = $("#borrow_material_title").text();
	var type = $("[name='suggest_type']").val();
	$("#borrow_popup").fadeOut();
	
	$.ajax({
		type: "POST",
		url: window.base_url+"/index.php/c_icsarman/c_borrow",
		data: "material_id="+material_id+"&date="+date+"&due="+due+"&input="+input+"&type="+type+"&name="+name,
		success: function(result){
			var returns = result.split(";;");
			if(returns[0]){
				$("#status_type").text("Borrow");
				$("#status_type2").text("You have successfully requested to borrow");
				$("#status_material").text(returns[1]);
				var date = new Date(returns[2]);
				var due = new Date(returns[3]);
				$("#status_date").text(date.toDateString());
				$("#status_additional").text("Please be mindful of the due date: "+due.toDateString());
				$("#status_popup").fadeIn();
				$("#search_result").html(returns[4]);
				setTimeout(function(){
					$("#status_popup").fadeOut(500);
					$("#overlap").fadeOut(500);
				}, 3000);
			}
		}
	});
}

function reserve(){
	var material_id = $("#reserve_button").val();
	var date = $("#reserve_date").val();
	var input = $("#search_input").val();
	var name = $("#reserve_material_title").text();
	var type = $("[name='suggest_type']").val();
	$("#reserve_popup").fadeOut();
	
	$.ajax({
		type: "POST",
		url: window.base_url+"/index.php/c_icsarman/c_reserve",
		data: "material_id="+material_id+"&date="+date+"&input="+input+"&type="+type+"&name="+name,
		success: function(result){
			var returns = result.split(";;");
			if(returns[0]){
				$("#status_type").text("Reserve");
				$("#status_type2").text("You have successfully reserved");
				$("#status_material").text(returns[1]);
				var date = new Date(returns[2]);
				$("#status_date").text(date.toDateString());
				$("#status_popup").fadeIn();
				$("#search_result").html(returns[3]);
				setTimeout(function(){
					$("#status_popup").fadeOut(500);
					$("#overlap").fadeOut(500);
				}, 3000);
			}
		}
	});
}

$("#overlap").click(function(){
	$("#borrow_popup").fadeOut();
	$("#reserve_popup").fadeOut();
	$("#status_popup").fadeOut();
	$(this).fadeOut();
});