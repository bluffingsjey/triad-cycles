<?php include_once("includes/header.php"); ?>
<h1 class="page-header">Thumbnails</h1>
<form action="<?php echo URL ?>dashboard/editSaveThumbnail/<?php echo $this->thumbSingle['thumb_id']; ?>" method="post" class="form-signin" role="form">
   	<input type="text" class="form-control" readonly name="product_name" required value="<?php echo $this->thumbSingle['product_name']; ?>" />
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
    <div class="img_holder">
    	<img class="img_uploads" src="<?php echo $this->thumbSingle['thumb_img_file_location']; ?>" />
    </div><button class="btn btn-sm btn-alert">Remove Thumbnail</button><br/><br/>
    <button class="btn btn-lg btn-primary btn-block save_image" type="submit">Update Thumbnail</button>
</form>


<script type="text/javascript">
	
	// Uploadify
	$('#file_upload').uploadify({
					
		'formData'     : {
			'timestamp' : '<?php echo $timestamp;?>',
			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
		},
		'swf'				:	default_js.uploadify_swf_url,
		'uploader'			:	default_js.uploadify_php_url,
		'onUploadSuccess'	: 	function(file, data, response) {
			$('.img_uploads').remove();
			$('.img_holder').append('<img class="img_uploads" src="<?php echo URL ?>uploads/'+data+'" file="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>/uploads/'+data+'" width="350" height="350"/>');
			
			// file link
			$('#file_loc').val("<?php echo URL ?>uploads/"+data);
			
			
			// Image Crop
			$('.img_uploads').imgAreaSelect(
				{ x1: 120, y1: 90, x2: 280, y2: 210, handles: true, onSelectChange: preview }
			);
		}
		
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
</script>
<?php include_once("includes/header.php"); ?> 