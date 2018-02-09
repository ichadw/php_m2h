<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_category_model extends CI_Model {

	public function insert_news_category($post){
		$insert = array(
		  'name' => $post["name"],
		  'status' => $post["status"]
		);
		// Automatically insert timestamp
		$this->db->set('timestamp', 'NOW()', FALSE);
		// insert(tableName, arrayData);
		$this->db->insert('news_category', $insert); 
	}

	public function get_all_category(){
		return $this->db->get('news_category');
	}

	public function get_news_category($post){
		return $this->db->get_where('news_category', array('id' => $post));
	}

	public function get_active_category(){
		return $this->db->get_where('news_category', array('status' => 1));
	}

	public function edit_news_category($post){
		$edit = array(
			'name' => $post["name"],
	  	'status' => $post["status"]
		);
		$this->db->where('id', $post["id"]);

		$this->db->update('news_category', $edit);
	}

	public function delete_news_category($post){
		$this->db->delete('news_category', array('id' => $post["id"]));
	}
}