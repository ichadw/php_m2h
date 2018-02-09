<?php
class Model_schedule extends CI_Model {

	public $db_table = 'schedule';

	public function get_schedule() {
		$query ="SELECT s.*, t_home.name as home_name, t_home.image as home_image, t_away.name as away_name, t_away.image as away_image FROM schedule s ".	
								"LEFT JOIN team t_home ON s.id_home = t_home.id ".
								"LEFT JOIN team t_away ON s.id_away = t_away.id ".
								"ORDER BY s.date DESC";
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT s.*, t_home.name as home_name, t_home.image as home_image, t_away.name as away_name, t_away.image as away_image FROM schedule s ".	
								"LEFT JOIN team t_home ON s.id_home = t_home.id ".
								"LEFT JOIN team t_away ON s.id_away = t_away.id ".
								"WHERE s.id=".$id;
		return $this->db->query($query)->row();
	} 

	public function get_schedule_per_page($limit, $page) {
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
		$query = "SELECT s.*, t_home.name as home_name, t_home.image as home_image, t_away.name as away_name, t_away.image as away_image FROM schedule s ".	
								"LEFT JOIN team t_home ON s.id_home = t_home.id ".
								"LEFT JOIN team t_away ON s.id_away = t_away.id ".
								"ORDER BY s.date DESC LIMIT ".$limit." OFFSET ".$offset;
		return $this->db->query($query)->result();
	}

	public function record_count(){
		return $this->db->count_all($this->db_table);
	}

	function all_schedule($limit,$start,$col,$dir){
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

	function get_homename(){
		 $query = "SELECT * FROM team";
		 return $this->db->query($query)->result();
	}

	function schedule_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('home_name',$search)
		->or_like('away_name',$search)
		->or_like('date',$search)
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

	function schedule_search_count($search){
		$query = $this
		->db
		->like('home_name',$search)
		->or_like('away_name',$search)
		->or_like('date',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_schedule($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('schedule',$data);
 
		return $this->db->affected_rows() ? true : false;
	}

	public function add_schedule($data = array()){
		$this->db->insert('schedule',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_schedule($id){
		$this->db->where('id', $id);
		$this->db->delete('schedule');
	}
}

?>
