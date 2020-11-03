<?php

// models/Turnos.php

class Turnos extends Model {
	
	public function getTurnosVeterinaria() {
		$this->db->query("SELECT turno.id,fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre,precio,notas FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.id = turno.id_profesional INNER JOIN persona due on due.id = mascota.dueño where prof.tipo = 'veterinario'");
		return $this->db->fetchAll();
	}

	public function getTurnosPeluqueria() {
		$this->db->query("SELECT turno.id,fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre,precio,notas FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.id = turno.id_profesional INNER JOIN persona due on due.id = mascota.dueño where prof.tipo = 'estilista'");
		return $this->db->fetchAll();
	}

}
