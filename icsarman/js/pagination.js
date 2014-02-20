$(document).ready(function(){
	var page = parseInt($("#currpage").html());
	var maxpage = parseInt($("[name='maxpage']").val());
	var maxindex = 5;

	$(".first").click(function(){
		var input = $("#search_input").val();
		var type = $("[name='suggest_type']").val();
		var i=0;

		$("#suggest_material").html("");

		$.ajax({
			type: "POST",
			url: window.base_url+"/index.php/c_icsarman/c_search_material/",
			data: "input="+input+"&type="+type+"&page=1"+"&object_clicked=first",
			success: function(result){
				$("#search_result").html(result).fadeIn();
				
			}
		});
	});
	$(".last").click(function(){
		var input = $("#search_input").val();
		var type = $("[name='suggest_type']").val();
		var i=0;

		$("#suggest_material").html("");

		$.ajax({
			type: "POST",
			url: window.base_url+"/index.php/c_icsarman/c_search_material/",
			data: "input="+input+"&type="+type+"&page="+maxpage+"&object_clicked=last",
			success: function(result){
				$("#search_result").html(result).fadeIn();
				
			}
		});
	});
	$(".previous").click(function(){
		if(page>1){
			page=page-1;
			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();
			
			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"/index.php/c_icsarman/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=previous",
				success: function(result){
					$("#search_result").html(result).fadeIn();
					
				}
			});
		}
	});
	$(".next").click(function(){
		if(page<maxpage){
			page=page+1;
			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();

			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"/index.php/c_icsarman/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=next",
				success: function(result){
					$("#search_result").html(result).fadeIn();
					
				}
			});
		}
	});

	$(".pagenum").click(function(){
			page=parseInt($(this).html());
			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();
			
			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"/index.php/c_icsarman/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=pagenum",
				success: function(result){
					$("#search_result").html(result).fadeIn();
					
				}
			});
	});

	$(".prev_ellipse").click(function(){
		if (page > 1){
			// var num = parseInt(((page -1)/maxindex)-1);
			// page = num * maxindex + 1;
			var num = $(".firstnum").text().trim();
			page = num - 1;

			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();
			
			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"/index.php/c_icsarman/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=prev_ellipse",
				success: function(result){
					$("#search_result").html(result).fadeIn();
					
				}
			});			
		}
	});

	$(".next_ellipse").click(function(){
		if(page < maxpage){
			// var num = parseInt(((page -1)/maxindex)+1); 
			// page = num * maxindex + 1; 
			var num = parseInt($(".lastnum").text().trim());
			page = num + 1;

			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();			
			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"/index.php/c_icsarman/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=next_ellipse",
				success: function(result){
					$("#search_result").html(result).fadeIn();
					
				}
			});	
		}
	});
	
});