<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('Store');
			$this->session->set_userdata('page', 'store');
      		$this->load->model('model_store');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Store';
		$this->page_data['nav_active'] = 'store';
		$this->data['list_store'] = $this->model_store->get_store();

		$this->layout->view('admin/store/store');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'title',
			1 => 'description',
			2 => '',
			3 => '',
			4 => 'date',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_store->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_store->all_store($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_store->store_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_store->store_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$store)
			{
				$nestedData['title'] = $store->title;
				$nestedData['description'] = $store->description;
				$nestedData['url'] = $store->url;
				$nestedData['image'] = $store->image;
				$nestedData['date'] = $store->date;				
				$nestedData['edit'] = '<a href="'.base_url('admin/store/edit/').$store->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="store_delete('.$store->id.',\''.$store->title.'\')"><i class="fa fa-times"></i></a>';
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
		$this->data['contents_store'] = $this->model_store->get_one($id);

		if($this->data['contents_store']){

			$image = '';
			$old_image = $this->data['contents_store']->image;

			if($_POST){
				if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
			    $config['upload_path'] = './assets/img/page5';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 2048;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('image');
					$image_data = $this->upload->data();
					$image = $image_data['file_name'];
					if(file_exists('./assets/img/page5/'.$old_image) && $old_image != '') unlink('./assets/img/page5/'.$old_image);
				}
				$data = array(
					'name' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'category' => $this->input->post('category')
					);
				if(isset($image) && $image!= '') $data['image'] = $image;

				if($this->model_store->update_store($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_store'] = $this->model_store->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/store/store_edit');

		}else{
			redirect('admin/store');
		}
	}

	public function add(){

			$image = '';

		if($_POST){
			$config['upload_path'] = './assets/img/page5';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 2048;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
			$image_data = $this->upload->data();
			$image = $image_data['file_name'];

			$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'image'=>$image,
					'category' => $this->input->post('category')
					);


			if($this->model_store->add_store($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/store/store_add');

	}

		public function delete($id = ''){
			$this->data['contents_store'] = $this->model_store->get_one($id);

			if($this->data['contents_store']){
				$this->model_store->delete_store($id);
				$this->layout->view('admin/store/store');
			}else{
				redirect('admin/store');
			}
		}

}
