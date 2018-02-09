<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('model_store');
		$this->load->model('model_products');
		$this->load->library('pagination');
		$this->load->library('cart');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;

		$total_row = $this->model_products->record_count();
		$config = array();
		$config["base_url"] = base_url() . "store";
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config["total_rows"] = $total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['display_pages'] = FALSE;
		$config['cur_tag_open'] = '&nbsp;<span><a class="current">';
		$config['cur_tag_close'] = '</a></span>';

		$config['next_link'] = '<i class="fa fa-caret-down"></i>';
		$config['next_tag_open'] = '<span>';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = '<i class="fa fa-caret-up"></i>';
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
		$this->data["content_products"] = $this->model_products->get_products_per_page($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$this->data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('store', $this->data);
	}

	public function add_to_cart($id)
	{
		$products = $this->model_products->find($id);
		$data = array(
					   'id'      => $products->id,
					   'qty'     => 1,
					   'price'   => $products->price,
					   'name'    => $products->name
					);

		$this->cart->insert($data);
		redirect('store');
	}

	public function cart(){
		// displays what currently inside the cart
		//print_r($this->cart->contents());
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;
		$this->load->view('show_cart', $this->data);
	}

	public function clear_cart()
	{
		$this->cart->destroy();
		redirect('store');
	}

	public function product($id = ''){
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;
		
		$this->data['product'] = $this->model_products->find($id);

		$this->load->view('productdetails', $this->data);

	}
}
