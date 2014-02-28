	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href=<?php echo site_url('home'); ?>>ICS Arman</a>
			</div>
	        <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav" id="navmenu" >
					<li><a href=<?php echo site_url('home'); ?>>Home</a></li>
	<?php
		if(!isset($username) || is_null($username)){
	?>
					
		        <li><a href=<?php echo base_url("index.php/usersearch/search")?>>Search</a></li>
		        <li><a href="/ICSArman/index.php/Index/library_information">Library Information</a></li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right pull-right" id="rightdiv">
					<li class="dropdown">
						<a class="dropdown-toggle" href="" data-toggle="dropdown" id="linked">Sign in</a>
						<div class="dropdown-menu">
						<form id="log" method="post" action=<?php echo site_url('home'); ?>>
							<?php echo form_open('home'); ?>
							<div class="input-group input-group-sm">
								<span class="input-group-addon">Username:</span>
								<input type="text" class="form-control" name="user" value="<?php echo set_value('user'); ?>" required>
							</div>
							<br/>
							<div class="input-group input-group-sm">
								<span class="input-group-addon">Password:</span>
								<input type="password" class="form-control" name="pw" value="<?php echo set_value('pw'); ?>" required>
							</div>
							<?php echo form_error('pw', '<div class="err_p" >', '</div>'); ?>
							<br/>
							<input type="submit" class="btn btn-primary btn-sm" id="sub" value="Login">
						</form>
						</div>
					</li>
					<li>
						<form method="post" action=<?php echo site_url('register'); ?>> 
							<input type="submit" class="btn btn-primary" id="sub" value="Sign Up" />
						</form>
					</li>
				</ul>
	<?php
		}
		else{
			if($type == "student" || $type == "faculty"){
	?>
					<li><a href=<?php echo base_url("index.php/usersearch")?>>Search</a></li>
		            <li><a href=<?php echo base_url("index.php/userprofile")?>>Account Panel</a></li>
		            <li><a href=<?php echo base_url("index.php/usercart")?>>Cart</a></li>
		            <li><a href="/ICSArman/index.php/Index/library_information">Library Information</a></li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right pull-right" id="rightdiv">
					<li><a href="" >Welcome, <?php echo $username?></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="" data-toggle="dropdown" id="linked"><img src=<?php echo base_url("images/Setting-icon.png"); ?> style="margin-top:-6px;width:25px;" /></a>
						<div class="dropdown-menu">
							<form method="post" action=<?php echo site_url('home/logout'); ?>>
								<input type="submit" class="btn btn-primary" id="sub" value="Sign out" />
							</form>
						</div>
					</li>
				</ul>				
		<?php
			}
			elseif($type == "admin"){
		?>
					<li><a href="/ICSArman/index.php/Index/search" >Search</a></li>
		            <li><a href="/ICSArman/index.php/Index/account_panel">Account Panel</a></li>
		            <li><a href="/ICSArman/index.php/Index/management">Management</a></li>
		            <li><a href="/ICSArman/index.php/Index/library_information">Library Information</a></li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right pull-right" id="rightdiv">
					<li><a href="" >Welcome, <?php echo $username?></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="" data-toggle="dropdown" id="linked"><img src=<?php echo base_url("images/Setting-icon.png"); ?> style="margin-top:-6px;width:25px;" /></a>
						<div class="dropdown-menu">
							<form method="post" action=<?php echo site_url('home/logout'); ?>>
								<input type="submit" class="btn btn-primary" id="sub" value="Sign out" />
							</form>
						</div>
					</li>
				</ul>
	<?php
			}
		}
	?>				
			</div>
		</div>
	</div>

<script src=<?php echo base_url("js/jquery.min.js");?>></script>
<link rel="stylesheet" href=<?php echo base_url("css/form_style.css");?>>
		  
