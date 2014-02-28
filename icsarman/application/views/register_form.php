<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>	
  </head>

  <body>
	
    <br/><br/><br/><br/>
	
    <div class="container middle">
      <div class="pull-right center">
	  	
        <form method="post"  action=<?php echo site_url('register'); ?> name="form1" id="form1">
          <fieldset>
            <legend>SECURITY</legend>					
            <div class="pull-right">
	            <div class="input-group input-group-sm">
	                        <span class="input-group-addon inlabel">Username:</span>
	                        <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" required minlength="2" />						 
							<p class="err"><?=$error_username;?></p>
							<div id="eruser"></div>
				</div>				
				<br/>
	            <div class="input-group input-group-sm">
	                        <span class="input-group-addon inlabel">Password:</span>
	                        <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" required minlength="2"/>
							<div id="erpass"></div>
				</div>
				<br/>
	            <div class="input-group input-group-sm">
	                        <span class="input-group-addon inlabel">Re-enter Password:</span>
	                        <input type="password" id="repassword" name="repassword" value="<?php echo set_value('repassword'); ?>" required/>
							<div id="errepass"></div>
				</div>			
				<br/>
			</div>
          </fieldset>
          <fieldset>
            <legend>USER INFORMATION</legend>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">First Name:</span>
                        <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" required/>
            </div>
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Middle Initial:</span>
                        <input type="text" name="middleinitial" value="<?php echo set_value('middleinitial'); ?>" required/>
            </div>
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Last Name:</span>
                        <input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" required/>
            </div>
			<br/>
			<div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Email:</span>
                        <input type="email" name="email" value="<?php echo set_value('email'); ?>" required/>
						<p class="err"><?=$error_email;?></p>	
            </div>			
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Birthday:</span>
                        <input type="date" name="birthday" max="1999-01-01" value="<?php echo set_value('birthday'); ?>" required/>
            </div>
			<br/>
            <div class="pull-right">
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Type:</span>                        
						<select id="type" name="type" >
							<option value="student" <?php echo set_select('type', 'Student', TRUE); ?>>Student</option>
							<option value="faculty" <?php echo set_select('type', 'Faculty'); ?>>Faculty</option>   
							<option value="admin" <?php echo set_select('type', 'Admin'); ?>>Admin</option>   
						</select>   
            </div>
			<br/>
            <div class="input-group input-group-sm" id="num" >
                        <span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>
                        <input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>						
						<p class="err" id="studnumerr"><?=$error_snumber;?></p>
			</div>		
			<br/>    	
			
			<div class="input-group input-group-sm" >
				<span class="input-group-addon inlabel">School:</span>                           
				<input type="radio" style="width:20px;" name="school" value="UP" <?php echo set_value('school'); ?> checked />UP
				<input type="radio" style="width:20px;" name="school" value="Others" <?php echo set_value('school'); ?> />Others		
			</div>
			
			<br/>
			<div class="input-group input-group-sm" id="referred">
			</div>
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Address:</span>
                        <input type="text" name="address" value="<?php echo set_value('address'); ?>" required/>
            </div>
			<br/>
			
			<div class="input-group input-group-sm">
						<span class="input-group-addon inlabel">Profile Picture</span>
						<input type="file" name="picture" value="<?php echo set_value('picture'); ?>"/>						
			</div>
			
            </div>
          </fieldset><br/>
          <input type="submit" class="btn btn-primary btn-sm" name="register" value="Register" />
        </form>
      </div>
      <div class="aside sideb" >
        <p>The side contents will be here: instructions.</p>
      </div>
    </div>
	
	<?php include_once "links.html"; ?>
    <?php include_once "navbar.php"?>
    <?php include_once "footer.html" ?>  
	
 </body>
