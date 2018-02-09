<?php
class Model_channel extends CI_Model {

	public $db_table = 'channel';

	public function get_channel(){
		$query = "SELECT * FROM ".$this->db_table;
		return $this->db->query($query)->result();
	}

	public function get_one($id_video){
		$query = "SELECT * FROM ".$this->db_table." WHERE id_video=".$id_video;
		return $this->db->query($query)->row();
	}

	public function get_channel_per_page($limit, $offset) {
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

	function all_channel($limit,$start,$col,$dir){
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

	function channel_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('title',$search)
		->or_like('description',$search)
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

	function channel_search_count($search){
		$query = $this
		->db
		->like('title',$search)
		->or_like('description',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_channel($id_video, $data = array()){
		$this->db->where('id_video', $id_video);
		$this->db->update('channel',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_channel($data = array()){
		$this->db->insert('channel',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_channel($id_video){
		$this->db->where('id_video', $id_video);
		$this->db->delete('channel');
	}
}

?>
