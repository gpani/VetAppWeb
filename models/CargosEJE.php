<?php

// models/Cargos.php

class Cargos extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM cargos");
		return $this->db->fetchAll();
	}

}