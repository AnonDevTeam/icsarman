<!DOCTYPE html>

<html>
	<head>
		
	</head>

	<body>

		<h1>LIST OF REQUESTS: </h1><br/>
		<form action="http://localhost/ICSArman/index.php/portal/callApproveRequest" method="post">
		<?php
			$SQL = "SELECT transaction_id, material_id, id, date_borrowed, due_date FROM borrowed_material where is_approved = 0";
			$result = mysql_query($SQL);
			if($result == 0){
				print "<h3>NO PENDING REQUESTS</h3>";
			}
			else{
			print "<table border = 1>";
			print "<tr>";
			print "<td>Transaction ID</td>";
			print "<td>Material ID</td>";
			print "<td>ID</td>";
			print "<td>Date Borrowed</td>";
			print "<td>Due Date</td>";
			print "<td>Action</td>";
			print "</tr>";
			$i = 0;
			while ( $db_field = mysql_fetch_assoc($result) ) {
				print "<tr>";
				print "<td>".$db_field['transaction_id']."</td>";
				print "<td>".$db_field['material_id']."</td>";
				print "<td>".$db_field['id']."</td>";
				print "<td>".$db_field['date_borrowed']."</td>";
				print "<td>".$db_field['due_date']."</td>";
				print "<td> <input type = 'submit' name = 'accept" . $i . "' value = 'Accept' />" . "<input type = 'submit' name = 'reject" . $i . "' value = 'Reject' /> </td>";
				print "<tr>";
				$i++;
			}

			}
			print "</table>";
			
		?>
		</form>
		
			
	

	</body>

</html>