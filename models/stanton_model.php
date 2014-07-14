<?php

class Stanton_Model extends Model {
	
	private $_stanton_id = 3;
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
	/*
	*	Stanton product list
	*/
	public function listProduct() {
		$sth = $this->DB->prepare("SELECT * 	
				FROM products a 
				LEFT JOIN product_thumb b
				ON a.product_id = b.thumb_product_id
				WHERE product_brand = :id");
		$sth->execute(array(':id'=>$this->_stanton_id));
		return $sth->fetchAll();	
	}
	
	/*
	*	Stanton Product name
	*/
	public function singleProduct($product_id) {
		$sth = $this->DB->prepare("SELECT * 	
				FROM products 
				WHERE product_id = :id");
		$sth->execute(array(':id'=>$product_id));
		return $sth->fetchAll();
	}
	
	/*
	*	Stanton Product Slideshows
	*/
	public function slideshows($product_id) {
		$sth = $this->DB->prepare("SELECT *
				FROM product_slideshow 
				WHERE slide_product_id = :id");
		$sth->execute(array(':id'=>$product_id));
		return $sth->fetchAll();
	}
	
}