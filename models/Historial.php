<?php

// models/Historial.php

class Historial extends Model {
	
	public function getHistorial() {
        $this->db->query("SELECT id_mascota, id_profesional, DATE_FORMAT(fecha,'%d/%m/%Y %H:%i') as fecha, precio, peso, notas FROM historial ");		
        return $this->db->fetchAll();
	}
/* 
	public function getTurnosPeluqueria() {
		$this->db->query("SELECT turno.id,DATE_FORMAT(fecha_hora,'%d/%m/%Y %H:%i') as fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.dni = turno.id_profesional INNER JOIN persona due on due.dni = mascota.dueño where prof.tipo = 'estilista'");
		return $this->db->fetchAll();
	}

	public function agregar($id_profesional, $id_mascota, $fecha_hora) {
		if (!is_int($id_profesional)) {
            die("id_profesional debe ser int");
		}
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		$fecha_hora = $this->db->escape($fecha_hora);
		$this->db->query("INSERT INTO `turno`(`id_profesional`, `id_mascota`, `fecha_hora`) VALUES ($id_profesional,$id_mascota,'$fecha_hora')");
	} */
}
