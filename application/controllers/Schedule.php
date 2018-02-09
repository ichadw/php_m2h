<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('model_schedule');
		$this->load->library('pagination');

	}

	public function index()
	{
		$this->data['content_header'] = $this->header; // variable ini ada MY_Controller
		$this->data['content_sponsor'] = $this->sponsor; // variable ini ada MY_Controller
		
		$total_row = $this->model_schedule->record_count();
		$config = array();
		$config["base_url"] = base_url() . "schedule";
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config["total_rows"] = $total_row;
		$config["per_page"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['display_pages'] = FALSE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		
		$config['next_link'] = '<i class="fa fa-caret-down"></i>';
		$config['next_tag_open'] = '<a>';
		$config['next_tag_close'] = '</a>';

		$config['prev_link'] = '<i class="fa fa-caret-up"></i>';
		$config['prev_tag_open'] = '<a>';
		$config['prev_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		if(isset($_GET['page'])){
			if($_GET['page'] >= 0 )
				$page = $_GET['page'];
			else
				$page = 1;
		}else{
			$page = 1;
		}		
		$this->data["content_schedule"] = $this->model_schedule->get_schedule_per_page($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$this->data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('schedule', $this->data);
	}
}