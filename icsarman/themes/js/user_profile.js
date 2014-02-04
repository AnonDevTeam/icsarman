function password_check() {
	str1=$("#newpassword").val();
	str2=$("#rnewpassword").val();
	if(str1!=str2){
		$("#pwhelper").html("New password does not match");
		$("#changepassword").prop('disabled',true);
	}
	else{
		$("#pwhelper").html("");
		$("#changepassword").prop('disabled',false);
	}
}

function email_check() {
	str1=$("#newemail").val();
	str2=$("#rnewemail").val();
	if(str1!=str2){
		$("#emailhelper").html("New password does not match");
		$("#changeemail").prop('disabled',true);
	}
	else{
		$("#emailhelper").html("");
		$("#changeemail").prop('disabled',false);
	}
}

function change_password() {
	$.ajax({
		type: "POST",
		url: "http://localhost/icsarman/index.php/c_icsarman/c_edit_password/",
		data: "userid="+$("#changepassword").val()+"&npw="+$("#newpassword").val()+"&opw="+$("#oldpassword").val(),
		success: function(msg){
			$("#overallhelper").html(msg);
		}
	});
}

function change_email() {
	$.ajax({
		type: "POST",
		url: "http://localhost/icsarman/index.php/c_icsarman/c_edit_email/",
		data: "userid="+$("#changeemail").val()+"&newemail="+$("#newemail").val(),
		success: function(msg){
			var str = msg.split(";");
			$("#overallhelper").html(str[0]);
			$("#email").html(str[1]);
		}
	});
}

function change_add() {
	$.ajax({
		type: "POST",
		url: "http://localhost/icsarman/index.php/c_icsarman/c_edit_address/",
		data: "userid="+$("#changeaddr").val()+"&newaddr="+$("#newaddr").val(),
		success: function(msg){
			var str = msg.split(";");
			$("#overallhelper").html(str[0]);
			$("#addr").html(str[1]);
		}
	});
}