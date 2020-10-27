<?php

// models/Peluqueros.php

class Peluqueros extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT * FROM peluquero");
		return $this->db->fetchAll();
	}


}
?>