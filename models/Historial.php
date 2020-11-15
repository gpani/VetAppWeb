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
}
