<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
   <link href="<?php echo base_url(); ?>application/public/css/style.css" rel="stylesheet" type="text/css"  />
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <?php echo form_open('verify_login'); ?>
   <form action="" method="post" name="log_in">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" maxlength="15" value="<?php echo set_value('username'); ?>" style="background-color:<?php if(form_error('username') !=='') { echo 'LightSalmon'; }?>" />     
	 <?php echo form_error('username', '<div class="error" id="eruname">', '</div>'); ?> 	 
	 
	 <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password" maxlength="40" value="<?php echo set_value('password'); ?>" style="background-color:<?php if(form_error('password') !=='') { echo 'LightSalmon'; }?>" />
	 <?php echo form_error('password', '<div class="error" id="erpw">', '</div>'); ?>
     <br/>
     <input type="submit" name="submit" value="Log In"/>
     <br/>
     <a href="register">Register</a>
   </form>
 </body>
</html>