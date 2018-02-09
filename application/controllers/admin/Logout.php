<?php
	class Logout extends MY_Admin_Controller {
		public function __construct() {
			parent:: __construct();
		}

		public function index() {
			$this->session->sess_destroy();
			//$this->session->destroy();
			redirect('admin/login');
		}
	}
?>
