<?php

// models/Mascotas.php

class Veterinarios extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT * FROM veterinario");
		return $this->db->fetchAll();
	}


}
?>