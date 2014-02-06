<!DOCTYPE html>
<html>
	
  <head>
	<meta charset="UTF-8">
	<?php include_once "links.html"; ?>
    <title>Create Account</title>
	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("themes/form_style.css"); ?>> 
	<script src=<?php echo base_url("lib/jquery-1.11.0.min.js"); ?>></script>
    <script src=<?php echo base_url("lib/jquery.tools.min.js"); ?>></script>
  </head>

  <body>
    <?php $this->load->helper(array('form')); ?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav" >
            <li class="active" ><a class="linked" href="">Home</a></li>
            <li><a href="#about" id="linked">About</a></li>
            <li><a href="#contact" id="linked">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="linked">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="linked">Login</a>
                <div class="dropdown-menu">
                  <form id="log" action=>
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">Username:</span>
                        <input type="text" class="form-control" >
                    </div>
                    <br/>
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">Password:</span>
                        <input type="text" class="form-control" >
                    </div><br/>
                    <input type="submit" class="btn btn-primary btn-sm" id="sub" value="Login"/>
                  </form>
                </div>
            </li>
            <li><a href="register" id="linked">Create account</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!--end of fixed navbar-->
    <br/><br/><br/>


    <div class="container middle">
      <div class="pull-right center">
	  	
        <form method="post"  action=<?php echo site_url('verify_register/check_if_exists'); ?> name="form1" id="form1">
          <fieldset>
            <legend>SECURITY</legend>					
            <div class="pull-right">
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Username:</span>
                        <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" required minlength="2" />						 
						<p class="err"><?=$error_username;?></p>	
			</div>				
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Password:</span>
                        <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" required minlength="2"/>
			</div>
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Re-enter Password:</span>
                        <input type="password" id="repassword" name="repassword" value="<?php echo set_value('repassword'); ?>" required/>
						<div id="erdiv"></div>
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
                        <input type="date" name="birthday" value="<?php echo set_value('birthday'); ?>" required/>
            </div>
			<br/>
            <div class="pull-right">
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Type:</span>                        
						<select id="type" name="type" >
							<option value="Student" <?php echo set_select('type', 'Student', TRUE); ?>>Student</option>
							<option value="Faculty" <?php echo set_select('type', 'Faculty'); ?>>Faculty</option>                    
						</select>   
            </div>
			<br/>
            <div class="input-group input-group-sm" id="num">
                        <span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>
                        <input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>						
						<p class="err" id="studnumerr"><?=$error_snumber;?></p>
			</div>		
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">School:</span>
                        <input type="text" name="school" value="<?php echo set_value('school'); ?>" required/>
            </div>
			<br/>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon inlabel">Address:</span>
                        <input type="text" name="address" value="<?php echo set_value('address'); ?>" required/>
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
   
    <?php include_once "footer.html" ?>  
	
 </body>

 <script>
		$(function(){
			$(window).load(
				function () {
					var val = $( "#type option:selected" ).text();
				    //var val =  $('option:selected', this).text();
					$('#num').empty();
					if(val === "Student"){
						$('#num').append('<span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>' +
										 '<input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>' +						
						                 '<p class="err" id="studnumerr"><?=$error_snumber;?></p>');
					}
					else if(val === "Faculty"){
						$('#num').append('<span class="input-group-addon inlabel" id="empnumtxt" >Employee Number:</span>' +
										 '<input type="text" id="empnum" name="employeenumber" maxlength="9" value="<?php echo set_value('employeenumber'); ?>" placeholder="000000000" pattern="[0-9]{9}" required/>' +						
										 '<p class="err" id="empnumerr"><?=$error_snumber;?></p>');
					}
		    });
			$('#type').on("change", 
				function(){
					var val = $( "#type option:selected" ).text();
				    //var val =  $('option:selected', this).text();
					$('#num').empty();
					if(val === "Student"){
						$('#num').append('<span class="input-group-addon inlabel" id="studnumtxt" >Student Number:</span>' +
										 '<input type="text" id="studnum" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" placeholder="0000-00000" pattern="[0-9]{4}[-][0-9]{5}" required/>' +						
						                 '<p class="err" id="studnumerr"><?=$error_snumber;?></p>');
					}
					else if(val === "Faculty"){
						$('#num').append('<span class="input-group-addon inlabel" id="empnumtxt" >Employee Number:</span>' +
										 '<input type="text" id="empnum" name="employeenumber" maxlength="9" value="<?php echo set_value('employeenumber'); ?>" placeholder="000000000" pattern="[0-9]{9}" required/>' +						
										 '<p class="err" id="empnumerr"><?=$error_snumber;?></p>');
					}				
			});
			$('#form1').submit(
				function(){							
					var password = $('#password').val();
					var repassword = $('#repassword').val();
					
					$('#erdiv').empty();
					//console.log(password);
					//console.log(repassword);
					if(password !== repassword  ){
						$('#erdiv').append('<p class="err">*must match password</p>');
						//$('#repassword').focus();
						return false;
					}
			});	
			
		});
	 </script>
	 
</html>