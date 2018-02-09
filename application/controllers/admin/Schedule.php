<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();

			$this->layout->set_title('Schedule');
			$this->session->set_userdata('page', 'schedule');
      		$this->load->model('model_schedule');
			$this->load->library('upload');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Schedule';
		$this->page_data['nav_active'] = 'schedule';
		$this->data['content_schedule'] = $this->model_schedule->get_schedule();
		$this->layout->view('admin/schedule/schedule');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'home_name',
			1 => 'away_name',
			2 => '',
			3 => '',
			4 => 'date'
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_schedule->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_schedule->all_schedule($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_schedule->schedule_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_schedule->schedule_search_count($search);
		}

		$data = array();
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);

	}

	public function edit($id = ''){
		$this->data['content_schedule'] = $this->model_schedule->get_one($id);

		if($this->data['content_schedule']){

			if($_POST){
				$data = array(
					'home_score' => $this->input->post('home_score'),
					'away_score' => $this->input->post('away_score'),
					'date' => $this->input->post('date')
					);

				if($this->model_schedule->update_schedule($id, $data)){
					$this->data['success'] = 'Data Updated';
					$this->data['content_schedule'] = $this->model_schedule->get_one($id);
				}else{
					$this->data['error'] = 'Error Updated';
				}
			}
    	$this->layout->view('admin/schedule/schedule_edit');

		}else{
			redirect('admin/schedule');
		}
	}

	public function add(){
		$this->data['content_schedule'] = $this->model_schedule->get_homename();
		if($_POST){
			$data = array(
					'id_home' => $this->input->post('home_name'), //ini harusnya yang diinput idnya bukan namenya
					'id_away' => $this->input->post('away_name'), //ini juga
					'home_score' => $this->input->post('home_score'),
					'away_score' => $this->input->post('away_score'),
					'date' => $this->input->post('date')
					);

			if($this->model_schedule->add_schedule($data)){
				$this->data['success'] = 'Data Inserted Successfully';
			}else{
				$this->data['error'] = 'Insert Error';
			}
		}
    	$this->layout->view('admin/schedule/schedule_add');

	}

	public function delete($id = ''){
		$this->data['content_schedule'] = $this->model_schedule->get_one($id);

		if($this->data['content_schedule']){
			$this->model_schedule->delete_schedule($id);
			$this->layout->view('admin/schedule/schedule');
		}else{
			redirect('admin/schedule');
		}
	}

}
