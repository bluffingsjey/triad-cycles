<?php

/*
*	CONFIGURATION FILE
*	This is the main config setup of the system
*/

date_default_timezone_set('Asia/Manila');

// PATHS
// Alway provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://triad-cycles.com/');

// Server directory
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

// Library path of the MVC
define('LIBS', 'libs/');
define("TIMESTAMP", date("Y-m-d H:i:s"));


// DATABASE Authentications
// Change this for database configurations
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','jaysonsa_tc');
define('DB_USER','jaysonsa');
define('DB_PASS','S0nj@y22866');

// HASH KEY CONSTANTS
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY','mixitup');

// This is for database passwords only
define('HASH_PASSWORD_KEY','catsflyhigh200miles');


// SMTP
define('SMTP_HOST', 'smtp.triad-cycles.com');


