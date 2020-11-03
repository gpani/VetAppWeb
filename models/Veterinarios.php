<?php

// models/Mascotas.php

class Veterinarios extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT dni,matricula,usuario,nombre_apellido,direccion,telefono,email FROM persona WHERE tipo = 'veterinario'");
		return $this->db->fetchAll();
	}


}
?>