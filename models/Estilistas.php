<?php

// models/Estilistas.php

class Estilistas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT dni,matricula,usuario,nombre_apellido,direccion,telefono,email FROM persona WHERE tipo = 'estilista'");
		return $this->db->fetchAll();
	}
}
?>