<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Admin_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($_POST) {
			$this->site_sentry->login_routine();
		}

		//load message
		$this->data['username'] = $this->session->flashdata('login_username');
		$this->data['error'] = $this->session->flashdata('error');

		$this->load->view('admin/login', $this->data);
	}

	public function authentication(){
		$data 	= array();
		
		if($_POST){
			$this->load->library('form_validation');
			$this->load->library('my_auth');
			
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()){

				$username = filter_var(trim($this->input->post('username')), FILTER_SANITIZE_STRING);
				$password = filter_var(trim($this->input->post('password')), FILTER_SANITIZE_STRING);
				
				$this->db->where('username', $username);
				$this->db->where('password', $this->my_auth->hash1($password));
				$query = $this->db->get('user');	
				
				if($query->num_rows() > 0){
					$row = $query->row();
					$data = array(
						'id'   => $row->id,
						'username'	=> $row->username, // case sensitive
						'logged'	=> true
					);
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				}
				else{
					$data['error'] = 'Username and password not match!';
					$this->load->view('admin/login', $this->data);
				}

			}else{
				$data['error'] = 'Data not suffice!';
				$this->load->view('admin/login', $this->data);
			}
		}
	}
	
	public function expired(){
		$this->session->sess_destroy();
		redirect('admin/login', 'refresh');
	}

}
