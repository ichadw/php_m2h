<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{
	public function insert_news($post){
		$insert = array(
		  'title' => $post["title"],
		  'content' => $post["icontent"],
		  'slug' => $post["slug"],
			'thumbnail' => $post["image"],
		  'order' => $post["order"],
		  'author' => $post["author"],
		  'category_id' => $post["category"],
		  'publish' => $post["publish"]
		);
		// Automatically insert
		$this->db->set('timestamp', 'NOW()', FALSE);
		// insert(tableName, arrayData);
		$this->db->insert('news', $insert);
	}

	public function edit_news($post){
		$edit = array(
		  'title' => $post["title"],
		  'content' => $post["icontent"],
		  'slug' => $post["slug"],
			'thumbnail' => $post["image"],
		  'order' => $post["order"],
		  'category_id' => $post["category"],
		  'publish' => $post["publish"]
		);
		$this->db->WHERE('id', $post["id"]);
		$this->db->update('news', $edit);
	}

	public function get_news($per_page, $offset){
		$query = "SELECT id, category_id, author, title, date_format(timestamp, '%d-%b-%Y %h:%i:%s') as timestamp_display, publish, slug, thumbnail, content, `order` as position
			FROM news WHERE 1";
		$query .= " order by timestamp desc
			limit ".$offset.",".$per_page."";
		return $this->db->query($query);
	}

	public function fetch_news($id){
		// WHERE 1 == ALL
		$query = "SELECT id, category_id, author, title, date_format(timestamp, '%d-%b-%Y %h:%i:%s') as timestamp_display, publish, slug, thumbnail, content, `order` as position
			FROM news WHERE 1";
		if($id != ""){
			// Append query using .=
			$query .= " and id=".$this->db->escape($id);
		}
		$query .= " order by timestamp desc
			limit 0,10";
		return $this->db->query($query);
	}

	public function get_news_with_category(){
		$this->db->SELECT("news.id, news_category.name as category_name,
			category_id, author, title, date_format(news.timestamp, '%d-%b-%Y %h:%i:%s') as timestamp_display,
			publish, slug, content, `order` as position", FALSE);
		$this->db->FROM('news');
		$this->db->join('news_category', 'news_category.id = news.category_id'); //tablename.field
		return $this->db->get();
	}

	public function get_published_news(){

	}

	public function delete_news($post){
		$this->db->delete('news', array('id' => $post["id"]));
	}

	public function get_count(){
		$query = $this->db->get('news');
		return $query->num_rows();
	}
}