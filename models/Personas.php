<?php

// models/Personas.php

class Personas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT * FROM Persona");
		return $this->db->fetchAll();
	}


}
?>