<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('model_news');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;		

		$total_row = $this->model_news->record_count();
		$config = array();
		$config["base_url"] = base_url() . "news";
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
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
		
		$this->data["content_news"] = $this->model_news->get_news_per_page($config["per_page"], $page);
		$this->data["blog_headline"] = $this->model_news->fetch_blog_headline();
		$str_links = $this->pagination->create_links();	
		$this->data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('news', $this->data);
		
	}

	public function detail_news(){
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;
		$this->data['content_news'] = $this->model_news->get_blog_by_slug($this->uri->segment(2));

		if($this->uri->segment(2) != ""){ 
				$data["content_news"] = $this->model_news->get_blog_by_slug($this->uri->segment(2));
				//var_dump($data["content_news"]->result());
				$page = "news_detail";
			}

		$this->load->view('news_detail', $this->data);
	}
}