</html>

 <script>
		$(function(){
			$(window).load(
				function() {
					$('#referred').empty();
			        if (input[type=radio][name=school].value === 'Others') {
						$('#referred').append('<span class="input-group-addon inlabel" id="reftxt" >Referred By:</span>' +
										 '<input type="text" id="refinput" name="referred_by" value="<?php echo set_value('referred_by'); ?>" required/>'); 					
			            
			        }
					
					var val = $( "#type option:selected" ).val();
					//console.log(val);
				    //var val =  $('option:selected', this).text();
					$('#num').empty();
					if(val === "student"){
						$('#num').append('<span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>' +
										 '<input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>' +						
						                 '<p class="err" id="studnumerr"><?=$error_snumber;?></p>');
					}
					else if((val === "faculty")||(val === "admin")){
						$('#num').append('<span class="input-group-addon inlabel" id="empnumtxt" >Employee Number:</span>' +
										 '<input type="text" id="empnum" name="employeenumber" maxlength="9" value="<?php echo set_value('employeenumber'); ?>" placeholder="000000000" pattern="[0-9]{9}" required/>' +						
										 '<p class="err" id="empnumerr"><?=$error_snumber;?></p>');
					}
					
			});
			
			$('#type').on("change", 
				function(){
					var val = $( "#type option:selected" ).val();
					//console.log(val);
				    //var val =  $('option:selected', this).text();
					$('#num').empty();
					if(val === "student"){
						$('#num').append('<span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>' +
										 '<input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>' +						
							                 '<p class="err" id="studnumerr"><?=$error_snumber;?></p>');
					}
					else if((val === "faculty")||(val === "admin")){
						$('#num').append('<span class="input-group-addon inlabel" id="empnumtxt" >Employee Number:</span>' +
										 '<input type="text" id="empnum" name="employeenumber" maxlength="9" value="<?php echo set_value('employeenumber'); ?>" placeholder="000000000" pattern="[0-9]{9}" required/>' +						
										 '<p class="err" id="empnumerr"><?=$error_snumber;?></p>');
					}				
			});
						
			$('input[type=radio][name=school]').change(
				function() {
					$('#referred').empty();
			        if (this.value === 'Others') {
						$('#referred').append('<span class="input-group-addon inlabel" id="reftxt" >Referred By:</span>' +
										 '<input type="text" id="refinput" name="referred_by" value="<?php echo set_value('referred_by'); ?>" required/>'); 					
			            
			        }
		    });			
			$('#username').blur(
				function(){							
					var username = $('#username').val();
					
					$('#eruser').empty();
					if(username.length < 4 && username.length > 0){				
						$('#eruser').append('<p class="err">*too short</p>');
					}
			});	
			$('#password').blur(
				function(){							
					var password = $('#password').val();
					
					$('#erpass').empty();
					if(password.length < 6 && password.length > 0){				
						$('#erpass').append('<p class="err">*too short</p>');
					}
			});	
			$('#repassword').blur(
				function(){							
					var password = $('#password').val();
					var repassword = $('#repassword').val();
					
					$('#errepass').empty();
					//console.log(password);
					//console.log(repassword);
					if(password !== repassword  ){
						$('#errepass').append('<p class="err">*must match password</p>');
						//$('#repassword').focus();
					}
			});	
			$('#form1').submit(
				function(){							
					var password = $('#password').val();
					var repassword = $('#repassword').val();	
					var username = $('#username').val();

					$('#eruser').empty();
					if(username.length < 4 && username.length > 0){				
						$('#eruser').append('<p class="err">*too short</p>');
						//$('#username').focus();
						return false;
					}
					
					$('#erpass').empty();
					if(password.length < 6 && password.length > 0){				
						$('#erpass').append('<p class="err">*too short</p>');
						//$('#password').focus();
						return false;
					}

					$('#errepass').empty();
					if(password !== repassword  ){
						$('#errepass').append('<p class="err">*must match password</p>');
						//$('#repassword').focus();
						return false;
					}
									
			});	
			
		});
</script>
	 
