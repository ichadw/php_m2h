<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('User');
			$this->session->set_userdata('page', 'user');
      $this->load->model('model_user');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'User';
		$this->page_data['nav_active'] = 'user';
		$this->data['list_user'] = $this->model_user->get_user();

		$this->layout->view('admin/user/user');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'username',
			1 => '',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_user->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_user->all_user($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_user->user_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_user->user_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$user)
			{
				$nestedData['username'] = $user->username;			
				$nestedData['edit'] = '<a href="'.base_url('admin/user/edit/').$user->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
									  '<a class="btn btn-sm btn-danger" id="del" onclick="user_delete('.$user->id.',\''.$user->username.'\')"><i class="fa fa-times"></i></a>';

				$data[] = $nestedData;

			}

		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function edit($id = ''){
		$this->data['contents_user'] = $this->model_user->get_one($id);

		if($this->data['contents_user']){

			if($_POST){
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					);

				if($this->model_user->update_user($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_user'] = $this->model_user->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/user/user_edit');

		}else{
			redirect('admin/user');
		}
	}

	public function add(){
		if($_POST){
			$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					);


			if($this->model_user->add_user($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/user/user_add');

	}

		public function delete($id = ''){
			$this->data['contents_user'] = $this->model_user->get_one($id);

			if($this->data['contents_user']){
				$this->model_user->delete_user($id);
				$this->layout->view('admin/user/user');
			}else{
				redirect('admin/user');
			}
		}

}
