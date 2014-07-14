<?php include_once("includes/header.php"); ?>

<?php

$lorem_text = "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.";

?>

<div class="row well well-sm box-shadow">
	<div class="media-post col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
    	<!-- CAROUSEL -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        	<ol class="carousel-indicators">
            	<li data-target="#myCarousel" data-slide-to = "0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to = "1" ></li>
                <li data-target="#myCarousel" data-slide-to = "2"></li>
            </ol>
            <div class="carousel-inner">
            	<div class="item active">
                	<img src="images/carousel_img_1.jpg" alt="Sample" class="img-responsive"/>
                	<div class="carousel-caption">
                    	<!--<h3 class="text-left">PYGA INDUSTRIES</h3>-->
                        <p class="text-left"><?php //echo $lorem_text; ?></p>
                    </div>
                </div>
                <div class="item">
                	<img src="images/carousel_img_2.jpg" alt="Sample" class="img-responsive"/>
                	<div class="carousel-caption">
                    	<!--<h3 class="text-left">PYGA INDUSTRIES</h3>-->
                        <p class="text-left"><?php //echo $lorem_text; ?></p>
                    </div>
                </div>
                <div class="item">
                	<img src="images/carousel_img_3.jpg" alt="Sample" class="img-responsive"/>
                	<div class="carousel-caption">
                    	<!--<h3 class="text-left">STANTON BIKES</h3>-->
                        <p class="text-left"><?php //echo $lorem_text; ?></p>
                    </div>
                </div>
             </div>   
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                	<span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                	<span class="glyphicon glyphicon-chevron-right"></span>
                </a>
        </div><!-- CAROUSEL -->
    </div><!-- col-lg-12 -->
    </div><!-- row -->
    
    <div class="row">
		<div class="media-img col-sm-4 col-md-4 col-lg-4 well well-sm">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/300x200/auto" alt="300x200" src="images/img-1.jpg">
		</div>
		<div class="media-img col-sm-4 col-md-4 col-lg-4 well well-sm">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/300x200/auto" alt="300x200" src="images/img-2.jpg">
		</div>
		<div class="media-img col-sm-4 col-md-4 col-lg-4 well well-sm">
			<img class="featurette-image img-responsive center-block" data-src="holder.js/300x200/auto" alt="300x200" src="images/img-3.jpg">
		</div>
    </div>    


<div class="row">
	<div class="media-img col-sm-4 col-md-4 col-lg-4">
		<div class="well well-lg box-shadow" ontouchstart="this.classList.toggle('hover');">
        	<img src="images/pyga-black-home.jpg" class="img-responsive center-block img-thumbnail" />    
        </div>
    </div>
	<div class="media-img col-sm-4 col-md-4 col-lg-4">
    	<div class="well well-lg box-shadow" ontouchstart="this.classList.toggle('hover');">
        	<img src="images/stanton-black.jpg" class="img-responsive center-block img-thumbnail" />    
        </div>
    </div>
	<div class="media-img col-sm-4 col-md-4 col-lg-4">
		<div class="well well-lg box-shadow" ontouchstart="this.classList.toggle('hover');">
        	<img src="images/ballistic-black-home.jpg" class="img-responsive center-block img-thumbnail" />    
        </div>
    </div>
</div>

<?php include_once("includes/footer.php"); ?>