<?php

// models/Mascotas.php

class Mascotas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT nombre,especie,raza,fecha_nac,persona.nombre_apellido FROM mascota
			INNER JOIN persona WHERE persona.id = mascota.dueño");
		return $this->db->fetchAll();
	}

	public function getByIdCliente($id_cliente){
		$this->db->query("SELECT nombre,especie,raza,fecha_nac FROM mascota
WHERE dueño='$id_cliente'");
		return $this->db->fetchAll();

	}

}
