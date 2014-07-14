<?php

class Visit extends Controller {
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
	
	public function index() {
		
		$this->view->render('visit/visit-us');
		
	}
	
}