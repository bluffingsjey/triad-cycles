<?php

class Dashboard_Model extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	/*
	*	Fetch all users
	*/
	public function userList() 
	{
		$sth = $this->DB->prepare("SELECT id, username, role FROM users");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Add users from dashboard
	*/
	public function create($data) 
	{
		$this->DB->insert('users',array(
			'username'		=>	$data['username'],
			'password'	=>	Hash::create('sha256',$data['password'],HASH_PASSWORD_KEY),
			'role'		=>	$data['role']
		));
		
	}
	
	/*
	*	Delete user from dashboard
	*/
	public function deleteUser($id) {
		$sth = $this->DB->prepare("DELETE FROM users WHERE id = :id");
		$sth->execute(array(':id' => $id));
	}
	
	/*
	*	Update user from dashboard
	*/
	public function editSave($data) 
	{
		$postData = array(
			'username'		=>	$data['username'],
			'password'	=>	Hash::create('sha256',$data['password'],HASH_PASSWORD_KEY),
			'role'		=>	$data['role']
		);
		
		$this->DB->update('users',$postData,"`id` = {$data['id']}");
		
	}
	
	/*
	*	Fetch all the users based by ID
	*/
	public function userSingleList($id) 
	{	
		$sth = $this->DB->prepare("SELECT id, username, role FROM users WHERE id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	
	
	/*
	*	Fetch all brands
	*/
	public function brandList() 
	{
		$sth = $this->DB->prepare("SELECT brand_id, brand_name, brand_description FROM brands");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Add brand from dashboard
	*/
	public function createBrand($data) 
	{
		$this->DB->insert('brands',array(
			'brand_name'		=>	$data['brand_name'],
			'brand_description'	=>	$data['brand_description']
		));
		
	}
	
	/*
	*	Delete brand from dashboard
	*/
	public function deleteBrand($id) {
		$sth = $this->DB->prepare("DELETE FROM brands WHERE brand_id = :id");
		$sth->execute(array(':id' => $id));
	}
	
	/*
	*	Update brand from dashboard
	*/
	public function editSaveBrand($data) 
	{
		$postData = array(
			'brand_name'		=>	$data['brand_name'],
			'brand_description'	=>	$data['brand_description']
		);
		
		$this->DB->update('brands',$postData,"`brand_id` = {$data['brand_id']}");
		
	}
	
	/*
	*	Fetch all the brand based by ID
	*/
	public function brandSingleList($id) 
	{	
		$sth = $this->DB->prepare("SELECT brand_id, brand_name, brand_description FROM brands WHERE brand_id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	/*
	*	Fetch brand_name based by ID
	*/
	public function brandName($id) 
	{	
		$sth = $this->DB->prepare("SELECT brand_name FROM brands WHERE brand_id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	
	
	
	
	
	/*
	*	Fetch all products
	*/
	public function productList() 
	{
		$sth = $this->DB->prepare("SELECT product_id, product_name, product_description, product_short_desc, product_brand FROM products");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Fetch all products with all brands
	*/
	public function productListBrand() 
	{
		$sth = $this->DB->prepare("SELECT 
				*
				FROM products a
				LEFT JOIN brands b
				ON a.product_brand = b.brand_id
				LEFT JOIN product_thumb c 
				ON c.thumb_product_id = a.product_id
				LEFT JOIN product_slideshow d
				ON d.slide_product_id = a.product_id
				GROUP BY a.product_id DESC
				");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Add products from dashboard
	*/
	public function createProduct($data) 
	{
		$this->DB->insert('products',array(
			'product_name'			=>	$data['product_name'],
			'product_description'	=>	$data['product_description'],
			'product_short_desc'	=>	$data['product_short_desc'],
			'product_brand'			=>	$data['product_brand']
		));
		
	}
	
	/*
	*	Delete products from dashboard
	*/
	public function deleteProduct($id) {
		$sth = $this->DB->prepare("DELETE FROM products WHERE product_id = :id");
		$sth->execute(array(':id' => $id));
	}
	
	/*
	*	Update products from dashboard
	*/
	public function editSaveProduct($data) 
	{
		$postData = array(
			'product_name'			=>	$data['product_name'],
			'product_description'	=>	$data['product_description'],
			'product_short_desc'	=>	$data['product_short_desc'],
			'product_brand'			=>	$data['product_brand']
		);
		
		$this->DB->update('products',$postData,"`product_id` = {$data['product_id']}");
		
	}
	
	/*
	*	Fetch all the products based by ID
	*/
	public function productSingleList($id) 
	{	
		$sth = $this->DB->prepare("SELECT product_id, product_name, product_description, product_short_desc, product_brand FROM products WHERE product_id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	
	
	/*
	*	Add slideshow from dashboard
	*/
	public function createSlideshow($data) 
	{
		$this->DB->insert('product_slideshow',array(
			'slide_product_id'			=>	$data['slide_product_id'],
			'slide_file_location'		=>	$data['slide_file_location'],
			'slide_date_uploaded'		=>	date("Y-m-d")
		));
		
	}
	
	
	
	
	/************ THUMBNAIL MODELS *************/
	
	/*
	*	Fetch all thumbnails
	*/
	public function thumbList() 
	{
		$sth = $this->DB->prepare("SELECT thumb_id, thumb_product_id, thumb_img_file_location, thumb_date_uploaded FROM product_thumb");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Fetch all thumbnail with all brands
	*/
	public function thumbListProduct() 
	{
		$sth = $this->DB->prepare("SELECT 
				product_thumb.thumb_id, 
				products.product_name,
				products.product_id, 
				product_thumb.thumb_img_file_location, 
				product_thumb.thumb_date_uploaded
				FROM product_thumb LEFT JOIN products
				ON product_thumb.thumb_product_id = products.product_id
				");
		$sth->execute();
		return $sth->fetchAll();	
	}
	
	/*
	*	Add thumbnail from dashboard and add the thumbnail directory
	*/
	public function createThumbnail($data) 
	{
		$this->DB->insert('product_thumb',array(
			'thumb_product_id'			=>	$data['thumb_product_id'],
			'thumb_img_file_location'	=>	$data['thumb_img_file_location'],
			'thumb_date_uploaded'		=>	$data['thumb_date_uploaded']
		));
				
	}
	
	/*
	*	Delete thumbnail from dashboard
	*/
	public function deleteThumbnail($id) {
		$sth = $this->DB->prepare("DELETE FROM product_thumb WHERE thumb_product_id = :id");
		$sth->execute(array(':id' => $id));
	}
	
	
	/*
	*	Delete thumbnail from dashboard
	*/
	public function deleteSlideshows($id) {
		$sth = $this->DB->prepare("DELETE FROM product_slideshow WHERE slide_product_id = :id");
		$sth->execute(array(':id' => $id));
	}
	
	/*
	*	Update thumbnail from dashboard
	*/
	public function editSaveThumnail($data) 
	{
		$postData = array(
			'thumb_product_id'			=>	$data['thumb_product_id'],
			'thumb_img_file_location'	=>	$data['thumb_img_file_location'],
			'thumb_date_uploaded'		=>	$data['thumb_date_uploaded']
		);
		
		$this->DB->update('product_thumb',$postData,"`thumb_id` = {$data['thumb_id']}");
		
	}
	
	/*
	*	Fetch all the thumbnail based by ID
	*/
	public function thumbSingleList($id) 
	{	
		$sth = $this->DB->prepare("SELECT 
						product_thumb.thumb_id, 
						product_thumb.thumb_product_id, 
						product_thumb.thumb_img_file_location, 
						product_thumb.thumb_date_uploaded,
						products.product_name 
						FROM product_thumb LEFT JOIN products
						ON product_thumb.thumb_product_id = products.product_id
						WHERE thumb_id = :id");
		$sth->execute(array(':id'=>$id));
		return $sth->fetch();
	}
	
	
	
	function ajaxInsert() {
		
		$text = $_POST['text'];
		
		$sth = $this->DB->prepare("INSERT INTO data (text) VALUES(:text)");
		$sth->execute(array(':text'=>$text));
		
		return $data = $this->ajaxGetData();
	}
	
	function ajaxGetData(){
		
		$sth = $this->DB->prepare("SELECT * FROM data");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data =  $sth->fetchAll();
		echo json_encode($data);
	}
	
	function ajaxDelete(){
		
		$id = $_POST['id'];
		
		$sth = $this->DB->prepare("DELETE FROM data WHERE id = :id");
		$sth->execute(array(':id'=>$id));
	}
	
	public function ajaxPoll() {
		$action = $_POST['action'];
		if($action = 'checksession') {
			!isset($_SESSION['loggedIn']) ? $err = 1 : $err = 0;
			$response = array('err' => $err);
		}
		echo json_encode($response);
	}
	
	public function ajaxHome() {
		header('location: ../login');
	}
	
}