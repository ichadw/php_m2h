<?php if( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );

class My_auth{
	var $CI;
	
	function __construct(){
		$this->CI = &get_instance();
	}
	
	public function secure(){
		if(!$this->isLogged()){
			$this->CI->session->sess_destroy();
			redirect(base_url().'admin/login/expired', 'refresh');
		}
	}
	
	public function isLogged(){
		return $this->CI->session->userdata('logged');
	}
	
	public function hash1($pass){
		return hash('sha256', $pass);
	}
	
	public function hash2($usr,$pass){
		$char = substr($usr,0,2);
		return md5(sha1(base64_encode($pass.$char)));
	}
}
