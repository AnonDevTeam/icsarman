var materialid=0;
$("#scsalert").hide();

function suggest_material(){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();

	if(input.length > 0){
		$.ajax({
			type: "POST",
			url: window.base_url+"/index.php/usersearch/c_suggest_material/",
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
	//console.log(window.base_url+"index.php/usersearch/c_search_material/");
	$.ajax({
		type: "POST",
		url: window.base_url+"index.php/usersearch/c_search_material/",
		data: "input="+input+"&type="+type+"&page=1&firstnum=1&lastnum=5&object_clicked=first",
		success: function(result){
			$("#search_results").html(result);
		}
	});
}

function getQueue(id){
	$.ajax({
		type: "POST",
		url: window.base_url+"/index.php/usersearch/hasQueue",
		data: "groupid="+id,
		success: function(result){
			var str = result.split(";;");
			$("#queuemsg").html();
			$("#queuemsg").html(str[0]);
			materialid = str[1];
		}
	});
	$("#confirmmodal").modal("show");
}

function enqueue(id,userid){
	var input = $("#search_input").val();
	var type = $("[name='suggest_type']").val();
	$.ajax({
		type: "POST",
		url: window.base_url+"/index.php/usersearch/enqueue/",
		data: "groupid="+id+"&materialid="+materialid+"&userid="+userid+"&input="+input+"&type="+type+"&page=1&firstnum=1&lastnum=5&object_clicked=first",
		success: function(result){
			var str = result.split(";;");
			$("#scsmsg").html("You are now enqueued for reservation for "+str[0]+"You will be contacted via e-mail or text when the material is available for you.");
			$("#search_results").html("");
			$("#search_results").html(str[1]);
			$("#scsalert").show();
		}
	});
}