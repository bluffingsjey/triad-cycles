$(function(){

	default_js.init();
	
})

var default_js = {
	
		init:function(){
			
			// make the background white for backend panel
			$("body").css({
				'background-color': '#FFFFFF'	
			});
			
			// tiny MCE
			tinymce.init({
				selector: "textarea#tmce",
				height: 300
			})
			
			// image crop
			$(".save_image").click(function() {  
				var x1 = $("#x1").val();  
				var y1 = $("#y1").val();  
				var x2 = $("#x2").val();  
				var y2 = $("#y2").val();  
				var w = $("#w").val();  
				var h = $("#h").val();  
				var img_loc = $('.img_uploads').attr("file");
				
				var data = {
						'x1' : x1,
						'y1' : y1,
						'x2' : x2,
						'y2' : y2,
						'w' : w,
						'h' : h,
						'img_loc' : img_loc,
						'product_id' : product_id
					}
					
				if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){  
					alert("You must make a selection first");  
					return false;  
				}else{  
					//return true;
					$.ajax({
						url		:	default_js.dashboard_url+'saveImage',
						type	:	'POST',
						data	:	data,
						success	:	function(r){
							//var result = $.parseJSON(r);
							console.log(r);
						}
					}) 
				}  
			}); 

						
			/*$.get('dashboard/ajaxDisplayResults', function(o){
					
					$.each(o, function(key, val){
						$('#listInserts').append('<div id='+ val.id +'>ID: ' + val.id + ' Text: ' + val.text + ' <a href="#" class="delMe" id="'+ val.id +'">X</a></div>');
					});
					
			},'json');
			
			$('#randomInsert').submit(function(){
				var url = $(this).attr('action');
				var data = $(this).serialize();
				
				$.ajax({
					url:url,
					type:'POST',
					data: data,
					success: function(r){
						default_js.load_results();
					}
				});
				
				$('.input_name').val('');
				
				return false;	
			})
			
			$('#content').delegate('.delMe','click',function(e){
				e.stopPropagation();	
				id = $(this).attr('id');
				default_js.delete_record(id);
			});*/
			
			
			// Add user form validation
			/*$('.form-adduser').validate({
				
				psswrd:{
						required:true,
						minlength: 8
					},
				conpsswrd:{
						required:true,
						equalTo: "#psswrd"
					},
					
				errorClass: "help-inline"	
						
			});*/
			
			
			
		},
		
		load_results: function() { 
			$.get('dashboard/ajaxDisplayResults', function(o){
					$('#listInserts div').remove();
					$.each(o, function(key, val){
						$('#listInserts').append('<div id='+ val.id +'>ID: ' + val.id + ' Text: ' + val.text + ' <a href="#" class="delMe" id="'+ val.id +'">X</a></div>');
					});
					
			},'json');
		},
		
		delete_record: function(id){ 
			$.ajax({
				url: 'dashboard/ajaxDelete',
				type: 'POST',
				data: data = {'id':id},
				success: function(r){
					$('#listInserts').find('div#'+id).remove();
					}
				})
		},
		
		uploadify_swf_url:	'http://triad-cycles.com/views/dashboard/includes/uploadify/uploadify.swf',
		uploadify_php_url:	'http://triad-cycles.com/views/dashboard/includes/uploadify/uploadify.php',
		uploadify_php_slides_url:	'http://triad-cycles.com/views/dashboard/includes/uploadify/uploadify-slides.php',
		dashboard_url : 'http://triad-cycles.com/dashboard/'
		
		
	}