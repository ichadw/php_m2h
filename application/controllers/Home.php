<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('model_slider');
		$this->load->model('model_home');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;
		$total_row = $this->model_slider->record_count();
		$config = array();
		$config["base_url"] = base_url() . "channel";
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config["total_rows"] = $total_row;
		$config["per_page"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<span><a class="current">';
		$config['cur_tag_close'] = '</a></span>';

		$config['next_link'] = '<i class="fa fa-caret-right"></i>';
		$config['next_tag_open'] = '<span>';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = '<i class="fa fa-caret-left"></i>';
		$config['prev_tag_open'] = '<span>';
		$config['prev_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span>';
		$config['num_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		if(isset($_GET['page'])){
			if($_GET['page'] >= 0 )
				$page = $_GET['page'] ;
			else
				$page = 1;
		}else{
			$page = 1;
		}
		$str_links = $this->pagination->create_links();
		$this->data["links"] = explode('&nbsp;',$str_links );

		$this->data["content_slider"] = $this->model_slider->get_slider();
		$this->data['content_news'] = $this->model_home->get_latest_news();
		$this->data['content_players'] = $this->model_home->get_players();
		$this->data['content_videos'] = $this->model_home->get_latest_videos();
		$this->data['content_matches'] = $this->model_home->get_latest_matches();

		$this->load->view('home', $this->data);
	}
}
