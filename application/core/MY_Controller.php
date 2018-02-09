<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

	protected $header;
	protected $sponsor;
	function __construct(){
		parent::__construct();

		$this->load->model('model_header');

		$this->getHeader();

		$this->load->model('model_sponsor');

		$this->getSponsor();
	}

	public function getHeader(){
		$this->header = $this->model_header->get_header();
	}

	public function getSponsor(){
		$this->sponsor = $this->model_sponsor->get_sponsor();
	}
}

class MY_Admin_Controller extends CI_Controller {
		protected $data;

		public function __construct() {
			parent::__construct();

			ini_set('memory_limit', '2048M');

			date_default_timezone_set('Asia/Jakarta');

			$this->load->database();

			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->library('site_sentry');
			$this->load->library('layout');
			$this->load->library('upload');

			$this->load->helper('array');
			$this->load->helper('date');
			$this->load->helper('file');
			$this->load->helper('form');
			$this->load->helper('string');
			$this->load->helper('text');
			$this->load->helper('url');

			$this->layout->set_data($this->data);
			$this->layout->set_masterpage('admin/master');

			$this->data['username'] = $this->session->userdata('username');

			// a list of unlocked (ie: not password protected) controllers.  We assume
			// controllers are locked if they aren't explicitly on this list
			$unlocked = array('login');

			if ( ! $this->site_sentry->is_logged_in() AND ! in_array(strtolower(get_class($this)), $unlocked)) {
				redirect('admin/login');
			}

			if ( $this->site_sentry->is_logged_in() AND in_array(strtolower(get_class($this)), $unlocked)) {
				redirect('admin/dashboard');
			}
		}
	}
?>
