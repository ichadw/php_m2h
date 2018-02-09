<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->layout->set_title('Products');
		$this->session->set_userdata('page', 'products');
		//load model -> model_products
		$this->load->model('model_products');
	}

	public function index()
	{
		$this->page_data['page_title'] = 'Product';
		$this->page_data['nav_active'] = 'products';
		$this->data['products'] = $this->model_products->all();
		$this->layout->view('admin/products/products');
	}

	public function get_datatable(){
		$columns = array(
			0 => 'name',
			1 => 'description',
			2 => 'price',
			3 => '',
			4 => 'stock',
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->model_products->record_count();

		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$results = $this->model_products->all_store($limit,$start,$order,$dir);
		}
		else {
			$search = $this->input->post('search')['value'];
			$results =  $this->model_products->store_search($limit,$start,$search,$order,$dir);
			$totalFiltered = $this->model_products->store_search_count($search);
		}

		$data = array();
		if(!empty($results))
		{
			$verify = ''; $code = '';
			foreach ($results as $key =>$product)
			{
				$nestedData['name'] = $product->name;
				$nestedData['description'] = $product->description;
				$nestedData['price'] = 'Rp '.number_format($product->price);
				$nestedData['image'] = $product->image;
				$nestedData['stock'] = $product->stock;
				$nestedData['edit'] = '<a href="'.base_url('admin/product/edit/').$product->id.'" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'.
															'<a class="btn btn-sm btn-danger" id="del" onclick="product_delete('.$product->id.',\''.$product->name.'\')"><i class="fa fa-times"></i></a>';
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
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');
		//$this->form_validation->set_rules('userfile', 'Product Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->layout->view('admin/products/product_add');
		} else {
			//load uploading file library
			$config['upload_path'] = './assets/img/page5';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300'; //KB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				//file gagal diupload -> kembali ke form tambah
				$this->layout->view('admin/products/product_add');
			} else {
				//file berhasil diupload -> lanjutkan ke query INSERT
				// eksekusi query INSERT
				$gambar = $this->upload->data();
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price'),
					'stock'			=> set_value('stock'),
					'image'			=> $gambar['file_name']
				);
				$this->model_products->create($data_product);
				redirect('admin/products');
			}

		}
	}

	public function update($id){
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

		if ($this->form_validation->run() == FALSE)
		{
			$data['product'] = $this->model_products->find($id);
			$this->layout->view('admin/products/product_edit', $data);
		} else {
			if($_FILES['userfile']['name'] != ''){
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './assets/img/page5';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '4095'; //KB
				$config['max_width']  = '2000'; //pixels
				$config['max_height']  = '2000'; //pixels

				$this->load->library('upload', $config);


				if ( ! $this->upload->do_upload())
				{
					$data['product'] = $this->model_products->find($id);
					$this->layout->view('admin/products/product_edit', $data);
				} else {
					$gambar = $this->upload->data();
					$data_product =	array(
						'name'			=> set_value('name'),
						'description'	=> set_value('description'),
						'price'			=> set_value('price'),
						'stock'			=> set_value('stock'),
						'image'			=> $gambar['file_name']
					);
					$this->model_products->update($id, $data_product);
					redirect('admin/products');
				}
			} else {
				//form submit dengan gambar dikosongkan
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price'),
					'stock'			=> set_value('stock')
				);
				$this->model_products->update($id, $data_product);
				redirect('admin/products');
			}
		}
	}

	public function delete($id){
		$this->model_products->delete($id);
		redirect('admin/products');
	}
}
