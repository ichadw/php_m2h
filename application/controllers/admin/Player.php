<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

		$this->layout->set_title('Player');
		$this->session->set_userdata('page', 'player');
      	$this->load->model('model_player');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Player';
		$this->page_data['nav_active'] = 'player';
		$this->data['list_player'] = $this->model_player->get_player();

		$this->layout->view('admin/player/player');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'name',
			1 => 'attack',
			2 => 'technic',
			3 => 'stamina',
			4 => 'defense',
			5 => 'power',
			6 => 'speed',
			7 => 'age',
			8 => 'weight',
			9 => 'height',
			10 => '',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_player->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_player->all_player($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_player->player_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_player->player_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$player)
			{
				$nestedData['name'] = $player->name;
				$nestedData['attack'] = $player->attack;
				$nestedData['technic'] = $player->technic;
				$nestedData['stamina'] = $player->stamina;
				$nestedData['defense'] = $player->defense;
				$nestedData['power'] = $player->power;
				$nestedData['speed'] = $player->speed;
				$nestedData['age'] = $player->technic;
				$nestedData['weight'] = $player->weight;
				$nestedData['height'] = $player->height;
				$nestedData['thumbnail'] = $player->thumbnail;
				$nestedData['edit'] = '<a href="'.base_url('admin/player/edit/').$player->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="player_delete('.$player->id.',\''.$player->name.'\')"><i class="fa fa-times"></i></a>';
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
		$this->data['contents_player'] = $this->model_player->get_one($id);

		if($this->data['contents_player']){

			$photo = '';
			$old_photo = $this->data['contents_player']->photo;

			$thumbnail = '';
			$old_thumbnail = $this->data['contents_player']->thumbnail;

			if($_POST){
				if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
			    $config['upload_path'] = './assets/img/page3';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 2048;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('photo');
					$photo_data = $this->upload->data();
					$photo = $photo_data['file_name'];
					if(file_exists('./assets/img/page3/'.$old_photo) && $old_photo != '') unlink('./assets/img/page3/'.$old_photo);
				}

				if(isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name'])){
			    $config['upload_path'] = './assets/img/page3';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 516;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('thumbnail');
					$thumbnail_data = $this->upload->data();
					$thumbnail = $thumbnail_data['file_name'];
					if(file_exists('./assets/img/page3/'.$old_thumbnail) && $old_thumbnail != '') unlink('./assets/img/page3/'.$old_thumbnail);
				}
				$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'attack' => $this->input->post('attack'),
					'technic' => $this->input->post('technic'),
					'stamina' => $this->input->post('stamina'),
					'defense' => $this->input->post('defense'),
					'power' => $this->input->post('power'),
					'speed' => $this->input->post('speed'),
					'age' => $this->input->post('age'),
					'weight' => $this->input->post('weight'),
					'height' => $this->input->post('height'),
					);

				if(isset($photo) && $photo!= '') $data['photo'] = $photo;
				if(isset($thumbnail) && $thumbnail!= '') $data['thumbnail'] = $thumbnail;

				if($this->model_player->update_player($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_player'] = $this->model_player->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/player/player_edit');

		}else{
			redirect('admin/player');
		}
	}

	public function add(){

			$photo = '';
			$thumbnail = '';
		if($_POST){
			$config['upload_path'] = './assets/img/page3';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 2048;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('photo');
			$photo_data = $this->upload->data();
			$photo = $photo_data['file_name'];

			$config['upload_path'] = './assets/img/page3';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 516;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('thumbnail');
			$thumbnail_data = $this->upload->data();
			$thumbnail = $thumbnail_data['file_name'];

			$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'photo'=>$photo,
					'attack' => $this->input->post('attack'),
					'technic' => $this->input->post('technic'),
					'stamina' => $this->input->post('stamina'),
					'defense' => $this->input->post('defense'),
					'power' => $this->input->post('power'),
					'speed' => $this->input->post('speed'),
					'age' => $this->input->post('age'),
					'weight' => $this->input->post('weight'),
					'height' => $this->input->post('height'),
					'thumbnail' => $thumbnail,
					);


			if($this->model_player->add_player($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/player/player_add');

	}

		public function delete($id = ''){
			$this->data['contents_player'] = $this->model_player->get_one($id);

			if($this->data['contents_player']){
				$this->model_player->delete_player($id);
				$this->layout->view('admin/player/player');
			}else{
				redirect('admin/player');
			}
		}

}
