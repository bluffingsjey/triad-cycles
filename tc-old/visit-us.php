<?php include_once("includes/header.php"); ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	function initialize() {
		var map_canvas = document.getElementById('map_canvas');
		var mapOptions = {
			  center: new google.maps.LatLng(44.5403, -78.5463),
			  zoom: 8,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
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
        	<div id="map_canvas"></div>
            <div class="jumbotron well well-sm white-bg">
                <h1>VISIT US</h1>
                
                <div class="row">
                    <div class="col-sm-12">
                        <address>
                            <p><strong>Address:</strong> # 14 Quezon Ave., Brgy Dona Josefa, Quezon City, Metro Manila Philippines 1113</p>
                            <p><strong>Tel #:</strong> 632 749-4701, 632 412-3994</p>
                            <p><strong>Cel #:</strong> 63 917 854 9922</p>
                            <p><strong>Email:</strong> <a href="#">lester.barretto@triad-cycles.com</a></p>
                        </address>
                    </div>
                </div>    
                
                <div class="row">
                	<div class="col-sm-10 col-sm-offset-1 well well-lg">
                        <h2>Contact Us!</h2>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control input-lg" type="text" placeholder="Name and Surname">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control input-lg" type="email" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control input-lg" type="tel" placeholder="Telephone">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control input-lg" placeholder="Message" cols="40" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-primary btn-lg">Send</button>
                            </div>
                          </div>
                    </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php include_once("includes/footer.php"); ?>