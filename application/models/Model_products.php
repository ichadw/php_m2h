<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

	public $db_table = 'products';
	function all_store($limit,$start,$col,$dir){
		$query = $this
		->db
		->limit($limit,$start)
		->order_by($col,$dir)
		->get($this->db_table);

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}

	}
	
	public function all(){
		//query semua record di table products
		$hasil = $this->db->get($this->db_table);
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function record_count(){
		return $this->db->count_all($this->db_table);
	}

	public function get_products_per_page($limit, $page) {
		$total = $this->record_count();
		if (is_null($page) || empty($page)) {
			$offset = 0;
		}
		else{
			$pages = ceil($total/$limit); // total halaman
			if($page == $pages)
				$offset = $total-$limit;
			else
				$offset = ($page*$limit)-$limit;
		}
		$query = "SELECT * FROM ".$this->db_table." LIMIT ". $limit ." OFFSET ". $offset;
		return $this->db->query($query)->result();
	}

	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get($this->db_table);
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	function store_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('name',$search)
		->or_like('description',$search)
		->or_like('price',$search)
		->or_like('category',$search)
		->limit($limit,$start)
		->order_by($col,$dir)
		->get($this->db_table);


		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}

	function store_search_count($search){
		$query = $this
		->db
		->like('name',$search)
		->or_like('description',$search)
		->or_like('price',$search)
		->or_like('category',$search)
		->get($this->db_table);

		return $query->num_rows();
	}
	
	public function create($data = array()){
		//Query INSERT INTO
		$this->db->insert('products', $data);
	}

	public function update($id, $data = array()){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id', $id)
				 ->update('products', $data);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id', $id)
				 ->delete('products');
	}
	
}