<link rel="stylesheet" href="<?php echo URL; ?>public/css/dashboard.css" />
<link rel="stylesheet" href="<?php echo URL; ?>views/dashboard/includes/uploadify/uploadify.css" />
<link rel="stylesheet" href="<?php echo URL; ?>views/dashboard/includes/jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" />
<script type="text/javascript" src="<?php echo URL; ?>views/dashboard/includes/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>views/dashboard/includes/jquery.imgareaselect-0.9.10/scripts/jquery.imgareaselect.min.js"></script>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://getbootstrap.com/examples/dashboard/#">Triad Cycles</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo URL; ?>login">Logout</a></li>
      </ul>
      <!--<form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form>-->
      
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <!--<ul class="nav nav-sidebar">
        <li><a href="">Overview</a></li>
        <li><a href="">Reports</a></li>
        <li><a href="">Analytics</a></li>
        <li><a href="">Export</a></li>
      </ul>-->
      <ul class="nav nav-sidebar">
        <li <?php $class = ($url == URL.'dashboard/pages/users' || $url == URL.'dashboard/pages/users-edit' ? 'active' : 'inactive'); ?> class="<?php  echo $class; ?>"><a href="<?php echo URL ?>dashboard/pages/users">Users</a></li>
        <li <?php $class = ($url == URL.'dashboard/pages/brands' || $url == URL.'dashboard/pages/brands-edit' ? 'active' : 'inactive'); ?> class="<?php echo $class; ?>"><a href="<?php echo URL ?>dashboard/pages/brands">Brands</a></li>
        <li <?php $class = ($url == URL.'dashboard/pages/products' || $url == URL.'dashboard/pages/products-edit' ? 'active' : 'inactive'); ?> class="<?php echo $class; ?>"><a href="<?php echo URL ?>dashboard/pages/products">Products</a></li>
        <li <?php $class = ($url == URL.'dashboard/pages/thumbnails' || $url == URL.'dashboard/pages/thumbnails-edit' ? 'active' : 'inactive'); ?> class="<?php echo $class; ?>"><a href="<?php echo URL ?>dashboard/pages/thumbnails">Thumbnails</a></li>
        <li <?php $class = ($url == URL.'dashboard/pages/slideshows' || $url == URL.'dashboard/pages/slideshows-edit' ? 'active' : 'inactive'); ?> class="<?php echo $class; ?>"><a href="<?php echo URL ?>dashboard/pages/slideshows">Slideshows</a></li>
      </ul>
     <!-- <ul class="nav nav-sidebar">
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
      </ul>-->
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">