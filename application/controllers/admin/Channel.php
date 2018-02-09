<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('Channel');
			$this->session->set_userdata('page', 'channel');
	  $this->load->model('model_channel');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Channel';
		$this->page_data['nav_active'] = 'channel';
		$this->data['list_channel'] = $this->model_channel->get_channel();

		$this->layout->view('admin/channel/channel');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'title',
			1 => '',
			2 => '',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_channel->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_channel->all_channel($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_channel->channel_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_channel->channel_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$channel)
			{
				$nestedData['title'] = $channel->title;
				$nestedData['description'] = $channel->description;
				$nestedData['url_video'] = $channel->url_video;
				$nestedData['edit'] = '<a href="'.base_url('admin/channel/edit/').$channel->id_video.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="channel_delete('.$channel->id_video.',\''.$channel->title.'\')"><i class="fa fa-times"></i></a>';
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

	public function edit($id_video = ''){
		$this->data['contents_channel'] = $this->model_channel->get_one($id_video);

		if($this->data['contents_channel']){

			if($_POST){
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'url_video' => $this->input->post('url_video'),
					);

				if($this->model_channel->update_channel($id_video, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_channel'] = $this->model_channel->get_one($id_video);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
		$this->layout->view('admin/channel/channel_edit');

		}else{
			redirect('admin/channel');
		}
	}

	public function add(){

		if($_POST){

			$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'url_video' => $this->input->post('url_video'),
					);

			if($this->model_channel->add_channel($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
		$this->layout->view('admin/channel/channel_add');

	}

		public function delete($id_video = ''){
			$this->data['contents_channel'] = $this->model_channel->get_one($id_video);

			if($this->data['contents_channel']){
				$this->model_channel->delete_channel($id_video);
				$this->layout->view('admin/channel/channel');
			}else{
				redirect('admin/channel');
			}
		}

}
