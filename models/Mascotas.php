<?php

// models/Mascotas.php

class Mascotas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id,nombre,especie,raza,sexo,fecha_nac,persona.nombre_apellido FROM mascota INNER JOIN persona WHERE persona.dni = mascota.dueño");
		return $this->db->fetchAll();
	}

	public function getByIdCliente($id_cliente){
		if (!is_int($id_cliente)) {
			die("Mascotas::getByIdCliente: id_cliente debe ser int");
		}
		$this->db->query("SELECT nombre,especie,raza,sexo,fecha_nac FROM mascota WHERE dueño=$id_cliente");
		return $this->db->fetchAll();

	}

	public function agregar($nombre, $especie, $raza, $sexo, $fecha_nac, $id_dueño) {
		$nombre = $this->db->escape($nombre);
		$especie = $this->db->escape($especie);
		$raza = $this->db->escape($raza);
		$sexo = $this->db->escape($sexo);
		$fecha_nac = $this->db->escape($fecha_nac);
		if (!is_int($id_dueño)) {
			die("id_dueño debe ser int");
		}
		$this->db->query("INSERT INTO `mascota`(`nombre`, `especie`, `raza`, `sexo`, `fecha_nac`, `dueño`) VALUES ('$nombre','$especie','$raza', '$sexo','$fecha_nac',$id_dueño)");
	}

}
