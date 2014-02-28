<?php
		$this->load->database();
		$requests = mysql_query("SELECT id,firstname,middleinitial,lastname,studentnumber,school,type FROM user_profile WHERE status LIKE 'verified'");
?>

<div id="accounts_container">
	<h3>Approve Accounts</h3>
	<table style="text-align: center;"class="table table-bordered">
		<tr>
			<td>Full Name</td>
			<td>Student Number</td>
			<td>School</td>
			<td>Type</td>
			<td></td>
			<td></td>
		</tr>
		<?php while ( $users = mysql_fetch_array($requests) ) { ?>
		<tr>
				<td><?php echo $users['firstname']." ".$users['middleinitial'].". ".$users['lastname'];?></td>
				<td><?php echo $users['studentnumber'];?></td>
				<td><?php echo $users['school'];?></td>
				<td><?php echo $users['type'];?></td>
		<form action='/ICSArman/index.php/manage_request/activate_user' method="post">
				<td>
					 <input type = "text" name = "id" value = '<?php echo $users['id']?>' hidden = "hidden"/>
					<button type="submit" class="btn btn-primary btn-sm">Approve</button>
				</td>
		</form>
		<form action='/ICSArman/index.php/manage_request/delete_user' method="post">
				<td>
					 <input type = "text" name = "id" value = '<?php echo $users['id']?>' hidden = "hidden"/>
					<button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
				</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>