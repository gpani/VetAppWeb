<?php

// models/Turnos.php

class Turnos extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT * FROM turno");
		return $this->db->fetchAll();
	}


}
?>