<?php
class Model_team extends CI_Model {

	public $db_table = 'team';

	public function get_team() {
		$query = "SELECT * FROM team";
		return $this->db->query($query)->result();
	}

		public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
	}

	public function get_team_per_page($limit, $offset) {
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

		function all_team($limit,$start,$col,$dir){
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

	function team_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('name',$search)
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

	function team_search_count($search){
		$query = $this
		->db
		->like('name',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

		public function update_team($id, $data = array()){
			$this->db->where('id', $id);
			$this->db->update('team',$data);

			return $this->db->affected_rows() ? true : false;
		}

		public function add_team($data = array()){
			$this->db->insert('team',$data);

			return $this->db->affected_rows() ? true : false;
		}
		public function delete_team($id){
			$this->db->where('id', $id);
			$this->db->delete('team');
		}

}

?>
