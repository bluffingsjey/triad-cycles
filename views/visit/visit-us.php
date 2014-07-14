<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	function initialize() {
		var map_canvas = document.getElementById('map_canvas');
		var mapOptions = {
			  center: new google.maps.LatLng(44.5403, -78.5463),
			  //center: Manila,
			  zoom: 12,
			  mapTypeId: google.maps.MapTypeId.TERRAIN
			}
    	var map = new google.maps.Map(map_canvas, mapOptions);
	}	
	google.maps.event.addDomListener(window, 'load', initialize);	
</script>
<style>
#map_canvas {
	width: 100%;
	height: 400px;
}
</style>
	<div class="row well well-sm box-shadow">
    	<div class="col-lg-12 well-sm">
        	<div id="map_canvas" style="display:none;"></div>
			<!--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3860.596671568875!2d121.00650820000001!3d14.622037299999999!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1401590256403"  height="400" frameborder="0" style="border:0; width:100%;"></iframe>-->
            <iframe src="https://mapsengine.google.com/map/embed?mid=z9uw3QphADAc.k6S9SW63ZhuA" width="100%" height="550"></iframe>
            <div class="jumbotron well well-sm white-bg">
                <h1>VISIT US</h1>
                
                <div class="row">
                    <div class="col-sm-12">
                        <address>
                            <p><strong>Address:</strong> # 14 Quezon Ave., Brgy Dona Josefa, Quezon City, Metro Manila Philippines 1113</p>
                            <p><strong>Tel #:</strong> 632 749-4701, 632 412-3994</p>
                            <p><strong>Cel #:</strong> +63 917 854 9922</p>
                            <p><strong>Email:</strong> lester.barretto@triad-cycles.com</p>
                        </address>
                    </div>
                </div> 
                
            </div>
        </div>
    </div>