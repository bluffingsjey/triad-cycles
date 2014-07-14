<?php

class Login_Model extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function run() {
			
		$sth = $this->DB->prepare("SELECT id, role FROM users WHERE 
							username = :username AND password = :password");
		$sth->execute(array(
			':username'	=>	$_POST['login'],
			':password'	=>	Hash::create('sha256',$_POST['password'],HASH_PASSWORD_KEY)
		));
		
		$data = $sth->fetch();
		
		//$data = $sth->fetchAll();
		
		$count = $sth->rowCount();
		if($count > 0){
			//login
			Session::init();
			Session::set('role',$data['role']);
			Session::set('loggedIn',true);
			header('location: '.URL.'dashboard');
		} else {
			// show an error
			header('location: '.URL.'login'); 
		}
		
	}
	
}