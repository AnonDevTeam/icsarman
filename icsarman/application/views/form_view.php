<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Register</title>
 </head>
 <body>
   <h1>Register</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verify_register'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <label for="password">Retype Password:</label>
     <input type="password" size="20" id="passconf" name="passconf"/>
     <br/>
     <label for="password">First Name:</label>
     <input type="password" size="20" id="firstname" name="firstname"/>
     <br/>
     <label for="password">Middle Initial:</label>
     <input type="password" size="20" id="middleinitial" name="middleinitial"/>
     <br/>
     <label for="password">Last Name:</label>
     <input type="password" size="20" id="lastname" name="lastname"/>
     <br/>
     <label for="password">Email:</label>
     <input type="password" size="20" id="email" name="email"/>
     <br/>
     <label for="password">School:</label>
     <input type="password" size="20" id="school" name="school"/>
     <br/>
     <label for="password">Student Number:</label>
     <input type="password" size="20" id="studentnumber" name="studentnumber"/>
     <br/>
     <label for="password">Birthday:</label>
     <input type="password" size="20" id="birthday" name="birthday"/>
     <br/>
     <label for="password">Status:</label>
     <input type="password" size="20" id="status" name="status"/>
     <br/>
     <label for="password">Type:</label>
     <input type="password" size="20" id="type" name="type"/>
     <br/>
     <label for="password">Address:</label>
     <input type="password" size="20" id="address" name="address"/>
     <br/>
     <input type="submit" value="Register"/>
     <br/>
     <a href="login">Login</a>
   </form>
 </body>
</html>