<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('Team');
			$this->session->set_userdata('page', 'team');
      $this->load->model('model_team');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Team';
		$this->page_data['nav_active'] = 'team';
		$this->data['list_team'] = $this->model_team->get_team();

		$this->layout->view('admin/team/team');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'name',
			1 => 'image'
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_team->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_team->all_team($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_team->team_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_team->team_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$team)
			{
				$nestedData['name'] = $team->name;
				$nestedData['image'] = $team->image;		
				$nestedData['edit'] = '<a href="'.base_url('admin/team/edit/').$team->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="team_delete('.$team->id.',\''.$team->name.'\')"><i class="fa fa-times"></i></a>';
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
		$this->data['contents_team'] = $this->model_team->get_one($id);

		if($this->data['contents_team']){

			$image = '';
			$old_image = $this->data['contents_team']->image;

			if($_POST){
				if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
			    $config['upload_path'] = './assets/img/page4';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 2048;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('image');
					$image_data = $this->upload->data();
					$image = $image_data['file_name'];
					if(file_exists('./assets/img/page4/'.$old_image) && $old_image != '') unlink('./assets/img/page4/'.$old_image);
				}
				$data = array(
					'name' => $this->input->post('name'),
					);

				if(isset($image) && $image!= '') $data['image'] = $image;

				if($this->model_team->update_team($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_team'] = $this->model_team->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/team/team_edit');

		}else{
			redirect('admin/team');
		}
	}

	public function add(){

			$image = '';

		if($_POST){
			$config['upload_path'] = './assets/img/page4';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 2048;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
			$image_data = $this->upload->data();
			$image = $image_data['file_name'];

			$data = array(
					'name' => $this->input->post('name'),
					'image'=>$image
					);


			if($this->model_team->add_team($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/team/team_add');

	}

		public function delete($id = ''){
			$this->data['contents_team'] = $this->model_team->get_one($id);

			if($this->data['contents_team']){
				$this->model_team->delete_team($id);
				$this->layout->view('admin/team/team');
			}else{
				redirect('admin/team');
			}
		}

}
