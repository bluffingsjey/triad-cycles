<?php

class Dashboard extends Controller {
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if($logged == false) {
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		
		$this->view->js = array('dashboard/js/default.js');
		$this->view->validate = array('dashboard/js/validate.js');
	}
	
	function index() {
		
		$this->view->userList = $this->model->userList();
		$this->view->render('dashboard/index');
	}
	
	/*
	*	Replace the space of a string to a underscore
	*/
	private function replaceSpaces($string) {
		return str_replace("_"," ",$srting);
	}
	
	/*
	*	Replaces the underscores of a string to a space
	*/
	private function replaceUnderScores($string) {
		return str_replace(" ","_",$string);
	}
	
	/*
	*	Make a directory
	*/
	private function makeDirectory($directory) {
		if (!file_exists($directory)) {
			mkdir($directory, 0777, true);
			return $directory;
		}
	}
	
	/*
	*	Make a directory for uploaded thumbnails
	*/
	public function makeDirectoryThumb() {
		
		$old = getcwd(); //save the current directory
		$path_to_file = ROOT_DIR."/uploads/products/thumbs/";
		chdir($path_to_file);
		
		$dir = ROOT_DIR.'/uploads/products/thumbs/'.$_POST['product_id'];
		
		$this->makeDirectory($dir);
		
		chdir($old); // restore the old directory
		
		return $_POST['product_id'];
	}
	
	/*
	*	Make a directory for uploaded slideshows
	*/
	public function makeDirectorySlideshows() {
		
		$old = getcwd(); //save the current directory
		$path_to_file = ROOT_DIR."/uploads/products/slideshows/";
		chdir($path_to_file);
		
		$dir = ROOT_DIR.'/uploads/products/slideshows/'.$_POST['product_id'];
		
		$this->makeDirectory($dir);
		
		chdir($old); // restore the old directory
		
		return $_POST['product_id'];
	}
	
	/*
	* Delete a directory and file
	*/
	function removeDirectory($dir) { 
	   if (is_dir($dir)) { 
		 $objects = scandir($dir); 
		 foreach ($objects as $object) { 
		   if ($object != "." && $object != "..") { 
			 if (filetype($dir."/".$object) == "dir") removeDirectory($dir."/".$object); else unlink($dir."/".$object); 
		   } 
		 } 
		 reset($objects); 
		 rmdir($dir); 
	   } 
	 } 
	
	
	/*
	*	Render the dashboard pages
	*/
	function pages($page){
		switch($page) {
			case 'users':
				$this->view->userList = $this->model->userList();
				$this->view->render('dashboard/users');
			break;
			
			case 'users-edit':
				$this->view->render('dashboard/users-edit');
			break;
			
			case 'brands':
				$this->view->brandList = $this->model->brandList();
				$this->view->render('dashboard/brands');
			break;
			
			case 'brands-edit':
				$this->view->brandList = $this->model->brandList();
				$this->view->render('dashboard/brands-edit');
			break;
			
			case 'products':
				$this->view->productList = $this->model->productListBrand();
				$this->view->brandList = $this->model->brandList();
				$this->view->render('dashboard/products');
			break;
			
			case 'products-edit':
				$this->view->productList = $this->model->productList();
				$this->view->render('dashboard/products-edit');
			break;
			
			case 'thumbnails':
				$this->view->productList = $this->model->productList();
				$this->view->thumbList = $this->model->thumbListProduct();
				$this->view->render('dashboard/thumbs');
			break;
			
			case 'thumbnails-edit':
				$this->view->productList = $this->model->productList();
				$this->view->thumbList = $this->model->thumbListProduct();
				$this->view->render('dashboard/thumbs-edit');
			break;
			
			case 'slideshows':
				$this->view->productList = $this->model->productList();
				$this->view->render('dashboard/slideshows');
			break;
			
			default:
			$this->index();
		}
	}
	
	
	/*************** USERS PAGE METHODS *************/
	
	/*
	*	Add User from users dashboard
	*/
	public function addUser() {
		
		$data = array();
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking
		$this->model->create($data);
		
		header('location: '.URL.'dashboard/pages/users');
	}
	
	/*
	*	Delete user from dashboard
	*/
	public function deleteUser($id) {
		$this->model->deleteUser($id);
		header('location: '.URL.'dashboard/pages/users');
	}
	
	/*
	*	Render the edit user on the dashboard
	*/
	public function edit($id) {
		// fetch individual user
		$this->view->userSingle = $this->model->userSingleList($id);
		$this->view->render('dashboard/users-edit');
	}
	
