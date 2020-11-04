<?php

// models/Mascotas.php

class Mascotas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id,nombre,especie,raza,sexo,fecha_nac,persona.nombre_apellido FROM mascota INNER JOIN persona WHERE persona.dni = mascota.dueño");
		return $this->db->fetchAll();
	}

	public function getByIdCliente($id_cliente){
		$this->db->query("SELECT nombre,especie,raza,sexo,fecha_nac FROM mascota WHERE dueño='$id_cliente'");
		return $this->db->fetchAll();

	}

	public function agregar($nombre, $especie, $raza, $sexo, $fecha_nac, $id_dueño) {
		$this->db->query("INSERT INTO `mascota`(`nombre`, `especie`, `raza`, `sexo`, `fecha_nac`, `dueño`) VALUES ('$nombre','$especie','$raza', '$sexo','$fecha_nac',$id_dueño)");
	}

}
