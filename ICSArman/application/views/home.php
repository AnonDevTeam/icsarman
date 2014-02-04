<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<?php include_once "links.html"; ?>
	</head>
	<body>

		<?php include_once "navbar.php"; ?>
		

	    <br/><br/><br/><br/>

	    <!-- Carousel
	    ================================================== -->
	    <div class="container">
	      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	        <!-- Indicators -->
	        <ol class="carousel-indicators">
	          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	        </ol>

	        <!-- Wrapper for slides -->
	        <div class="carousel-inner">
	          <div class="item active">
	            <img src="images/1.jpg" alt="gintama movie 2">
	            <div class="carousel_caption_edit">
	              <h3>Gintama The Movie: The Final Chapter: Be Forever Yorozuya</h3>
	              <p>Produced by Sunrise, expect the wackiness and craziness of the Gintama cast in their second movie released in 2013.</p>
	            </div>
	          </div>
	          <div class="item">
	            <img src="images/2.jpg" alt="durarara">
	            <div class="carousel_caption_edit">
	              <h3>Durarara!!</h3>
	              <p>Filled with suspense, mystery and strangeness, Ryuugamine Mikado explores Ikebukuro and finds out that the days he found boring and repetative days are not anything like he expected them to be.</p>
	            </div>
	          </div>
	          <div class="item">
	            <img src="images/3.jpg" alt="kuroko no basuke">
	            <div class="carousel_caption_edit">
	              <h3>The Basketball That Kuroko Plays</h3>
	              <p>This is a manga about a basketball. It has been adapted to anime and currently running on its second season. </p>
	            </div>
	          </div>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/2.jpg"></a>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/3.jpg"></a>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/1.jpg"></a>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/4.jpg"></a>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/5.jpg"></a>
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
	                <a href=""><img class="thumbnail img-responsive" src="images/3.jpg"></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
	        </div>
	      <!-- end of three-column thumbnail-->
	  	</div>
	</body>
	<?php include_once "footer.html"; ?>
</html>