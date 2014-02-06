<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>		
	</head>
	<body>
		<?php $this->load->helper(array('form'));?>
	    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href=<?php echo site_url('home'); ?>>ICS Arman</a>
	          </div>
	          <div class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	              <li class="active"><a href=<?php echo site_url('home'); ?>>Home</a></li>
	              <li><a href="">Search</a></li>
	              <li><a href="">Account Panel</a></li>
	              <li><a href="">Suggest</a></li>
	              <li><a href="">Library Information</a></li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	              <li><a href="<?php echo site_url('home'); ?>">Welcome, <?php echo $username?>!</a></li>
	              <li>
					<form action=<?php echo site_url('home/logout'); ?>>
						<input type="submit" class="btn btn-primary" id="sub" value="Sign out" />
					</form>
				  </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    <!-- end of navigation bar for home -->

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
	            <img src=<?php echo base_url("resources/images/1.jpg"); ?> alt="gintama movie 2">
	            <div class="carousel-caption">
	              <h3>Gintama The Movie: The Final Chapter: Be Forever Yorozuya</h3>
	              <p>Produced by Sunrise, expect the wackiness and craziness of the Gintama cast in their second movie released in 2013.</p>
	            </div>
	          </div>
	          <div class="item">
	            <img src=<?php echo base_url("resources/images/2.jpg"); ?> alt="durarara">
	            <div class="carousel-caption">
	              <h3>Durarara!!</h3>
	              <p>Filled with suspense, mystery and strangeness, Ryuugamine Mikado explores Ikebukuro and finds out that the days he found boring and repetative days are not anything like he expected them to be.</p>
	            </div>
	          </div>
	          <div class="item">
	            <img src=<?php echo base_url("resources/images/3.jpg"); ?> alt="kuroko no basuke">
	            <div class="carousel-caption">
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/2.jpg"); ?>></a>
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/3.jpg"); ?>></a>
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/1.jpg"); ?>></a>
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/1.jpg"); ?>></a>
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/2.jpg"); ?>></a>
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
	                <a href=""><img class="thumbnail img-responsive" src=<?php echo base_url("resources/images/3.jpg"); ?>></a>
	              	<p>This is a book, you know.</p>
	              </div>
          		</div>
          	  </div>
	        </div>
	      <!-- end of three-column thumbnail-->
		  
	  	</div>
	</body>
	<?php include_once "links.html"; ?>
	<?php include_once "footer.html"; ?>
</html>