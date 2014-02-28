<script type="text/javascript">
			$(document).ready(function(){
					$("div#slide1").hide();
					$("div#slide2").hide();
					$("div#slide3").hide();
					$("div#slide4").hide();
					$("div#slide5").hide();
					$('#caption').keydown(function(e) {
     				if(e.keyCode == 13) {
       				e.preventDefault(); // Makes no difference
     				//$(this).parent().submit(); // Submit form it belongs to
   					}
			});
			$("#x").on("change",function(){

				$(".activeSlide").fadeOut(500).delay(500);
				$(".activeSlide").removeClass("activeSlide")
				
				if($("#x").val()=="1"){
				z = $("div#slide1");
					z.delay(500).fadeIn(500);
				z.attr("class","activeSlide");
				}
				if($("#x").val()=="2"){
				z = $("div#slide2");
					z.delay(500).fadeIn(500);
				z.attr("class","activeSlide");
				}
				if($("#x").val()=="3"){
				z = $("div#slide3");
					z.delay(500).fadeIn(500);
				z.attr("class","activeSlide");
				}
				if($("#x").val()=="4"){
				z = $("div#slide4");
					z.delay(500).fadeIn(500);
				z.attr("class","activeSlide");
				}
				if($("#x").val()=="5"){
				z = $("div#slide5");
					z.delay(500).fadeIn(500);
				z.attr("class","activeSlide");
				}

			});
					
			});
		</script>
	<form class="form-inline" >
	<div class="form-group">
	<div class="col-sm-10">
	<div class="dropdown">
	<label for="x"><h4>Choose which slide to edit:</h4></label>
	<select id="x">
	<option selected="selected"></option>
	<option id="1" value="1">1</option>
	<option id="2" value="2">2</option>
	<option id="3" value="3">3</option>
	<option id="4" value="4">4</option>
	<option id="5" value="5">5</option>
	</select>
</div>
</div>
</div>
</form>
			<?php
					/*www.ashishrevar.com*/
			/*Function to create thumbnails*/
			function make_thumb($src, $dest, $desired_width) {
			  /* read the source image */
			  $source_image = imagecreatefromjpeg($src);
			  $width = imagesx($source_image);
			  $height = imagesy($source_image);

			  /* find the “desired height” of this thumbnail, relative to the desired width  */
			  $desired_height = floor($height * ($desired_width / $width));

			  /* create a new, “virtual” image */
			  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

			  /* copy source image at a resized size */
			  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

			  /* create the physical thumbnail image to its destination */
			  imagejpeg($virtual_image, $dest);
			}
				$fp = fopen("captions.txt","r");
	        	for($i=1;$i<6;$i++){
	        		?>
	        		<div id='<?php echo "slide".$i;?>'>
	        			<form class="form-inline" role="form" id='<?php echo "form".$i;?>' enctype="multipart/form-data" action='/ICSArman/index.php/media_management/edit_slider' method="post" id="media_management">
	        			<?php if(file_exists('./images/'.$i.'.jpg') && !file_exists('./images/thumb'.$i.'.jpg')){
	        				$src="./images/".$i.".jpg";
	       					$dest="./images/thumb".$i.".jpg";
	       					$desired_width=200;
	    					make_thumb($src, $dest, $desired_width);
	        			}?>
	        			<?php if(file_exists('./images/thumb'.$i.'.jpg')){ ?>
	        			<div class="col-sm-10">
	        			<img class="img-thumbnail" src=<?php echo "'../../images/thumb".$i.".jpg'"?>>
	        			</div>
	        			<br/>
	        			<br/>
	        			<?php
	        			}else{echo "thumbnail is not available";}

	        			?>

	        			
	        			<div class="form-group">
	        			<div class="col-sm-10">
	        			<br/>
	        			
	        			<label for="heading" >Heading:</label>
	        			
	        			<input type="text" class="form-control" id="heading" value=<?php echo "'".fgets($fp)."'";?> name='<?php echo "header".$i;?>' />
	        			</div>
	        			</div>

	        			<br/><br/>
	        			<?php
	        			$s="";
						$tok=strtok(fgets($fp), "\n");
						while ($tok !== false) {
						$s.=$tok;
    					$tok = strtok("\n");
						}
	        			?>
	        			
	        			<div class="form-group">
	        			<div class="col-sm-10">
	        			<label for="caption">Caption:</label>
	        			<textarea class="form-control" form='<?php echo "form".$i;?>' wrap="soft" id="caption" rows="4" cols="50" name='<?php echo "caption".$i;?>'><?php echo $s;?></textarea>
	        			</div>
	        			</div>
	        			<br/>
	        			<br/>
	        			<div class="form-group">
	        			<div class="col-sm-10">
	        				<label for="file">Upload file:</label>
	        				<input type="file" name="file" id="file"/>
	        			</div>
	    				</div>
	    				<br/>
	    				<br/>
	        			<input type="text" name="index" value='<?php echo $i;?>' hidden="hidden"/>
	        			<div class="form-group" >
	        			<div class="col-sm-5">
	        			<input type = "submit" name = "edit" class="btn btn-success " id="sub"value="Edit"/>
	        			</div>
	        			</div>
	        			</form>

	        		<br/>
	        		</div>
	        		<?php
	        	}

	        	fclose($fp);
			?>
	