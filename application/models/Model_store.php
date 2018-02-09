<?php
class Model_store extends CI_Model {

	public $db_table = 'products';

	public function get_store(){
		$query = "SELECT * FROM ".$this->db_table;
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
	}

	public function get_store_per_page($limit, $page) {
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

	public function record_count(){
		return $this->db->count_all($this->db_table);
	}

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

	public function update_store($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('store',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_store($data = array()){
		$this->db->insert('store',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_store($id){
		$this->db->where('id', $id);
		$this->db->delete('store');
	}
}

?>
