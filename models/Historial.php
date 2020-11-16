<?php

// models/Historial.php

class Historial extends Model {
	
	public function getHistorial() {
        $this->db->query("SELECT id_mascota, id_profesional, DATE_FORMAT(fecha,'%d/%m/%Y %H:%i') as fecha, precio, peso, notas FROM historial ");		
        return $this->db->fetchAll();
	}

	public function getPorMascota($id_mascota) {
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		$this->db->query("SELECT id_mascota, per.tipo, per.nombre_apellido as nombre_prof, DATE_FORMAT(fecha,'%d/%m/%Y %H:%i') as fecha, precio, peso, notas FROM historial hist join persona per on per.dni = hist.id_profesional where id_mascota = $id_mascota");		
        return $this->db->fetchAll();
	}

	public function agregar($id_profesional, $id_mascota, $fecha, $precio, $peso, $notas) {
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		if (!is_int($id_profesional)) {
            die("id_profesional debe ser int");
		}
		$fecha = $this->db->escape($fecha);
		if (!is_float($precio)) {
			die("precio debe ser int");
		}
		if (!is_float($peso)) {
			die("peso debe ser int");
		}
		$notas = $this->db->escapeWildcards($this->db->escape($notas));
		$this->db->query("INSERT INTO historial(id_mascota,id_profesional,fecha,precio,peso,notas) VALUES ($id_mascota,$id_profesional,'$fecha',$precio,$peso,'$notas')");
	}
}
