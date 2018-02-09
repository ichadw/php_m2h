<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->layout->set_title('Slider');
		$this->session->set_userdata('page', 'slider');
		$this->load->model('model_slider');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Slider';
		$this->page_data['nav_active'] = 'slider';
		$this->data['contents_slider'] = $this->model_slider->all();
		$this->layout->view('admin/slider/slider');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'title',
			1 => 'description',
			2 => 'url',
			3 => '',
			4 => '',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_slider->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_slider->all_slider($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_slider->slider_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_slider->slider_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$slider)
			{
				$nestedData['title'] = $slider->title;
				$nestedData['description'] = $slider->description;
				$nestedData['url'] = $slider->url;
				$nestedData['background'] = $slider->background;
				$nestedData['edit'] = '<a href="'.base_url('admin/slider/edit/').$slider->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="slider_delete('.$slider->id.',\''.$slider->title.'\')"><i class="fa fa-times"></i></a>';
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

	public function add(){
		$background = '';
		if($_POST){

			$config['upload_path'] = './assets/img/page1';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 4096;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('background');
			$background_data = $this->upload->data();
			$background = $background_data['file_name'];

			$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'url' => $this->input->post('url'),
					'background' => $background,
					);


			if($this->model_slider->add_slider($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/slider/slider_add');
	}

	public function edit($id = ''){
		$this->data['contents_slider'] = $this->model_slider->get_one($id);

		if($this->data['contents_slider']){
			$background = '';
			$old_background = $this->data['contents_slider']->background;

			if($_POST){
				if(isset($_FILES['background']) && !empty($_FILES['background']['name'])){
			    $config['upload_path'] = './assets/img/page1';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 4096;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('background');
					$background_data = $this->upload->data();
					$background = $background_data['file_name'];
					if(file_exists('./assets/img/page1/'.$old_background) && $old_background != '') unlink('./assets/img/page1/'.$old_background);
				}
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'url' => $this->input->post('url'),
					);

				if(isset($background) && $background!= '') $data['background'] = $background;

				if($this->model_slider->update_slider($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_slider'] = $this->model_slider->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/slider/slider_edit');

		}else{
			redirect('admin/slider');
		}
	}

	public function delete($id){
		$this->model_slider->delete($id);
		redirect('admin/slider');
	}
}
