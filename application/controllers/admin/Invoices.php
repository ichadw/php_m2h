<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->layout->set_title('Invoices');
		$this->session->set_userdata('page', 'invoices');
		//load model -> model_products
		$this->load->model('model_orders');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Invoices';
		$this->page_data['nav_active'] = 'invoices';
		$this->data['list_invoices'] = $this->model_orders->all();
		$this->layout->view('admin/invoices/invoices');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'id',
			1 => 'date',
			2 => 'due_date',
			3 => 'status',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_orders->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_orders->all_invoices($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_orders->invoices_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_orders->invoices_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$invoices)
			{
				$nestedData['id'] = $invoices->id;
				$nestedData['date'] = $invoices->date;
				$nestedData['due_date'] = $invoices->due_date;
				$nestedData['status'] = $invoices->status;
				$nestedData['detail'] = '<a href="'.base_url('admin/invoices/detail/').$invoices->id.'" class="btn btn-sm btn-default">Details</a>';
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

    public function detail($invoice_id)
    {
        $data['invoice'] = $this->model_orders->get_invoice_by_id($invoice_id);
        $data['orders']  = $this->model_orders->get_orders_by_invoice($invoice_id);
		$this->layout->view('admin/invoices/invoice_detail', $data);
    }
}
