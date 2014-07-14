<?php

class Pyga extends Controller {
    
    public $product_title;
	
	/*
	*	The initial method
	*	Load the views for the controller
	*/
	public function __construct() {
		
		parent::__construct();
		
		$this->view->js = array('pyga/js/default.js');
		
	}
	
	/*
	* 	Render the landing page for this class ("Brand")
	*/
	public function index() {
	
		$this->view->products = $this->model->listProduct();
		$this->view->render('pyga/pyga');
	
	}
	
	/*
	*	Render the product page for this class("Brand")
	*/
	public function product($product_id) {
	
		$this->view->productSlideshow = $this->model->slideshows($product_id);	
		$this->view->productName = $this->model->singleProduct($product_id);
		$this->view->render('pyga/product');

	}
	
}