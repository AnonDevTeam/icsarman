<?php
		$this->load->database();
		$requests = mysql_query('SELECT transaction_id, material_id, id, date_borrowed, due_date FROM borrowed_material where is_approved = 0');
?>

<div id="requests">
	<h3>Borrow Requests</h3>
	<table class="table table-bordered">
		<tr>
			<td>Request Number</td>
			<td>User ID</td>
			<td>Material ID</td>
			<td>Date Borrowed</td>
			<td>Due Date</td>

		</tr>
		<?php while ( $request = mysql_fetch_array($requests) ) { ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/manage_request/manage_requests_view' method="post">
			<tr>
				<td><?php echo $request['transaction_id'];?></td>
				<td><?php echo $request['id'];?></td>
				<td><?php echo $request['material_id'];?></td>
				<td><?php echo $request['date_borrowed'];?></td>
				<td><?php echo $request['due_date'];?></td>

				<td><button type="submit" class="btn btn-primary">Approve</button>
					<input type = "text" name = "approve" value = '<?php echo $request['transaction_id']?>' hidden = "hidden"/>
				</td>
		</form>
		<form action = "/ICSArman/index.php/manage_request/manage_requests_view" method = "post">
			<td>
				<button type="submit" class="btn btn-danger">Disapprove</button>
                <input type = "text" name = "disapprove" value = '<?php echo $request['transaction_id']?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>