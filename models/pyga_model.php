<?php

class Pyga_Model extends Model {
	
	private $_pyga_id = 1;
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
	/*
	*	Pyga product list
	*/
	public function listProduct() {
		$sth = $this->DB->prepare("SELECT * 	
				FROM products a 
				LEFT JOIN product_thumb b
				ON a.product_id = b.thumb_product_id
				WHERE product_brand = :id");
		$sth->execute(array(':id'=>$this->_pyga_id));
		return $sth->fetchAll();	
	}
	
	/*
	*	Product name
	*/
	public function singleProduct($product_id) {
		$sth = $this->DB->prepare("SELECT * 	
				FROM products 
				WHERE product_id = :id");
		$sth->execute(array(':id'=>$product_id));
		return $sth->fetchAll();
	}
	
	/*
	*	Product Slideshows
	*/
	public function slideshows($product_id) {
		$sth = $this->DB->prepare("SELECT *
				FROM product_slideshow 
				WHERE slide_product_id = :id");
		$sth->execute(array(':id'=>$product_id));
		return $sth->fetchAll();
	}
	
}