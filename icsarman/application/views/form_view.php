<?xml version="1.0" encoding="EUC-JP"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Register</title>
   
   <link href="<?php echo base_url(); ?>application/public/css/style.css" rel="stylesheet" type="text/css"  />
 </head>
 <body>
 
 <?php echo form_open('verify_register'); ?>
   <h1>Register</h1>
   <form name="formView" method="post" action="">   
     <label for="username">Username:</label>     
	 <input type="text" size="20" id="username" name="username" maxlength="15" value="<?php echo set_value('username'); ?>" style="background-color:<?php if(form_error('username') !=='') { echo 'LightSalmon'; }?>" />     
	 <?php echo form_error('username', '<div class="error" id="eruname">', '</div>'); ?> 	 
	 <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password" maxlength="40" value="<?php echo set_value('password'); ?>" style="background-color:<?php if(form_error('password') !=='') { echo 'LightSalmon'; }?>" />
	 <?php echo form_error('password', '<div class="error" id="erpw">', '</div>'); ?>
     <br/>
     <label for="repassword">Retype Password:</label>
     <input type="password" size="20" id="repassword" name="repassword" maxlength="40" value="<?php echo set_value('repassword'); ?>" style="background-color:<?php if(form_error('repassword') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('repassword', '<div class="error" id="errpw">', '</div>'); ?>
	 <br/>
     <label for="firstname">First Name:</label>
     <input type="text" size="20" id="firstname" name="firstname" maxlength="64" value="<?php echo set_value('firstname'); ?>" style="background-color:<?php if(form_error('firstname') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('firstname', '<div class="error" id="erfname">', '</div>'); ?>
	 <br/>
     <label for="middleinitial">Middle Initial:</label>
     <input type="text" size="20" id="middleinitial" name="middleinitial" maxlength="2" value="<?php echo set_value('middleinitial'); ?>" style="background-color:<?php if(form_error('middleinitial') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('middleinitial', '<div class="error" id="ermi">', '</div>'); ?>
	 <br/>
     <label for="lastname">Last Name:</label>
     <input type="text" size="20" id="lastname" name="lastname" maxlength="64" value="<?php echo set_value('lastname'); ?>" style="background-color:<?php if(form_error('lastname') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('lastname', '<div class="error" id="erlname">', '</div>'); ?>
	 <br/>
     <label for="type">Type:</label>
	 <select name="type" style="background-color:<?php if(form_error('type') !=='') { echo 'LightSalmon'; }?>" >
		<option value="" <?php echo set_select('type', '', TRUE); ?>></option>
		<option value="Student" <?php echo set_select('type', 'Student'); ?>>Student</option>
		<option value="Faculty" <?php echo set_select('type', 'Faculty'); ?>>Faculty</option>
		<option value="Outsider" <?php echo set_select('type', 'Outsider'); ?>>Outsider</option>					
	 </select>	 
     <?php echo form_error('type', '<div class="error" id="ertype">', '</div>'); ?>
	 <br/>
     <label for="studentnumber">Student Number:</label>
     <input type="text" size="20" id="studentnumber" name="studentnumber" maxlength="10" value="<?php echo set_value('studentnumber'); ?>" style="background-color:<?php if(form_error('studentnumber') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('studentnumber', '<div class="error" id="ersnumber">', '</div>'); ?>
	 <br/>
     <label for="birthday">Birthday:</label>
     <input type="date" size="20" id="birthday" name="birthday" value="<?php echo set_value('birthday'); ?>" style="background-color:<?php if(form_error('birthday') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('birthday', '<div class="error" id="erbday">', '</div>'); ?>
	 <br/>
     <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email" maxlength="64" value="<?php echo set_value('email'); ?>" style="background-color:<?php if(form_error('email') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('email', '<div class="error" id="eremail">', '</div>'); ?>
	 <br/>
     <label for="school">School:</label>
     <input type="text" size="20" id="school" name="school" maxlength="128" value="<?php echo set_value('school'); ?>" style="background-color:<?php if(form_error('school') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('school', '<div class="error" id="erschool">', '</div>'); ?>	 
	 <br/>
     <label for="address">Address:</label>
     <input type="text" size="20" id="address" name="address" maxlength="128" value="<?php echo set_value('address'); ?>" style="background-color:<?php if(form_error('address') !=='') { echo 'LightSalmon'; }?>" />
     <?php echo form_error('address', '<div class="error" id="eraddress">', '</div>'); ?>
	 <br/>
     <input type="submit" name="submit" value="Register"/>
     <br/>
     <a href="login">Login</a>
	 
   </form>
   
 </body>
</html>