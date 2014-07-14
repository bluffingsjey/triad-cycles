<?php include_once("includes/header.php"); ?>
      <h1 class="page-header">Edit Product</h1>
<form action="<?php echo URL ?>dashboard/editSaveProduct/<?php echo $this->productSingle['product_id']; ?>" method="post" class="form-horizontal" role="form">

	<div class="form-group">
		<label for="product_name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
    		<input type="text" class="form-control" placeholder="Product Name" name="product_name" required autofocus value="<?php echo $this->productSingle['product_name']; ?>" />
    	</div>
    </div>
    
    <div class="form-group">
		<label for="product_brand" class="col-sm-2 control-label">Brand</label>
        <div class="col-sm-10">    
            <select class="form-control" placeholder="Brand Name" name="product_brand" required>
              <?php
                    foreach($this->brandList as $key => $value) {
                        $selected = ($this->productSingle['product_brand'] == $value['brand_id'] ? 'selected' : '');
                        echo '<option value="'.$value['brand_id'].'" '.$selected.'>'.$value['brand_name'].'</option>';
                    }
                ?>  
            </select>
         </div>
    </div>
    
    <div class="form-group">
		<label for="product_short_desc" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-10">        
    		<textarea class="form-control" placeholder="Short Description" name="product_short_desc"><?php echo $this->productSingle['product_short_desc']; ?></textarea>
    	</div>
    </div>
    
    <div class="form-group">
		<label for="product_description" class="col-sm-12 text-left">Main Description:</label>
        <div class="col-sm-12">    
    		<textarea class="form-control" placeholder="Description" name="product_description" id="tmce" required><?php echo $this->productSingle['product_description']; ?></textarea>
        </div>
    </div>    
        
    <button class="btn btn-lg btn-success" type="submit">Update Product</button>
</form>   
<?php include_once("includes/footer.php"); ?> 