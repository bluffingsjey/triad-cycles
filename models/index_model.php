<?php

class Index_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/*
	*	save email data
	*/
	public function email($email) {

		$this->DB->insert('messages',array(
			'name'		=>	$email['name'],
			'email'		=>	$email['email'],
			'tel_no'	=>	$email['tel_no'],
			'message'	=>	$email['message'],
			'date'		=>	$email['date']
		));
		
	}
	
}