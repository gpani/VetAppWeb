<?php

// models/Mascotas.php

class Mascotas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id,nombre,especie,raza,sexo,DATE_FORMAT(fecha_nac,'%d/%m/%Y') as fecha_nac,persona.nombre_apellido FROM mascota INNER JOIN persona WHERE persona.dni = mascota.dueño");
		return $this->db->fetchAll();
	}

	public function getByIdCliente($id_cliente){
		if (!is_int($id_cliente)) {
			die("Mascotas::getByIdCliente: id_cliente debe ser int");
		}
		$this->db->query("SELECT id,nombre,especie,raza,sexo,DATE_FORMAT(fecha_nac,'%d/%m/%Y') as fecha_nac FROM mascota WHERE dueño=$id_cliente");
		return $this->db->fetchAll();

	}

	public function agregar($nombre, $especie, $raza, $sexo, $fecha_nac, $id_dueño) {
		$nombre = substr($nombre, 0, 150);
		$nombre = $this->db->escape($nombre);
		$especie = substr($especie, 0, 150);
		$especie = $this->db->escape($especie);
		$raza = substr($raza, 0, 150);
		$raza = $this->db->escape($raza);
		if($sexo != 'F' && $sexo !='M'){
			die("sexo debe ser M o F");
		}
		$sexo = $this->db->escape($sexo);
		$fecha_nac = $this->db->escape($fecha_nac);
		if (!is_int($id_dueño)) {
			die("id_dueño debe ser int");
		}
		$this->db->query("INSERT INTO `mascota`(`nombre`, `especie`, `raza`, `sexo`, `fecha_nac`, `dueño`) VALUES ('$nombre','$especie','$raza', '$sexo','$fecha_nac',$id_dueño)");
	}

    public function actualizar($id, $nombre, $especie, $raza, $sexo, $fecha_nac) {
        if (!is_int($id)) {
            die("Mascota::actualizar id debe ser int");
		}
		$nombre = substr($nombre, 0, 150);
		$nombre = $this->db->escape($nombre);
		$especie = substr($especie, 0, 150);
		$especie = $this->db->escape($especie);
		$raza = substr($raza, 0, 150);
		$raza = $this->db->escape($raza);
		if($sexo != 'F' && $sexo !='M'){
			die("sexo debe ser M o F");
		}
        $sexo = $this->db->escape($sexo);
        $fecha_nac = $this->db->escape($fecha_nac);

        $this->db->query("UPDATE mascota SET nombre='$nombre', especie='$especie', raza='$raza', sexo='$sexo', fecha_nac=STR_TO_DATE('$fecha_nac','%d/%m/%Y') where id=$id");
    }

	public function baja($id) {
		if (!is_int($id)) {
            die("Mascota::baja: id debe ser int");
		}
		$this->db->query("DELETE from mascota where id=$id");
	}

}
