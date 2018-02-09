<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cust extends CI_Model {

	public function check_credential()
	{
		$email = set_value('email');
		$password = set_value('password');

		$hasil = $this->db->where('email', $email)
						  ->where('password', $password)
						  ->limit(1)
						  ->get('cust');

		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

    public $db_table = 'cust';

  public function get_cust(){
    $query = "SELECT * FROM ".$this->db_table;
    return $this->db->query($query)->result();
  }

  public function get_one($id){
    $query = "SELECT * FROM ".$this->db_table." WHERE id=".$id;
    return $this->db->query($query)->row();
  }

  public function get_cust_per_page($limit, $offset) {
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

  function all_cust($limit,$start,$col,$dir){
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

  function cust_search($limit,$start,$search,$col,$dir){
    $query = $this
    ->db
    ->like('fname',$search)
    ->or_like('address',$search)
    ->or_like('phone_numb',$search)
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

  function cust_search_count($search){
    $query = $this
    ->db
    ->like('fname',$search)
    ->or_like('address',$search)
    ->or_like('phone_numb',$search)
    ->get($this->db_table);

    return $query->num_rows();
  }

  public function update_cust($id, $data = array()){
    $this->db->where('id', $id);
    $this->db->update('cust',$data);

    return $this->db->affected_rows() ? true : false;
  }

  public function add_cust($data = array()){
    $this->db->insert('cust',$data);

    return $this->db->affected_rows() ? true : false;
  }
  public function delete_cust($id){
    $this->db->where('id', $id);
    $this->db->delete('cust');
  }
}
