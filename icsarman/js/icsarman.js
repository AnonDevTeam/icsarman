$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: 'http://localhost/icsarman/index.php/c_icsarman/getBaseURL',
		success: function(url){
			window.base_url = url;
		}
	});
});