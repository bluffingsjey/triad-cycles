<?php include_once("includes/header.php"); ?>
      <h1 class="page-header">Brands</h1>
<form action="<?php echo URL ?>dashboard/addBrand" method="post" class="form-signin" role="form">
	<input type="text" class="form-control" placeholder="Brand Name" name="brand_name" required autofocus />
    <textarea class="form-control" placeholder="Description" name="brand_description" required></textarea>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Add Brand</button>
</form>    	
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Brand Name</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
     
     <?php
	 
	 	//<a href="'.URL.'dashboard/deleteBrand/'.$value['brand_id'].'"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deletePopup">Delete</button></a>
        $i = 1;
        foreach($this->brandList as $key => $value) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value['brand_name'].'</td>';
            echo '<td>'.$value['brand_description'].'</td>';
            echo '<td>
                <a href="'.URL.'dashboard/editBrand/'.$value['brand_id'].'"><button class="btn btn-sm btn-primary">Edit</button></a> 
                <button class="btn btn-sm btn-danger delMe" brand-id="'.$value['brand_id'].'" data-toggle="modal" data-target="#deletePopup">Delete</button>
                </td>';
            echo '</tr>';
            $i++;
        }
    ?>      
  </tbody>
</table>

<div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Triad Cycles</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this brand?</p>
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
