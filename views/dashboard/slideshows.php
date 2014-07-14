<?php include_once("includes/header.php"); ?>
<h1 class="page-header">Slideshows</h1>
<form action="<?php echo URL ?>dashboard/redirectPage" method="post" class="form-signin" role="form">
    <input type="text" disabled class="form-control " placeholder="Product Name" name="slide_product_id" value="<?php echo $this->productList['product_name'] ?>">
    <input type="hidden" class="product_id" value="<?php echo $this->product_id; ?>"/>	
      <?php
			/*foreach($this->productList as $key => $value) {
				echo '<option value="'.$value['product_id'].'">'.$value['product_name'].'</option>';
			}*/
		?>
       <br/> 
    <input type="file" name="file_upload" id="file_upload"  required/>
    <input type="hidden" id="file_loc" name="slide_file_location" required/>
    <input type="hidden" id="date" name="thumb_date_uploaded" value=""/>
    <div class="img_holder"></div><br/>
    <button class="btn btn-lg btn-primary btn-block save_image" type="submit">Save Slideshow</button>
</form>


<script type="text/javascript">
$("document").ready(function(e) {
    	
	// product_id
	var product_id = $(".product_id").val();	
		
	// Uploadify
	$('#file_upload').uploadify({
					
		'formData'     : {
			'timestamp' 	: '<?php echo $timestamp;?>',
			'token'     	: '<?php echo md5('unique_salt' . $timestamp);?>',
			'product_id' 	: product_id
		},
		
		'swf'				:	default_js.uploadify_swf_url,
		
		'uploader'			:	default_js.uploadify_php_slides_url,
		
		'onDialogOpen'	: function(file) {
			
			console.log(product_id);
			changeVal(product_id);
			
			if(product_id == '') {
				
				$('#file_upload').uploadify('cancel','*');
				
				alert("Please select a product first");
				
			} else {
				
				createSlideDir(product_id);
				
			}
		},
		'onUploadStart'	:	function(file) {
			
			changeVal(product_id);
			
			$('#file_upload').uploadify('settings',	'product_id')
		
		},
		'onUploadSuccess'	: 	function(file, data, response) {
			
			if (data != null) {
				// product_id
				var product_id = $(".product_id").val();
				
				// Display uploaded image
				$('.img_holder').append('<img class="img_uploads" src="<?php echo URL ?>uploads/products/slideshows/'+product_id+'/'+data+'" file="<?php echo ROOT_DIR ?>/uploads/products/slideshows/'+product_id+'/'+data+'" width="350" height="350"/>');
				
				// File Link
				$('#file_loc').val("<?php echo URL ?>uploads/products/slideshows/"+product_id+'/'+data);
				
				var data = {
					
						slide_product_id 		: product_id,
						slide_file_location 	: "<?php echo URL ?>uploads/products/slideshows/"+product_id+'/'+data
					
					}
				
				// Save the uploaded image in the slideshow table
				$.ajax({
					
					url		:	default_js.dashboard_url+'addSlideshow',
					type	:	"POST",
					data	:	data,
					success	: 	function(r){
						
					}
						
				})
			}
			
		}
		
	});
	
});		

function createSlideDir(product_id) {
	$.ajax({
		url: default_js.dashboard_url+'makeDirectorySlideshows',
		type: "POST",
		data: data = {'product_id' : product_id},
		success: function(r) {
			console.log(r);
		}
	});
}

function changeVal(product_id) {
	$('#file_upload').uploadify('settings',	'product_id', product_id);
	console.log(product_id);
}

</script>
     
<?php include_once("includes/header.php"); ?> 