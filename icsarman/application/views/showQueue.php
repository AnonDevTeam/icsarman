<div >
	<table class="table table-striped table-bordered table-condensed">

		<tr>
			<td>Transaction ID</td>
			<td>User Name</td>
			<td>Group Id</td>
			<td>Material Id</td>
			<td>Date Reserved</td>
		</tr>	
		<?php foreach($result as $row): ?>
		<tr>
			<td><?php if(isset($row)){ echo $row->transaction_id; ?></td>
			<td><?php echo $row->username; ?></td>
			<td><?php echo $row->group_id; ?></td>
			<td><?php echo $row->material_id; ?></td>
			<td><?php echo $row->date_reserved; } ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>