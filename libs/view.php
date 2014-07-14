<?php

class View {
	
	function __construct() {
		//echo "This is the view<br/>";
	}
	
	public function render($name, $noInclude = false) {
		
		ob_start();
		if($noInclude == true) {
			require 'views/' . $name . ".php";
		} else {
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
		ob_end_flush();
	}
}