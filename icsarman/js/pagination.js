$(document).ready(function(){
	var page = parseInt($("#currpage").html());
	var maxpage = parseInt($("[name='maxpage']").val());
	var firstnum = parseInt($("[name='firstnum']").val());
	var lastnum = parseInt($("[name='lastnum']").val());
	var maxindex = 5;

	// console.log(firstnum);
	// console.log(lastnum);

	$(".first").click(function(){
		var input = $("#search_input").val();
		var type = $("[name='suggest_type']").val();
		var i=0;

		$("#suggest_material").html("");

		$.ajax({
			type: "POST",
			url: window.base_url+"index.php/usersearch/c_search_material/",
			data: "input="+input+"&type="+type+"&page=1"+"&object_clicked=first&firstnum=1&lastnum="+lastnum,
			success: function(result){
				$("#search_results").html(result).fadeIn();
				
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
			url: window.base_url+"index.php/usersearch/c_search_material/",
			data: "input="+input+"&type="+type+"&page="+maxpage+"&object_clicked=last&firstnum="+firstnum+"&lastnum="+maxpage,
			success: function(result){
				$("#search_results").html(result).fadeIn();
				
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
				url: window.base_url+"index.php/usersearch/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=previous&firstnum="+firstnum+"&lastnum="+lastnum,
				success: function(result){
					$("#search_results").html(result).fadeIn();
					
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
				url: window.base_url+"index.php/usersearch/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=next&firstnum="+firstnum+"&lastnum="+lastnum,
				success: function(result){
					$("#search_results").html(result).fadeIn();
					
				}
			});
		}
	});

	$(".pagenum").click(function(){
			page=parseInt($(this).html());
			var input = $("#search_input").val();
			var type = $("[name='suggest_type']").val();
			console.log( window.base_url+"index.php/usersearch/c_search_material/");
			$("#suggest_material").html("");

			$.ajax({
				type: "POST",
				url: window.base_url+"index.php/usersearch/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=pagenum&firstnum="+firstnum+"&lastnum="+lastnum,
				success: function(result){
					$("#search_results").html(result).fadeIn();
					
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
				url: window.base_url+"index.php/usersearch/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=prev_ellipse&firstnum="+firstnum+"&lastnum="+lastnum,
				success: function(result){
					$("#search_results").html(result).fadeIn();
					
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
				url: window.base_url+"index.php/usersearch/c_search_material/",
				data: "input="+input+"&type="+type+"&page="+page+"&object_clicked=next_ellipse&firstnum="+firstnum+"&lastnum="+lastnum,
				success: function(result){
					$("#search_results").html(result).fadeIn();
					
				}
			});	
		}
	});
	
});