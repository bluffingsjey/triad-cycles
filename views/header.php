<?php
function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}

$login_url = URL."login";
$dashboard_url = array(
	URL."dashboard",
	URL."dashboard/pages/users",
	URL."dashboard/edit/",
	URL."dashboard/pages/brands",
	URL."dashboard/editBrands",
	URL."dashboard/pages/products",
	URL."dashboard/editProducts",
	URL."dashboard/pages/thumbnails",
	URL."dashboard/editThumbnails",
	URL."dashboard/pages/slideshows",
	URL."dashboard/editSlideshows",
);
$url = curPageURL();

$i = 0;
$c = count($dashboard_url);
while ($i < $c) {
	$a = $dashboard_url[$i];
	if($url==$a || preg_match('/\bdashboard\b/i',$url)) {
		$display = 'style="display:none; "';
		$class_active = 'active';
		break;
	} else {
		$display ='style="display:block; "';
	}
	$i++;
}
    
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Triad Cycles: The triad is composed of three brothers passionate about the sport of mountain bikes. It is just with so much passion for riding that the brothers decided to bring in unique brands of mountain bikes, bikes that are raced and enjoyed globally.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRIAD CYCLES</title>
    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/custom.css"/>
    <link rel="shortcut icon" href="<?php echo URL; ?>public/images/favicon.png"/>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.lazyload.js"></script>
    
	<?php
		if(isset($this->js))
		{
			foreach($this->js as $js)
			{
				echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
			}
		}
	?>
</head>

<!--<div id="dvLoading">
    <img src="<?php echo URL; ?>public/images/loading.gif" />
</div>-->
<a name="top"></a>	
<body>

<!-- Fcebook SDK-->
<script>

$(document).ready(function(){
/*	
  window.fbAsyncInit = function() {
	FB.init({
	  appId      : 'triadcycles',
	  xfbml      : true,
	  version    : 'v2.0'
	});
	FB.ui(
	 {
	  method: 'feed',
	  name: 'The Facebook SDK for Javascript',
       caption: 'Bringing Facebook to the desktop and mobile web',
       description: (
          'A small JavaScript library that allows you to harness ' +
          'the power of Facebook, bringing the user\'s identity, ' +
          'social graph and distribution power to your site.'
       ),
       link: 'https://developers.facebook.com/docs/reference/javascript/',
       picture: 'http://www.fbrell.com/public/f8.jpg'
	 },
	 function(response) {
        if (response && response.post_id) {
          alert('Post was published.');
        } else {
          alert('Post was not published.');
        }
      }
	);
	FB.login(function(){
			FB.api('/me/feed', 'post', {message: 'Hello, world!'});	
		}, {scope: 'publish_actions'});
	  };

  (function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "//connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));   
   */
   
});  
</script>


    <div class="container">
    
    
    
    <div class="row main-logo-image" <?php if($url==$login_url){?>style="margin-top:110px;"<?php } ?> <?php echo $display; ?>>
    	<div class="media-img col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
    		<a href="<?php echo URL.'index' ?>"><img data-original="<?php echo URL; ?>public/images/logo-home-page-2.png" class="center-block img-responsive lazy"/></a>
        </div>
    </div>
    
    <nav class="navbar navbar-inverse" role="navigation" <?php if($url==$login_url){?>style="display:none"<?php } ?> <?php echo $display; ?>>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand main-logo-text" href="#">Triad Cycles</a>
        </div>
    
    	
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-justified bold-font">
            <li <?php $class = ($url == URL.'index' ? 'active' : 'inactive'); ?> class="<?php echo $class ?>"><a href="<?php echo URL; ?>index.php">HOME</a></li>
            <li <?php $class = ($url == URL.'about' ? 'active' : 'inactive'); ?> class="<?php echo $class ?>"><a href="<?php echo URL; ?>about">TRIAD CYCLES</a></li>
            <li <?php $class = ($url == URL.'pyga' || $url == URL.'ballistic' || $url == URL.'stanton' ? 'active' : 'inactive'); ?> class="dropdown <?php echo $class ?>">
              <a href="brands.php" class="dropdown-toggle" data-toggle="dropdown">BRANDS <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo URL; ?>pyga">Pyga Industries</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo URL; ?>ballistic">Ballistic Bikes</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo URL; ?>stanton">Stanton Bikes</a></li>
              </ul>
            </li>
            <li <?php $class = ($url == URL.'visit' ? 'active' : 'inactive'); ?> class="<?php echo $class ?>"><a href="<?php echo URL; ?>visit">VISIT US</a></li>
            <li <?php $class = ($url == URL.'news' ? 'active' : 'inactive'); ?> class="<?php echo $class ?>"><a href="<?php echo URL; ?>news">NEWS & EVENTS</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

<!--<body>
<?php Session::init(); ?>
<div id="header">
	Header
    <br/>
    <?php if (Session::get('loggedIn') == false): ?>	
        <a href="<?php echo URL; ?>index">Index</a>
        <a href="<?php echo URL; ?>help">About</a>
    <?php endif; ?>
	<?php if (Session::get('loggedIn') == true): ?>	
    	<a href="<?php echo URL; ?>dashboard">Dashboard</a>
        <?php if (Session::get('role') == 'owner'): ?>
        	<a href="<?php echo URL; ?>user">Users</a>
        <?php endif; ?>
    	<a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    <?php else: ?>
    	<a href="<?php echo URL; ?>login">Login</a>
    <?php endif; ?>    
</div>

<div id="content">-->


