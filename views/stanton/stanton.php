
	<div class="row well well-sm box-shadow">
    	<div class="media-post col-sm-12 col-md-12 col-lg-12 well-sm">
        	<img src="<?php echo URL ?>public/images/brand-header-stanton.jpg" class="center-block img-responsive"/>
            <div class="jumbotron well well-sm white-bg">
                <h1>STANTON BIKES</h1>
                <br/>
                
                <?php  foreach($this->products as $key => $value) { ?>
                
                <div class="row box-shadow adjust" id="<?php echo $value['product_id']; ?>">
                	<div class="media-img col-sm-5 col-md-4 col-lg-4 no-padding hide-overflow">
                    	<div class="img-overlay img-overlay-<?php echo $value['product_id']; ?>">
                        	<p><a href="<?php echo URL ?>stanton/product/<?php echo $value['product_id']; ?>" class="btn btn-info" role="button">Details</a></p>
                        </div>
                        <a href="#">
                        <img src="<?php echo $value['thumb_img_file_location'] ?>" class="img-responsive img-animation img-animation-<?php echo $value['product_id']; ?>" data-src="holder.js/300x200" alt="...">
                    	</a>
                    </div>
                    <div class="media-post col-sm-7 col-md-8 col-lg-8">	
                          
                          <div class="caption">
                            <h3 class="border-bottom-h3"><?php echo $value['product_name']; ?></h3>
                            <small><?php echo $value['product_short_desc']; ?></small>
                          </div>
                    </div>    
                </div>    
                
				<?php } ?>
                
               
                <p>Visit: <a href="http://www.stantonbikes.com/" target="_blank">STANTON BIKES</a></p>
            </div>
        </div>
    </div>
