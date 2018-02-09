<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	Public function __construct() {
		parent:: __construct();
		$this->load->model('model_cust');
		$this->load->library('cart');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!$this->session->userdata('email')){
			$this->data['content_header'] = $this->header;
			$this->data['content_sponsor'] = $this->sponsor;

			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required|alpha_numeric|md5');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('form_login', $this->data);
			} else {
				$this->load->model('model_cust');
				$valid_user = $this->model_cust->check_credential();

				if($valid_user == FALSE)
				{
					$this->session->set_flashdata('error','Wrong Email / Password!');
					redirect('login');
				} else {
					// if the username and password is a match
					$this->session->set_userdata('fname', $valid_user->fname);
					$this->session->set_userdata('email', $valid_user->email);
					$this->session->set_userdata('groups', $valid_user->groups);

					switch($valid_user->groups){
						case 1 : //admin
									redirect('admin/products');
									break;
						case 2 : //member
									redirect('store');
									break;
						default: break;
					}
				}
			}
		} else {
			redirect('home');
		}
	}
}
