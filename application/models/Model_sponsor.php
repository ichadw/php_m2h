<?php
class Model_sponsor extends CI_Model {

	public function get_sponsor() {
		$query = "SELECT * FROM sponsor";
		return $this->db->query($query)->result();
	}

}

?>
