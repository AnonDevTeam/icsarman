<div class='material_info'>
	<?php
		switch($row->type){
			case "book":
				$defaultpic = "book_default.jpg";
				break;
			case "magazine":
				$defaultpic = "magazine_default.jpg";
				break;
			case "sp": case "thesis":
				$defaultpic = "sp_thesis_default.jpg";
				break;
			default:
				$defaultpic = "other_default.jpg";
				break;
		}
		$picture = ($row->picture != '')? $row->material_id.".".$row->picture : $defaultpic;
	?>
		<?php
			if($row->status == "onshelf") $status = "On Shelf";
			if(empty($isborrowedreserved['borrowed']) && empty($isborrowedreserved['reserved'])){
				echo "<div class='status_div'><div class='mat mat_status'><p>{$status}</p></div></div>";}
			else if(empty($isborrowedreserved['borrowed'])){
				echo "<div class='status_div'><div class='mat mat_status'><p>You Reserved This. </p></div></div>";}
			else if(empty($isborrowedreserved['reserved'])){
				if($isborrowedreserved['borrowed'] == "1"){
					echo "<div class='status_div'><div class='mat mat_status'><p>You Borrowed This. </p></div></div>";
				}
				else{
					echo "<div class='status_div'><div class='mat mat_status'><p>Your Request to Borrow This is still Pending</p></div></div>";
				}
			}
			else{
				echo "<div class='status_div'><div class='mat mat_status'><p>You Borrowed/Reserved This </p></div></div>";
			}
		?>

		<div class = "image_div">
			<img class='material_image' src=<?= base_url("images/".$picture); ?> /><br/>
		</div>
		<div class='material_data'>
			<div class="mat mat_title"><p><?= $row->title; ?></p></div>
			<?php if(isset($row->volume)) echo "<div class='mat mat_volume'><p>Volume: ".$row->volume."</p></div>"; ?></p>
			<?php if(isset($row->month)) echo "<div class='mat mat_month'><p>Month: ".$row->month."</p></div>"; ?></p>
			<div class="mat mat_author"><p>Author: <?= $row->author; ?></p></div>
			<?php if(isset($row->publisher)) echo "<div class='mat mat_publisher'><p>Publisher: ".$row->publisher."</p></div>"; ?></p>
			<div class="mat mat_year"><p>Year: <?= $row->year; ?></p></div>
			<div class="mat mat_type"><p>Type: <?= $row->type; ?></p></div>
			<div class="mat mat_quantity"><p>Quantity: <?= $row->quantity; ?></p></div>
			<?php if(isset($row->course_code)) echo "<div class='mat mat_ccode'><p>Course Code: ".$row->course_code."</p></div>"; ?></p>
			<?php if(isset($row->adviser)) echo "<div class='mat mat_adviser'><p>Adviser: ".$row->adviser."</p></div>"; ?></p>
		</div>
		
			<?php
				if(empty($isborrowedreserved['borrowed']) && empty($isborrowedreserved['reserved'])){
					//echo "<div class='status_div'><p> Status: <span>{$row->status} </span></p></div>";
					if($row->quantity!=0){
			?>
					<div class="button_div">
						<button onclick="reserve_popup('<?=$row->title."','".$row->material_id?>');">Reserve</button>
						<button onclick="borrow_popup('<?=$row->title."','".$row->material_id?>');">Borrow</button>
					</div>
			<?php
					}
			 		else{
			?>
					<div class="button_div">
						<button disabled='true'>Reserve</button>;
						<button disabled='true'>Borrow</button>;
					</div>
			<?php
					}
				}
				else if(empty($isborrowedreserved['borrowed'])){
					//echo "<div class='status_div'><p> Status: <span>You Reserved This. </span></p></div>";
			?>
				<div class="button_div">
					<button onclick="reserve_popup('<?=$row->title."','".$row->material_id?>');">Reserve</button>
					<button onclick="borrow_popup('<?=$row->title."','".$row->material_id?>');">Borrow</button>
				</div>
			<?php
				}
				else if(empty($isborrowedreserved['reserved'])){
					if($isborrowedreserved['borrowed'] == "1"){
					//	echo "<div class='status_div'><p> Status: <span>You Borrowed This. </span></p></div>";
					}
					else{
						//echo "<div class='status_div'><p> Status: <span>Your Request to Borrow This is still Pending</span></p></div>";
					}
			?>
				<div class="button_div">
					<button onclick="reserve_popup('<?=$row->title."','".$row->material_id?>');">Reserve</button>
					<button disabled='true'>Borrow</button>
				</div>
			<?php
				}
				else{
					//echo "<p> Status: <span>You Borrowed/Reserved This </span></p>";
			?>
				<div class="button_div">
					<button disabled='true'>Reserve</button>
					<button disabled='true'>Borrow</button>
				</div>
			<?php
				}
			?>	
</div>