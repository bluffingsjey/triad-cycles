<?php include_once("includes/header.php"); ?>
      <h1 class="page-header">Products</h1>
<form action="<?php echo URL ?>dashboard/addProduct" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="product_name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
        	<input type="text" class="form-control" placeholder="Product Name" name="product_name" required autofocus />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="product_brand" class="col-sm-2 control-label">Brand</label>
        <div class="col-sm-10">
            <select class="form-control" placeholder="Brand Name" name="product_brand" required>
              <?php
                    foreach($this->brandList as $key => $value) {
                        echo '<option value="'.$value['brand_id'].'">'.$value['brand_name'].'</option>';
                    }
                ?>
            </select>
        </div>    
    </div>
    <div class="form-group">
    	<label for="product_short_desc" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-10">
    		<textarea class="form-control" placeholder="Short Description" name="product_short_desc"></textarea>
        </div>
    </div>  
    <div class="form-group">
    	<label for="product_description" class="col-sm-12 text-justify">Main Description:</label>
        <div class="col-sm-12">  
    		<textarea class="form-control" placeholder="Description" name="product_description" id="tmce" required></textarea>
    	</div>
    </div>
    <button class="btn btn-lg btn-success" type="submit">Add Product</button>
</form>    	
<div class="table-responsive">
<h2 class="bg-info text-center">LIST OF PRODUCTS</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Product Brand</th>
      <th>Product Description</th>
      <th>Product Thumb</th>
      <th>Product Slideshow</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
     <?php
        $i = 1;
        foreach($this->productList as $key => $value) {
            
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value['product_name'].'</td>';
            echo '<td>'.$value['brand_name'].'</td>';
            echo '<td>'.$value['product_short_desc'].'</td>';
			echo '<td>
			<div  class="thumbnail"><img src="'.$value['thumb_img_file_location'].'" width="150" heigth="150"/>
			<div class="caption">
			<a class="btn btn-sm btn-danger btn-block" href="'.URL.'dashboard/deleteThumbnail/'.$value['product_id'].'">Delete Thumbnail</a>
			<a class="btn btn-sm btn-success btn-block" href="'.URL.'dashboard/addProductThumb/'.$value['product_id'].'">Add Thumbnails</a>
			</div>
			</div>
			</td>';
			if(!empty($value['slide_id'])){
				echo '<td>
					<div class="thumbnail">
					<img src="'.$value['slide_file_location'].'" width="150" heigth="150"/>
					<div class="caption">
					<button class="btn btn-sm btn-primary btn-block">View Slideshow</button>
					<a class="btn btn-sm btn-success btn-block" href="'.URL.'dashboard/addProductSlideshow/'.$value['product_id'].'">Add Slideshow</a>
					</div>
					</div>
					</td>';					
			} else {
				echo "<td><div class='thumbnail'><div class='caption'>No slideshow yet...</div></div></td>";
			}
			echo '<td>
				<p>
                <a class="btn btn-lg btn-primary btn-block" href="'.URL.'dashboard/editProduct/'.$value['product_id'].'">Edit Product</a> 
                <a class="btn btn-lg btn-danger btn-block" href="'.URL.'dashboard/deleteProduct/'.$value['product_id'].'">Delete Product</a>
                </p>
				</td>';
            echo '</tr>';
            $i++;
        }
    ?>
  </tbody>
</table>
</div> 


<!-- Delete Popoup Modal for selected thumbnail -->
<div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Triad Cycles</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this product thumbnail?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger delPopup" brand-id="">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Delete Popoup Modal for selected Product -->
<div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Triad Cycles</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this product?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger delPopup" brand-id="">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    
<?php include_once("includes/footer.php"); ?>

<script type="text/javascript">
$(document).ready(function(){
	
	var brand_id;
	
	$(".delMe").click(function(){
		
		brand_id = $(this).attr("brand-id");
		
	});
	
	$(".delPopup").click(function(){
	
		window.location = "<?php echo URL.'dashboard/deleteBrand/' ?>" + brand_id;
		
	});
	
});
</script> 