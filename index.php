<?php

// Use an autoloader!

/*require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';*/
require 'config.php';

// Also spl_autoloader_register (Take a look at it if you like)
function __autoload($class) {
	$class = strtolower($class);
	require LIBS."{$class}.php";
}
//require 'libs/bootstrap.php';
//require 'libs/controller.php';
//require 'libs/model.php';
//require 'libs/view.php';
//
//// Library
//require 'libs/database.php';
//require 'libs/session.php';
//require 'libs/hash.php';


$app = new Bootstrap();