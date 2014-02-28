<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>		
	</head>
	<body>

	    <br/><br/><br/><br/>

		<!-- Carousel
	    ================================================== -->
	    <div class="container">
	      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	        <!-- Indicators -->
	        <ol class="carousel-indicators">
	          <?php
	          $fp = fopen("captions.txt","r");
	        	$i=0;
	        	while (!feof($fp)) {
	        		$header=fgets($fp);
	        		$caption=fgets($fp);
	        		if(($header!="" && $header!="\n")  && ($caption!="" && $caption!="\n") && file_exists('./images/'.$i.'.jpg')){
	          ?>
	          <li data-target="#carousel-example-generic" data-slide-to=<?php echo "'".$i."' "; if($i==0){echo "class='active'";}?>></li>
	          <?php 
	          	$i++;
	            }
	      		}
	          fclose($fp);
	          ?>
	        </ol>

	        <!-- Wrapper for slides -->
	        <div class="carousel-inner">
	        	<?php $fp = fopen("captions.txt","r");
	        	$i=1;
	        	$j=1;
	        	while (!feof($fp)) {
	        		$header=fgets($fp);
	        		$caption=fgets($fp);
	        		if(($header!="" && $header!="\n")  && ($caption!=""&& $caption!="\n") && file_exists('./images/'.$i.'.jpg')){
				?>
	          <div class=<?php if($j==1){ echo "'item active'";}else{ echo "'item'";}?>>
	            <img src=<?php echo base_url("images/".$i.".jpg");?> alt="">
	            <div class="carousel_caption_edit">
	            	
	              <h3><?php echo $header;?></h3>
	              <p><?php echo $caption;?></p>
	            </div>
	          </div>
	          <?php 
	          	$j++;
	          	}
	          	$i++;
	          }
	          	fclose($fp);
	      		 ?>
	        </div>


	        <!-- Controls -->
	        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	          <span class="glyphicon glyphicon-chevron-left"></span>
	        </a>
	        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	          <span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
	      </div>
	    <!-- end of carousel -->

	    <br/>
	      <!-- Three-column thumbnails -->
	      <div class="well">
	        <h2 style="text-align: center;">Books of the Day</h2>
	        <p style="text-align: center;">Indulge yourself with these wonderful books.</p>
	        <br/>
	        <div class="row">
	          <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/2.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
          	  <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/3.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
          	  <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/1.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
	        </div>
	        <div class="row">
	          <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/1.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
          	  <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/2.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
          	  <div class="col-md-4">
	          	<div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book title</h3>
	              </div>
	              <div class="panel-body">
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("images/3.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
	        </div>
	      <!-- end of three-column thumbnail-->
		  
	  	</div>
	</body>
	<?php include_once "links.html"; ?>
	<?php include_once "navbar.php"; ?>
	<?php include_once "footer.html"; ?>	
</html>