<?php include_once("includes/header.php"); ?>
      <h1 class="page-header">Brands</h1>
<form action="<?php echo URL ?>dashboard/editSaveBrand/<?php echo $this->brandSingle['brand_id']; ?>" method="post" class="form-signin form-adduser" role="form">
	<input type="text" class="form-control" placeholder="Username" name="brand_name" required autofocus value="<?php echo $this->brandSingle['brand_name']; ?>"/>
    <textarea class="form-control" placeholder="Description" name="brand_description" required><?php echo $this->brandSingle['brand_description']; ?></textarea>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
</form> 
<?php include_once("includes/footer.php"); ?> 