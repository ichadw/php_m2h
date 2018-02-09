<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model
{
	public function insert_page($post)
	{
		$insert = array(
		   'title' => $post["title"],
		   'description' => $post["description"],
		   'slug' => $post["slug"],
		   'order' => $post["order"],
		   'author' => $post["author"],
		   'publish' => $post["publish"]
		);

		$this->db->set('timestamp', 'NOW()', FALSE);
		$this->db->insert('pages', $insert); 
	}
	
	public function edit_page($post)
	{
		$edit = array(
		   'title' => $post["title"],
		   'description' => $post["description"],
		   'slug' => $post["slug"],
		   'order' => $post["order"],
		   'publish' => $post["publish"]
		);
	
		$this->db->WHERE('id', $post["id"]);
		$this->db->update('pages', $edit);
	}
	
	public function get_page($id)
	{
		$query = "SELECT id, author, title, 
			date_format(timestamp, '%d-%b-%Y %h:%i:%s') as timestamp_display, 
			publish, slug, description, `order` as position
			FROM pages WHERE 1";
			
		if($id != ""){
			$query .= " and id='$id'";
		}		
			
		$query .= " order by timestamp desc";
		return $this->db->query($query);
	}

	public function get_page_by_slug($post){
		$query = "SELECT description
			FROM pages WHERE 1";
			
		if($post != ""){
			$query .= " and slug='$post'";
		}
		return $this->db->query($query);
	}
	
	public function delete_page($post)
	{
		$this->db->delete('pages', array('id' => $post["id"]));
	}
}