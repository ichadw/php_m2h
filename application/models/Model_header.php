<?php
class Model_header extends CI_Model {

	public function get_header() {
		$query = "SELECT * FROM header";
		return $this->db->query($query)->row();
	}

	public function update_header($data = array()){
		$this->db->where('id', 1);
		$this->db->update('header',$data);
	}
}

?>
