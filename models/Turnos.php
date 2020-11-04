<?php

// models/Turnos.php

class Turnos extends Model {
	
	public function getTurnosVeterinaria() {
		$this->db->query("SELECT turno.id,fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.dni = turno.id_profesional INNER JOIN persona due on due.dni = mascota.dueño where prof.tipo = 'veterinario'");
		return $this->db->fetchAll();
	}

	public function getTurnosPeluqueria() {
		$this->db->query("SELECT turno.id,fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.dni = turno.id_profesional INNER JOIN persona due on due.dni = mascota.dueño where prof.tipo = 'estilista'");
		return $this->db->fetchAll();
	}

	public function agregar($id_profesional, $id_mascota, $fecha_hora) {
		$this->db->query("INSERT INTO `turno`(`id_profesional`, `id_mascota`, `fecha_hora`) VALUES ($id_profesional,$id_mascota,'$fecha_hora')");
	}
}
