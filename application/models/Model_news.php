<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_news extends CI_Model{

	public function fetch_blog(){
		$query3 = "SELECT *
			FROM news WHERE headline = '0' AND publish='1' ORDER BY timestamp DESC";
		return $this->db->query($query3);
	}

	public function get_blog_by_slug($slug){
		$query3 = "SELECT *
			FROM news WHERE slug = '$slug' AND publish='1'";
		return $this->db->query($query3)->row();
	}

	public function fetch_blog_headline(){
		$query3 = "SELECT *
			FROM news WHERE headline = '1' ORDER BY timestamp DESC";
		return $this->db->query($query3);
	}

	public $db_table = 'news';

	public function get_news(){
		$query = "SELECT * FROM ".$this->db_table;
		return $this->db->query($query)->result();
	}

	public function get_one($id){
		$query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
		return $this->db->query($query)->row();
	}

	public function get_news_per_page($limit, $offset) {
		if (is_null($offset) || empty($offset)) {
			$offset = 0;
		}
		else{
			$offset = ($offset*$limit)-$limit;
		}
		$query = "SELECT * FROM ".$this->db_table." WHERE headline = '0' AND publish='1' LIMIT ". $limit ." OFFSET ". $offset;
		return $this->db->query($query)->result();
	}

	public function record_count(){
		return $this->db->count_all($this->db_table);
	}

	function all_news($limit,$start,$col,$dir){
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

	function news_search($limit,$start,$search,$col,$dir){
		$query = $this
		->db
		->like('title',$search)
		->or_like('author',$search)
		->or_like('timestamp',$search)
		->or_like('publish',$search)
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

	function news_search_count($search){
		$query = $this
		->db
		->like('title',$search)
		->or_like('author',$search)
		->or_like('timestamp',$search)
		->or_like('publish',$search)
		->get($this->db_table);

		return $query->num_rows();
	}

	public function update_news($id, $data = array()){
		$this->db->where('id', $id);
		$this->db->update('news',$data);

		return $this->db->affected_rows() ? true : false;
	}

	public function add_news($data = array()){
		// Automatically insert
		$this->db->set('timestamp', 'NOW()', FALSE);
		$this->db->insert('news',$data);

		return $this->db->affected_rows() ? true : false;
	}
	public function delete_news($id){
		$this->db->where('id', $id);
		$this->db->delete('news');
	}
}
