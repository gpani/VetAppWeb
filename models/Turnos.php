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
		$this->db->query("SELECT tur.id,DATE_FORMAT(tur.fecha_hora,'%d/%m/%Y %H:%i') as fecha_hora, per.tipo,per.nombre_apellido FROM turno tur join persona per on tur.id_profesional = per.dni where id_mascota = $id_mascota order by tur.fecha_hora");
		return $this->db->fetchAll();
	}

	function verificar($id_profesional, $fecha_hora) {
		if(time() >= strtotime($fecha_hora)) {
			return "La fecha pedida para el turno no es válida.";
		}
		$dt = new DateTime($fecha_hora);
		if (($dt->format("H") > 18) || ($dt->format("H") < 10)) {
			return "La hora del turno está fuera del horario de atención.";
		}
		$this->db->query("SELECT count(*) as cantidad FROM turno where id_profesional = $id_profesional and fecha_hora = '$fecha_hora'");
		$respuesta = $this->db->fetchAll();
		if(intval($respuesta[0]['cantidad']) == 0) {
			return 0;
		} else {
			return "El profesional no está disponible en ese horario, por favor elegí otro.";
		}
	}

	public function agregar($id_profesional, $id_mascota, $fecha_hora) {
		if (!is_int($id_profesional)) {
            die("id_profesional debe ser int");
		}
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		$fecha_hora = $this->db->escape($fecha_hora);
		$dt = new DateTime($fecha_hora);
		$dt->setTime($dt->format("H"), 0, 0, 0);
		$fecha_hora = strftime("%Y/%m/%d %H:%M", $dt->getTimestamp());
		$retval = $this->verificar($id_profesional, $fecha_hora);
		if ($retval === 0) {
			$this->db->query("INSERT INTO `turno`(`id_profesional`, `id_mascota`, `fecha_hora`) VALUES ($id_profesional,$id_mascota,'$fecha_hora')");
		}
		return $retval;
	}

	public function baja($id_turno) {
		if (!is_int($id_turno)) {
            die("baja: id_turno debe ser int");
		}
		$this->db->query("DELETE from turno where id = $id_turno");
	}
}
