<?php

class Index extends Controller {
	
	public function __construct() {
		parent::__construct();
		$this->view->js = array('index/js/default.js');
	}
	
	public function index(){
		//echo Hash::create('sha256','jesse',HASH_PASSWORD_KEY);
		$this->view->render('index/index');
	}
	
	public function details() {
		$this->view->render('index/index');
	}
	
	
	/*
	*	Send the email and save the record
	*/
	public function sendEmail() {
		
		$email = array(
			'name'		=>	$_POST['name'],
			'email'		=>	$_POST['email'],
			'tel_no'	=>	$_POST['tel_no'],
			'message'	=>	$_POST['message'],
			'date'		=>	TIMESTAMP
		);
		
		if(isset($email['email'])) {
			$this->email($email);
		}
		
		header('location: '.URL.'index');
	}
	
	/*
	*	The actual email method
	*/
	private function email($email) {
		
		include_once(ROOT_DIR."/phpmailer/class.phpmailer.php");
		include_once(ROOT_DIR."/phpmailer/class.smtp.php");
		include_once(ROOT_DIR."/phpmailer/class.pop3.php");
		
		$body = '<table style="width: 925px; height: auto; padding: 10px; margin: 0 auto; text-align:center;">';
		$body .= '<tr><td><img alt="Triad Cycles" src="'.URL.'public/images/logo-home-page-2.png" width="200" align="center" /></td></tr></table>';
		$body .= '<table style="width: 925px; height: auto; padding: 10px; margin: 0 auto; border:3px solid #DDD;">';
		$body .= '<tr style=" text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: bolder; padding: 10px; ">';
		$body .= '<td><strong style="font-size: 25px; text-align: center;">Triad Cycles Contact Us Message</strong></td></tr>';
		$body .= '<tr><td><br/>From: '.$email['name'].'<br/><br/></td></tr>';
		$body .= '<tr><td>Message: <br/>'.$email['message'].'</td></tr></table>';
		
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host = SMTP_HOST; // smtp server
		$mail->SMTPSecure = 'ssl'; 
		$mail->SMTPAuth = true; 
		$mail->Port = 465; 
		$mail->Username = "lester.barretto@triad-cycles.com";
		$mail->Password = "Lester3adcycles";
		$mail->AddAddress('lester.barretto@triad-cycles.com'); // the email address that will be recipient
		//ADD CC
		$mail->AddCC("salillasjayson@gmail.com");
		$mail->AddCC("lester.barretto@triad-cycles.com");
		$mail->SetFrom("lester.barretto@triad-cycles.com", "Triad Cycles");
		$mail->Subject = "Triad Cycles Contact Us Message";
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML($body);
		$mail->Send();
		$mail->ClearAddresses();	
		
		$this->model->email($email);
	}
	
}