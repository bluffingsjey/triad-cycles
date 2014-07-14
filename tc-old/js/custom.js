$("document").ready(function() {
	// cache the window object
   $window = $(window);
	tb.init();
});

var tb = {
	
	init:function(){
		$('.parallax_bg').each(function(){
		 // declare the variable to affect the defined data-type
		 var $scroll = $(this);
						 
		  $(window).scroll(function() {
			// HTML5 proves useful for helping with creating JS functions!
			// also, negative value because we're scrolling upwards                             
			var yPos = -($window.scrollTop() / $scroll.data('speed')); 
			 
			// background position
			var coords = '50% '+ yPos + 'px';
	 
			// move the background
			$scroll.css({ backgroundPosition: coords });    
		  }); // end window scroll
	   });  // end section function
	   
	   
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