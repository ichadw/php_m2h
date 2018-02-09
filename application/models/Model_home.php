<?php
class Model_home extends CI_Model {

	public function get_latest_news() {
		$query = "SELECT * FROM news WHERE publish=1 ORDER BY news.timestamp DESC LIMIT 3";
		return $this->db->query($query)->result();
	}

	public function get_latest_matches(){
		$query = "SELECT s.*, t_home.name as home_name, t_home.image as home_image, t_away.name as away_name, t_away.image as away_image FROM schedule s ".
					"LEFT JOIN team t_home ON s.id_home = t_home.id ".
					"LEFT JOIN team t_away ON s.id_away = t_away.id ".
					"ORDER BY s.date DESC LIMIT 3";
		return $this->db->query($query)->result();
	}

	public function get_players() {
		$query = "SELECT * FROM player ORDER BY name";
		return $this->db->query($query)->result();
	}

	public function get_latest_videos() {
		$query = "SELECT * FROM channel ORDER BY channel.created_at DESC LIMIT 3";
		return $this->db->query($query)->result();
	}
}

?>
