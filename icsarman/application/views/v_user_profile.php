<!DOCTYPE html>

<html>
	<head>
		<title>User Integration - A*DevTeam</title>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url("themes/css/bootstrap.min.css"); ?>>
		<script type="text/javascript" src="<?= base_url("themes/js/jquery-2.0.3.js"); ?>"> </script>
		<script type="text/javascript" src="<?= base_url("themes/js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?= base_url("themes/js/user_profile.js"); ?>"></script>
	</head>
	<body>
		<nav>
			<a href="<?= base_url(); ?>">Home</a>
			<a href="<?= base_url("index.php/c_icsarman/c_user_profile"); ?>">User Profile</a>
			<a href="<?= base_url("index.php/c_icsarman/c_user_search"); ?>">Search</a>
			<a href="<?= base_url("index.php/c_icsarman/c_user_material"); ?>">Material</a>
		</nav>
		<div>
			<div>
				<p id="overallhelper"> <?php if(isset($error)) echo $error; ?></p>
			</div>
			<div>
				<?php
					if($info->picture!=""){
						echo "<img style=\"width:200px;height:200px;\" src=".base_url("uploads/images/".$info->id.$info->picture)." />";
					}
					else{
						echo "<img style=\"width:200px;height:200px;\" src=".base_url("/uploads/images/default.jpg")." />";
					}
				?>
				<a data-toggle="modal" data-target="#changepic" href="">Change</a>
				<div class="modal fade" id="changepic" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<?= form_open_multipart('c_icsarman/c_do_upload'); ?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" >Change Picture</h4>
								</div>
								<div class="modal-body">
									<p id="pichelper"></p>
									<div class="form-group">
										<label for="newpic" class="col-sm-2 control-label">New Photo</label>
										<div class="col-sm-10">
											<input id="newpic" type="file" name="userfile" size="20" />
											<?= form_hidden('userid', $info->id); ?>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-primary" value="Submit" />
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>


		<div>
			<h3>Account Information</h3>
			<hr>
			<p>Username: <span><?= $info->username; ?></span></p>
			<p>Email: <span id="email"><?= $info->email; ?></span></p>
			<a data-toggle="modal" data-target="#editemail" href="">Edit</a>
			<div class="modal fade" id="editemail" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" role="form">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" >Change Email Address</h4>
							</div>
							<div class="modal-body">
								<p id="emailhelper"></p>
								<div class="form-group">
									<label for="newemail" class="col-sm-4 control-label">New Email</label>
									<div class="col-sm-8">
										<?php 
											$data = array(
												'id'=> 'newemail',
												'class' => 'form-control',
												'placeholder' => 'New Email' 
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="form-group">
									<label for="rnewemail" class="col-sm-4 control-label">Repeat New Email</label>
									<div class="col-sm-8">
										<input type="text" id="rnewemail" class="form-control" placeholder="Repeat New Email" onblur="email_check();">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btnn-default" data-dismiss="modal">Close</button>
								<button type="button" id="changeemail" value="<?= $info->id ?>" class="btn btn-primary" data-dismiss="modal" onclick="change_email();">Save changes</button>
							</div>
						</form>	
					</div>
				</div>
			</div>
			<p>Password: <span> ****** </span></p>
			<a  data-toggle="modal" data-target="#editpassword" href="">Edit</a>
			<div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" role="form">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" >Change Password</h4>
							</div>
							<div class="modal-body">
								<p id="pwhelper"></p>
								<div class="form-group">
									<label for="oldpassword" class="col-sm-2 control-label">Old Password</label>
									<div class="col-sm-10">
										<input type="password" id="oldpassword" class="form-control" placeholder="Old Password">
									</div>
								</div>
								<div class="form-group">
									<label for="newpassword" class="col-sm-2 control-label">New Password</label>
									<div class="col-sm-10">
										<input type="password" id="newpassword" class="form-control" placeholder="New Password">
									</div>
								</div>
								<div class="form-group">
									<label for="rnewpassword" class="col-sm-2 control-label">Repeat New Password</label>
									<div class="col-sm-10">
										<input type="password" id="rnewpassword" class="form-control" placeholder="Repeat New Password" onblur="password_check();">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id="changepassword" value="<?= $info->id ?>" class="btn btn-primary" data-dismiss="modal" onclick="change_password();">Save changes</button>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
		<div>
			<h3>Personal Information</h3>
			<hr>
			<p>Name: <span><?= $info->firstname." ".$info->middleinitial." ".$info->lastname; ?></span></p>
			<p>Student Number: <span><?= $info->studentnumber; ?></span></p>
			<p>School: <span><?= $info->school; ?></span></p>
			<p>Birthday: <span><?= $info->birthday; ?></span></p>
			<p>Status: <span><?= $info->status; ?></span></p>
			<p>Type: <span><?= $info->type; ?></span></p>
			<p>Reffered By: <span><?= $info->referred_by; ?></span></p>
			<p>Address: <span id="addr"><?= $info->address; ?></span></p>
			<a  data-toggle="modal" data-target="#editaddr" href="">Edit</a>
			<div class="modal fade" id="editaddr" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" role="form">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" >Change Address</h4>
							</div>
							<div class="modal-body">
								<p id="addrhelper"></p>
								<div class="form-group">
									<label for="newaddr" class="col-sm-2 control-label">New Address</label>
									<div class="col-sm-10">
										<input type="text" id="newaddr" class="form-control" placeholder="New Address">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id="changeaddr" value="<?= $info->id ?>" class="btn btn-primary" data-dismiss="modal" onclick="change_add();">Save changes</button>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</body>
</html>