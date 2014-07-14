
<div class="row well well-sm box-shadow">
    <div class="col-lg-12 well-sm white-bg">
    <?php foreach($this->productName as $key => $value) { ?>
        <h1><?php echo $value["product_name"] ?></h1>
    <?php } ?>        
            <!-- CAROUSEL -->
            <div id="myCarousel" class="carousel slide box-shadow" data-ride="carousel">
                <ol class="carousel-indicators">
                 
                    <?php 
					$i = 0;
					foreach($this->productSlideshow as $key => $value) { ?>
                    	<li data-target="#myCarousel" data-slide-to = "<?php echo $value['slide_id']; ?>" class="<?php echo $class = ($i == 0 ? 'active' : '') ?>"></li>
                    <?php 
					$i++;
					} ?>
                
                </ol>
                <div class="carousel-inner">
                    
                    <?php 
					$a = 0;
					foreach($this->productSlideshow as $key => $value) { ?>
                    
                    	<div class="item <?php echo $class = ($a == 0 ? 'active' : '') ?>">
                            <img src="<?php echo $value['slide_file_location'] ?>" alt="Sample" class="img-responsive"/>
                            <div class="carousel-caption">
                                <!--<h3 class="text-left">STANTON BIKES</h3>-->
                                <p class="text-left"><?php //echo $lorem_text; ?></p>
                            </div>
                        </div>
					
					<?php
					$a++;
					} ?>
                    
                 </div>   
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
            </div>
            <!-- CAROUSEL -->
            
            <div class="jumbotron well well-sm white-bg">
                <p><small><?php foreach($this->productName as $key => $value) { echo $value['product_description']; }  ?></small></p>
            </div>   
        
    </div>
</div>