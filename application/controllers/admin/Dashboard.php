<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Admin_Controller {
	public function __construct() {
		parent:: __construct();

		$this->layout->set_title('Dashboard');
		$this->session->set_userdata('page', 'dashboard');
		$this->load->model('model_header');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->data['contents_header'] = $this->model_header->get_header();
		$this->layout->view('admin/dashboard');
	}

	public function update_header(){
		//initialize upload config

		$image = '';
		if($_POST){
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 10;
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			
			if(isset($_FILES['icon']) && !empty($_FILES['icon']['name'])){
				$this->upload->do_upload('icon');
				$image_data = $this->upload->data();
				$image = $image_data['file_name'];
			}
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'keywords' => $this->input->post('keywords'),
				'author' => $this->input->post('author')				
				);
			if(isset($image) && $image != '') $data['icon'] = $image;

			$this->model_header->update_header($data);
		}
		redirect('admin/dashboard');
	}
}
