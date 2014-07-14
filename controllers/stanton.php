<?php

class Stanton extends Controller {
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
	
	/*
	* 	Render the landing page for this class ("Brand")
	*/
	public function index() {
	
		$this->view->products = $this->model->listProduct();
		$this->view->render('stanton/stanton');
	
	}
	
	/*
	*	Render the product page for this class("Brand")
	*/
	public function product($product_id) {
	
		$this->view->productSlideshow = $this->model->slideshows($product_id);	
		$this->view->productName = $this->model->singleProduct($product_id);
		$this->view->render('stanton/product');

	}
	
}