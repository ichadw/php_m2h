<?php
class Model_player extends CI_Model {

	public $db_table = 'player';

	public function get_player(){
		$query = "SELECT * FROM ".$this->db_table." ORDER BY name DESC";
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
	}

	public function get_player_per_page($limit, $offset) {
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

	function all_player($limit,$start,$col,$dir){
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

	function player_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('name',$search)
		->or_like('description',$search)
		->or_like('attack',$search)
		->or_like('technic',$search)
		->or_like('stamina',$search)
		->or_like('defense',$search)
		->or_like('power',$search)
		->or_like('speed',$search)
		->or_like('age',$search)
		->or_like('weight',$search)
		->or_like('height',$search)
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

	function player_search_count($search){
		$query = $this
		->db
		->like('name',$search)
		->or_like('description',$search)
		->or_like('attack',$search)
		->or_like('technic',$search)
		->or_like('stamina',$search)
		->or_like('defense',$search)
		->or_like('power',$search)
		->or_like('speed',$search)
		->or_like('age',$search)
		->or_like('weight',$search)
		->or_like('height',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_player($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('player',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_player($data = array()){
		$this->db->insert('player',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_player($id){
		$this->db->where('id', $id);
		$this->db->delete('player');
	}
}

?>
