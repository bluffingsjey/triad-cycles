$("document").ready(function() {
    // cache the window object
    $window = $(window);
    tb.init();
    //$('.container').hide();
});

var tb = {
	
	init:function(){
          
	   $('img').lazyload({
		
			effect : "fadeIn"   
		   
		});
	   
	   $('.adjust').hover(function(e){
		   e.stopPropagation();
			
			var id = $(this).attr("id");
			
			$(".img-animation-"+id).css({
				"-webkit-transform": "scale(1.15, 1.15)",
				"-webkit-transition-timing-function": "ease-out",
				"-webkit-transition-duration": "1500ms",
				"-moz-transform": "scale(1.15, 1.15)",
				"-moz-transition-timing-function": "ease-out",
				"-moz-transition-duration": "1500ms",
				"transform": "scale(1.15, 1.15)",
				"transition-timing-function": "ease-out",
				"transition-duration": "1500ms",
				"position": "relative",
				"z-index": "3"
	   		});
			
			$('.img-overlay-'+id).css({
				"padding-top":"25%",
				"opacity":"1",
				"visibility":"visible"
				});   
				
		},function(e){
			 e.stopPropagation();
			 
			 var id = $(this).attr("id");
			 
		   	$(".img-animation-"+id).css({
				"-webkit-transform": "scale(1, 1)",
				"-webkit-transition-timing-function": "ease-out",
				"-webkit-transition-duration": "2000ms",
				"-moz-transform": "scale(1, 1)",
				"-moz-transition-timing-function": "ease-out",
				"-moz-transition-duration": "2000ms",
				"transform": "scale(1, 1)",
				"transition-timing-function": "ease-out",
				"transition-duration": "2000ms",
				"width": "100%",
				"height": "auto"
				});
				
			$('.img-overlay-'+id).css({
				"padding-top":"50%",
				"opacity":"0",
				"visibility":"hidden"
				}); 
		});
	}

}