	/*
	*	Update user from dashboard
	*/
	public function editSave($id) {
		$data = array();
		$data['id']	= $id;
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking
		$this->model->editSave($data);
		header('location: '.URL.'dashboard/pages/users');
	}
	
	
	
	/************ BRAND PAGE METHODS ***********/
	
	/*
	*	Add brand from users dashboard
	*/
	public function addBrand() {
		
		$data = array();
		$data['brand_name'] = $_POST['brand_name'];
		$data['brand_description'] = $_POST['brand_description'];
		
		// @TODO: Do your error checking
		$this->model->createBrand($data);
		
		header('location: '.URL.'dashboard/pages/brands');
	}
	
	/*
	*	Delete brand from dashboard
	*/
	public function deleteBrand($id) {
		$this->model->deleteBrand($id);
		header('location: '.URL.'dashboard/pages/brands');
	}
	
	/*
	*	Render the edit brand on the dashboard
	*/
	public function editBrand($id) {
		// fetch individual user
		$this->view->brandSingle = $this->model->brandSingleList($id);
		$this->view->render('dashboard/brands-edit');
	}
	
	/*
	*	Update brand from dashboard
	*/
	public function editSaveBrand($id) {
		$data = array();
		$data['brand_id']	= $id;
		$data['brand_name'] = $_POST['brand_name'];
		$data['brand_description'] = $_POST['brand_description'];
		
		// @TODO: Do your error checking
		$this->model->editSaveBrand($data);
		header('location: '.URL.'dashboard/pages/brands');
	}
	
	
	
	
	
	/********* PRODUCT PAGE METHODS **********/
	
	/*
	*	Add product from users dashboard
	*/
	public function addProduct() {
		
		$data = array();
		$data['product_name'] = $_POST['product_name'];
		$data['product_description'] = $_POST['product_description'];
		$data['product_short_desc'] = $_POST['product_short_desc'];
		$data['product_brand'] = $_POST['product_brand'];
		
		// @TODO: Do your error checking
		$this->model->createProduct($data);
		
		header('location: '.URL.'dashboard/pages/products');
	}
	
	/*
	*	Delete product from dashboard
	*/
	public function deleteProduct($id) {
		$this->model->deleteProduct($id);
		header('location: '.URL.'dashboard/pages/products');
	}
	
	/*
	*	Render the edit product on the dashboard
	*/
	public function editProduct($id) {
		// fetch individual user
		$this->view->brandList = $this->model->brandList();
		$this->view->productSingle = $this->model->productSingleList($id);
		$this->view->render('dashboard/products-edit');
	}
	
	/*
	*	select the img product on the dashboard
	*/
	public function productListImg($id) {
		// fetch individual user
		return $this->model->productListImg($id);
	}
	
	
	
	/*
	*	Update product from dashboard
	*/
	public function editSaveProduct($id) {
		$data = array();
		$data['product_id']	= $id;
		$data['product_name'] = $_POST['product_name'];
		$data['product_description'] = $_POST['product_description'];
		$data['product_short_desc'] = $_POST['product_short_desc'];
		$data['product_brand'] = $_POST['product_brand'];
		
		// @TODO: Do your error checking
		$this->model->editSaveProduct($data);
		header('location: '.URL.'dashboard/pages/products');
	}
	
	
	
	
	
	
	/******** THUMBNAIL PAGE METHODS *************/
	
	/*
	*	Add thumbnail from users dashboard
	*/
	public function addProductThumb($product_id) {
		
		$this->view->product_id = $product_id;
		$this->view->productList = $this->model->productSingleList($product_id);
		$this->view->render('dashboard/thumbs');
	
	}
	
	
	/*
	*	Add thumbnail from users dashboard
	*/
	public function addThumbnail() {
		
		$data = array();
		$data['thumb_product_id'] = $_POST['thumb_product_id'];
		$data['thumb_img_file_location'] = $_POST['thumb_img_file_location'];
		$data['thumb_date_uploaded'] = $_POST['thumb_date_uploaded'];
		
		// @TODO: Do your error checking
		$this->model->createThumbnail($data);
		
		/*if(isset($_POST['thumb_product_id'])) {
			$product_dir = $_POST['thumb_product_id'].'/thumb_'.$_POST['thumb_product_id'];
			$this->makeDirectory(ROOT_DIR.'/uploads/products/'.$product_dir);
		}*/
		
		header('location: '.URL.'dashboard/pages/products');
	}
	
