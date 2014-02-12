
<script type="text/javascript" src="<?php echo base_url();?>application/js/jquery-1.9.1.js"></script>
		<script>
			$(document).ready(function(){
				
				$("#ok-btn").bind('click', function(){
					$("#user-info").html("");
				});
			});

	</script>
<div id="reserveDiv" style="background: red;">
<form>
Username: <input type="text" name="user"/>
Student no: <input type="text" name="stud"/>
<input type="button" id="ok-btn" value="Ok"/>
</form>
</div>