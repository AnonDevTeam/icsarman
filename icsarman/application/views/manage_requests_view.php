<?php
		$this->load->database();
		$requests = mysql_query('SELECT b.transaction_id, b.material_id, b.id, b.date_borrowed, b.due_date, m.material_id, m.title FROM borrowed_material b, material m where b.material_id = m.material_id AND is_approved = 0');
?>

<div id="requests">
	<h3>Borrow Requests</h3>
	<table style="text-align: center;" class="table table-bordered">
		<tr>
			<td>Request No.</td>
			<td>User ID</td>
			<td>Material ID</td>
			<td>Title</td>
			<td>Date Borrowed</td>
			<td>Due Date</td>
			<td></td>
			<td></td>

		</tr>
		<?php while ( $request = mysql_fetch_array($requests) ) { ?>
		<form enctype="multipart/form-data" action='/ICSArman/index.php/manage_request/manage_requests_view' method="post">
			<tr>
				<td><?php echo $request['transaction_id'];?></td>
				<td><?php echo $request['id'];?></td>
				<td><?php echo $request['material_id'];?></td>
				<td><?php echo $request['title'];?></td>
				<td><?php echo $request['date_borrowed'];?></td>
				<td><?php echo $request['due_date'];?></td>

				<td><button type="submit" class="btn btn-primary btn-sm">Approve</button>
					<input type = "text" name = "approve" value = '<?php echo $request['transaction_id'] . " " . $request['material_id']?>' hidden = "hidden"/>
				</td>
		</form>
		<form action = "/ICSArman/index.php/manage_request/manage_requests_view" method = "post">
			<td>
				<button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
                <input type = "text" name = "disapprove" value = '<?php echo $request['transaction_id']?>' hidden = "hidden"/>
			</td>
		</form>
		</tr>
		<?php }?>
	</table>
</div>