	/*
	*	Delete thumbnails from dashboard
	*/
	public function deleteThumbnail($id) {
		
		$this->model->deleteThumbnail($id);
		
		$thumb_img = ROOT_DIR.'/uploads/products/thumbs/'.$id;
		
		header('location: '.URL.'dashboard/pages/products');
	}
	
	/*
	*	Delete Slideshows from dashboard
	*/
	public function deleteSlideshows($id) {
		
		$this->model->deleteSlideshows($id);
		
		$thumb_img = ROOT_DIR.'/uploads/products/slideshows/'.$id;
		
		header('location: '.URL.'dashboard/pages/products');
	}
	
	/*
	*	Delete the thumbnails img
	*/
	public function deleteImg() {
		
		$directory = ROOT_DIR.'/uploads/products/thumbs/'.$_POST['product_id'].'/';
		
		$this->removeDirectory($directory);
	
	}
	
	/*
	*	Render the edit thumbnails on the dashboard
	*/
	public function editThumbnail($id) {
		// fetch individual user
		$this->view->thumbSingle = $this->model->thumbSingleList($id);
		$this->view->render('dashboard/thumbs-edit');
	}
	
	
	
	/*
	*	Update thumbnails from dashboard
	*/
	public function editSaveThumbnail($id) {
		$data = array();
		$data['thumb_id']	= $id;
		$data['thumb_product_id'] = $_POST['thumb_product_id'];
		$data['thumb_img_file_location'] = $_POST['thumb_img_file_location'];
		$data['thumb_date_uploaded'] = $_POST['thumb_date_uploaded'];
		
		// @TODO: Do your error checking
		$this->model->editSaveThumnail($data);
		header('location: '.URL.'dashboard/pages/thumbnails');
	}
	
	
	/*
	*	Save image thumbnail
	*/
	public function saveImage() {
		
		$data = array(
			'x1' 		=> $_POST['x1'],
			'y1' 		=> $_POST['y1'],
			'x2' 		=> $_POST['x2'],
			'y2' 		=> $_POST['y2'],
			'w' 		=> $_POST['w'],
			'h' 		=> $_POST['h'],
			'img_loc'	=> $_POST['img_loc'],
			'product_id'	=>	$_POST['product_id']
		);
		
		//Scale the image to the 100px by 100px  
		$scale = 200/$data['w'];  
		$cropped = $this->resizeThumbnailImage($data['img_loc'], $data['img_loc'], $data['w'],$data['h'],$data['x1'],$data['y1'], $scale);
		
		//create directory
		//$dir_name = ROOT_DIR.'/uploads/products/thumbs/'.$data['product_id'];
		//$this->makeDirectory($dir_name);
		
	}
	
	/*
	*	Image Resizer
	*/
	private function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);
		
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$thumb_image_name); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$thumb_image_name,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$thumb_image_name);  
				break;
		}
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
	}
	
	
	
	/************** SLIDE SHOW PAGE METHODS **************/
	
	
	/*
	*	Add thumbnail from users dashboard
	*/
	public function addProductSlideshow($product_id) {
		
		$this->view->product_id = $product_id;
		$this->view->productList = $this->model->productSingleList($product_id);
		$this->view->render('dashboard/slideshows');
	
	}
	
	
	/*
	*	Add slideshow from users dashboard
	*/
	public function addSlideshow() {
		
		$data = array();
		$data['slide_product_id'] = $_POST['slide_product_id'];
		$data['slide_file_location'] = $_POST['slide_file_location'];
		$data['slide_date_uploaded'] = $_POST['slide_date_uploaded'];
		
		// @TODO: Do your error checking
		$this->model->createSlideshow($data);
	}
	
	/*
	*	Redirect the product slideshow page
	*/
	public function redirectPage() {
		header('location: '.URL.'dashboard/pages/products');
	}
	
	
	/*
	*	Public header hide
	*	param $dashboard_url array
	*	param $url
	*/
	public static function hideHeader($dashboard_url,$url) {
		$i = 0;
		$c = count($dashboard_url);
		while ($i < $c) {
			$a = $dashboard_url[$i];
			return ($url==$a) ? 'style="display:block; "' : 'style="display:none; "';
			$i++;
		}
	}
	
	function logout(){
		Session::destroy();
		header('location:'.URL.'login');
		exit;
	}
	
	function ajaxInsert() {
		$this->model->ajaxInsert();
	}
	
	function ajaxDisplayResults(){
		$this->model->ajaxGetData();
	}
	
	function ajaxDelete() {
		$this->model->ajaxDelete();
	}
	
	function ajaxHome() {
		$this->model->ajaxHome();
	}
	
	function ajaxPoll() {
		$this->model->ajaxPoll();
	}
}