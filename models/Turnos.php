<?php

// models/Turnos.php

class Turnos extends Model {
	
	public function getTurnosVeterinaria() {
		$this->db->query("SELECT turno.id,DATE_FORMAT(fecha_hora,'%d/%m/%Y %H:%i') as fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.dni = turno.id_profesional INNER JOIN persona due on due.dni = mascota.dueño where prof.tipo = 'veterinario'");
		return $this->db->fetchAll();
	}

	public function getTurnosPeluqueria() {
		$this->db->query("SELECT turno.id,DATE_FORMAT(fecha_hora,'%d/%m/%Y %H:%i') as fecha_hora,prof.nombre_apellido as profesional,due.nombre_apellido as dueño,mascota.nombre FROM turno INNER JOIN mascota on mascota.id=turno.id_mascota INNER JOIN persona prof on prof.dni = turno.id_profesional INNER JOIN persona due on due.dni = mascota.dueño where prof.tipo = 'estilista'");
		return $this->db->fetchAll();
	}

	public function getTurnosDeMascota($id_mascota) {
		if (!is_int($id_mascota)) {
            die("getTurnosDeMascota: id_mascota debe ser int");
		}
		$this->db->query("SELECT DATE_FORMAT(tur.fecha_hora,'%d/%m/%Y %H:%i') as fecha_hora, per.tipo,per.nombre_apellido FROM turno tur join persona per on tur.id_profesional = per.dni where id_mascota = $id_mascota order by tur.fecha_hora");
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
	}
}
