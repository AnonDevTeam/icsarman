<div class='material_info'>
			<?php
				$picture = ($row->picture != '')? $row->material_id.$row->picture : "default.jpg";
			?>
			<img class='material_image' src=<?= base_url("uploads/images/".$picture); ?> /><br/>
			<p>Title: <span><?= $row->title; ?></span></p>
			<?php if(isset($row->volume)) echo "Volume: ".$row->volume; ?></p>
			<?php if(isset($row->month)) echo "Month: ".$row->month; ?></p>
			<p>Author: <span><?= $row->author; ?></span></p>
			<?php if(isset($row->publisher)) echo "Publisher: ".$row->publisher; ?></p>
			<p>Year: <span><?= $row->year; ?></span></p>
			<p>Type: <span><?= $row->type; ?></span></p>
			<?php if(isset($row->course_code)) echo "Course Code: ".$row->course_code; ?></p>
			<?php if(isset($row->adviser)) echo "Adviser: ".$row->adviser; ?></p>
			
			<?php
				if(empty($isborrowedreserved['borrowed']) && empty($isborrowedreserved['reserved'])){
					echo "<p> Status: <span>{$row->status} </span></p>";
					if($row->quantity!=0){
						// echo "<button class='res_button'>Reserve</button>";
						// echo "<button>Borrow</button>";
						echo "<button data-toggle='modal' data-target='#reserve_popup'>Reserve</button>";
			?>
						<div class="modal fade" id="reserve_popup"<?=$row->material_id;?> tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form class="form-horizontal" role="form">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" >Reserve</h4>
										</div>
										<div class="modal-body">
											<p id="reservehelper"></p>
											<div class="form-group">
												<label for="newemail" class="col-sm-4 control-label">Reservation Date: </label>
												<div class="col-sm-8">
													<input type="date" id="reserve_date" name="reserve_date" onblur="reserve_blur();"/>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btnn-default" data-dismiss="modal">Close</button>
											<button type="button" id="reserve" value=<?= $id.",".$row->material_id; ?> class="btn btn-primary" data-dismiss="modal" onclick="reserve();">Reserve</button>
										</div>
									</form>	
								</div>
							</div>
						</div>
			<?php
					}
					else{
						echo "<button disabled='true'>Reserve</button>";
						echo "<button disabled='true'>Borrow</button>";
					}
				}
				else if(empty($isborrowedreserved['borrowed'])){
					echo "<p> Status: <span>You Reserved This. </span></p>";
					echo "<button class='res_button''>Reserve</button>";
					echo "<button onclick='borrow_popup(".$row->title.",".$row->material_id.");'>Borrow</button>";
				}
				else if(empty($isborrowedreserved['reserved'])){
					echo "<p> Status: <span>You Borrowed This. </span></p>";
					echo "<button class='res_button''>Reserve</button>";
					echo "<button disabled='true'>Borrow</button>";
				}
				else{
					echo "<p> Status: <span>You Borrowed/Reserved This </span></p>";
					echo "<button disabled='true'>Reserve</button>";
					echo "<button disabled='true'>Borrow</button>";
				}
			?>	
</div>