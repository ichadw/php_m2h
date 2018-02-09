<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('News');
			$this->session->set_userdata('page', 'news');
      		$this->load->model('model_news');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'News';
		$this->page_data['nav_active'] = 'news';
		$this->data['list_news'] = $this->model_news->get_news();

		$this->layout->view('admin/news/news');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'title',
			1 => 'author',
			2 => 'timestamp',
			3 => 'publish',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_news->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_news->all_news($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_news->news_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_news->news_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$news)
			{
				$nestedData['title'] = $news->title;
				$nestedData['author'] = $news->author;
				$nestedData['timestamp'] = $news->timestamp;
				$nestedData['publish'] = $news->publish;
				$nestedData['edit'] = '<a href="'.base_url('admin/news/edit/').$news->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
									'<a class="btn btn-sm btn-danger" id="del" onclick="news_delete('.$news->id.',\''.$news->title.'\')"><i class="fa fa-times"></i></a>';
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
		$this->data['contents_news'] = $this->model_news->get_one($id);

		if($this->data['contents_news']){

			$thumbnail = '';
			$old_thumbnail = $this->data['contents_news']->thumbnail;

			if($_POST){
				if(isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name'])){
			   		$config['upload_path'] = './assets/img/page2';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= 2048;
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = TRUE;
					$this->upload->initialize($config);
					$this->upload->do_upload('thumbnail');
					$thumbnail_data = $this->upload->data();
					$thumbnail = $thumbnail_data['file_name'];
					if(file_exists('./assets/img/page2/'.$old_thumbnail) && $old_thumbnail != '') unlink('./assets/img/page2/'.$old_thumbnail);
				}
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'slug' => $this->input->post('slug'),
					'author' => $this->session->userdata('username'),
					'publish' => $this->input->post('publish'),
					);
				if(isset($thumbnail) && $thumbnail!= '') $data['thumbnail'] = $thumbnail;

				if($this->model_news->update_news($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['contents_news'] = $this->model_news->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/news/news_edit');

		}else{
			redirect('admin/news');
		}
	}

	public function add(){

			$thumbnail = '';

		if($_POST){
			$config['upload_path'] = './assets/img/page2';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= 2048;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload('thumbnail');
			$thumbnail_data = $this->upload->data();
			$thumbnail = $thumbnail_data['file_name'];

			$data = array(
					'title' => $this->input->post('title'),
					'author' => $this->session->userdata('username'),
					'content' => $this->input->post('content'),
					'slug' => $this->input->post('slug'),
					'thumbnail'=> $thumbnail,
					'publish'=>$this->input->post('publish'),
					
					);

			if($this->model_news->add_news($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		} 
    	$this->layout->view('admin/news/news_add');

	}
	// public function autoresize($path, $width, $height){
	// 	$dir = 'assets/img/'.$path;
	// 	$upload = $this->upload->data();
	// 	$fname = $upload['file_name'];

	// 	$config_manip['image_library'] = 'gd2';
	// 	$config_manip['source_image'] = "./" . $dir ."/" . $fname;
	// 	$config_manip['maintain_ratio'] = true;
	// 	$config_manip['new_image'] = "./assets/img/$path/" . $fname;
	// 	$config_manip['width'] = "$width";
	// 	$config_manip['height'] = "$height";
	// 	$config_manip['encrypt_name'] = TRUE;
	// 	$this->image_lib->initialize($config_manip);
	// 	$this->image_lib->resize();
	// }

	public function delete($id = ''){
		$this->data['contents_news'] = $this->model_news->get_one($id);

		if($this->data['contents_news']){
			$this->model_news->delete_news($id);
			$this->layout->view('admin/news/news');
		}else{
			redirect('admin/news');
		}
	}

}
