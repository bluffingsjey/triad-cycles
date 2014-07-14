<?php include_once("includes/header.php"); ?>
<h1 class="page-header">Thumbnails</h1>
<form action="<?php echo URL ?>dashboard/addThumbnail" method="post" class="form-signin" role="form">
    <input type="text" class="form-control product_name" disabled placeholder="Product Name" id="product_id" id_val="<?php echo $this->product_id ?>" value="<?php echo $this->productList['product_name']; ?>" required autofocus>
    <input type="hidden" name="thumb_product_id" value="<?php echo $this->product_id ?>" />
    <br/>
    <input type="file" name="file_upload" id="file_upload"  required/>
    <input type="hidden" id="x1"/>
    <input type="hidden" id="y1"/>
    <input type="hidden" id="x2"/>
    <input type="hidden" id="y2"/>
    <input type="hidden" id="w"/>
    <input type="hidden" id="h"/>
    <input type="hidden" id="file_loc" name="thumb_img_file_location" required/>
    <input type="hidden" id="date" name="thumb_date_uploaded" value=""/>
    <div class="img_holder"></div><br/>
    <button class="btn btn-lg btn-primary btn-block save_image" type="submit">Save Thumbnail</button>
    
</form>
<button class="btn btn-sm btn-block alert_me" style="display:none;">alert</button>

<table class="table table-striped" style="display:none;">
  <thead>
    <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Thumbnail</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
     <?php
	 	/*$i = 1;
        foreach($this->thumbList as $key => $value) {
            
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value['product_name'].'</td>';
            echo '<td><img src="'.$value['thumb_img_file_location'].'" width="100" height="100" /></td>';			
            echo '<td>
                <a href="'.URL.'dashboard/editThumbnail/'.$value['thumb_id'].'"><button class="btn btn-sm btn-primary">Edit</button></a> 
                <a href="'.URL.'dashboard/deleteThumbnail/'.$value['thumb_id'].'"><button class="btn btn-sm btn-primary del_file" product_id="'.$value['product_id'].'">Delete</button></a>
                </td>';
            echo '</tr>';
        	$i++;
		}*/
    ?>
  </tbody>
</table>


<script type="text/javascript">

$("dosument").ready(function() {

	var product_id = $('.product_name').attr("id_val");
	
	

	var prd_id = $('.del_file').attr("product_id");
   	
	$('.del_file').click(function(){

		delDir(prd_id);  
	   
	});
	
			
	// Uploadify
	$('#file_upload').uploadify({
		
		'method'		:	'post',					
		'formData'     	: {
			'timestamp' 	: 	'<?php echo $timestamp;?>',
			'token'     	: 	'<?php echo md5('unique_salt' . $timestamp);?>'
		},
		'swf'				:	default_js.uploadify_swf_url,
		'uploader'			:	default_js.uploadify_php_url+'?product_id='+product_id,
		
		'onDialogOpen'	: function(file) {
			
			console.log(product_id);
			changeVal(product_id);
			
			if(product_id == '') {
				
				$('#file_upload').uploadify('cancel','*');
				
				alert("Please select a product first");
				
			} else {
				
				createDir(product_id);
				
			}
		},
		'onUploadStart'	:	function(file) {
			
			$('#file_upload').uploadify('settings',	'product_id')
		
		},
		'onUploadSuccess'	: 	function(file, data, response) {
			
			
			$('.img_uploads').remove();
			
			console.log(product_id);
			
			$('.img_holder').append('<img class="img_uploads" src="<?php echo URL ?>uploads/products/thumbs/'+product_id+'/'+data+'" file="<?php echo ROOT_DIR ?>/uploads/products/thumbs/'+product_id+'/'+data+'" width="350" height="350"/>');
			
			//alert(product_id);
			
			// file link
			$('#file_loc').val("<?php echo URL ?>uploads/products/thumbs/"+product_id+"/"+data);
			
			
			// Image Crop
			$('.img_uploads').imgAreaSelect(
				{ x1: 120, y1: 90, x2: 280, y2: 210, handles: true, onSelectChange: preview }
			);
		}
		
	});
	
	
	
});	
	
	function preview(img, selection) {  
		var scaleX = 100 / selection.width;  
		var scaleY = 100 / selection.height;   
	  
		$("#thumbnail + div > img").css({  
			width: Math.round(scaleX * 200) + "px",  
			height: Math.round(scaleY * 300) + "px",  
			marginLeft: "-" + Math.round(scaleX * selection.x1) + "px",  
			marginTop: "-" + Math.round(scaleY * selection.y1) + "px"  
		});  
		$("#x1").val(selection.x1);  
		$("#y1").val(selection.y1);  
		$("#x2").val(selection.x2);  
		$("#y2").val(selection.y2);  
		$("#w").val(selection.width);  
		$("#h").val(selection.height);  
	}
	
	function createDir(product_id) {
		$.ajax({
			url: default_js.dashboard_url+'makeDirectoryThumb',
			type: "POST",
			data: data = {'product_id' : product_id},
			success: function(r) {
				console.log(r);
			}
		});
	}
	
	function delDir(product_id) {
		$.ajax({
			url: default_js.dashboard_url+'deleteImg',
			type: "POST",
			data: data = {'product_id' : product_id},
			success: function(r){
				console.log(r);
			}	
		})
	}
	
	function changeVal(product_id) {
		$('#file_upload').uploadify('settings',	'product_id', product_id);
		console.log(product_id);
	}
		
</script>
<?php include_once("includes/header.php"); ?> 