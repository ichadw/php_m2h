<?php
class Model_user extends CI_Model {

	public $db_table = 'user';

	public function get_user(){
		$query = "SELECT * FROM ".$this->db_table;
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
	}

	public function get_user_per_page($limit, $offset) {
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

	function all_user($limit,$start,$col,$dir){
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

	function user_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('username',$search)
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

	function user_search_count($search){
		$query = $this
		->db
		->like('username',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_user($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('user',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_user($data = array()){
		$this->db->insert('user',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}

?>
