<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cust');
		$this->load->library('cart');
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
		$this->load->model('model_orders');
	}

	public function index(){
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;

		$is_processed = $this->model_orders->process();
		if($is_processed){
			$this->cart->destroy();
			redirect('order/success');
		} else {
			$this->session->set_flashdata('error','Failed to processed your order, please try again!');
			redirect('store/cart');
		}
	}

	public function success()
	{
		$this->data['content_header'] = $this->header;
		$this->data['content_sponsor'] = $this->sponsor;
		$this->load->view('order_success', $this->data);
	}
}
