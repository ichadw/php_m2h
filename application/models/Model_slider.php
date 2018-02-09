<?php
class Model_slider extends CI_Model {

	public $db_table = 'slider';

	public function get_slider(){
		$query = "SELECT * FROM ".$this->db_table;
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
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

	public function all(){
		//query semua record di table products
		$hasil = $this->db->get($this->db_table);
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function get_slider_per_page($limit, $offset) {
		if (is_null($offset) || empty($offset)) {
			$offset = 0;
		}
		else{
			$offset = ($offset*$limit)-$limit;
		}
		$query = "SELECT * FROM ".$this->db_table." LIMIT ". $limit ." OFFSET ". $offset;
		return $this->db->query($query)->result();
	}

	public function record_count(){
		return $this->db->count_all($this->db_table);
	}

	function all_slider($limit,$start,$col,$dir){
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

	function slider_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('title',$search)
		->or_like('description',$search)
		->or_like('background',$search)
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

	function slider_search_count($search){
		$query = $this
		->db
		->like('title',$search)
		->or_like('description',$search)
		->or_like('background',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_slider($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('slider',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_slider($data = array()){
		$this->db->insert('slider',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_slider($id){
		$this->db->where('id', $id);
		$this->db->delete('slider');
	}
}

?>
