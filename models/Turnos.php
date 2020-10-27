<?php

// models/Turnos.php

class Turnos extends Model {
	
	public function getTurnosVeterinaria() {
		$this->db->query("SELECT turno.id_turno, turno.fecha_turno, mascota.nombre, vet.nombre_apellido as veterinario, cli.nombre_apellido as cliente
		FROM turno
		INNER JOIN veterinario on veterinario.id_veterinario = turno.id_veterinario
		INNER JOIN cliente on cliente.Id_cliente = turno.id_turno
		INNER JOIN mascota on mascota.Id_mascota =turno.id_mascota
		INNER JOIN Persona vet on vet.id_persona = veterinario.id_persona
		INNER JOIN Persona cli on cli.id_persona = cliente.Id_persona");
		return $this->db->fetchAll();
	}

	public function getTurnosPeluqueria() {
		$this->db->query("SELECT turno.id_turno, turno.fecha_turno, mascota.nombre, pel.nombre_apellido as peluquero, cli.nombre_apellido as cliente
		FROM turno
		INNER JOIN peluquero on peluquero.id_peluquero = turno.id_peluquero
		INNER JOIN cliente on cliente.Id_cliente = turno.id_turno
		INNER JOIN mascota on mascota.Id_mascota =turno.id_mascota
		INNER JOIN Persona pel on pel.id_persona = peluquero.id_persona
		INNER JOIN Persona cli on cli.id_persona = cliente.Id_persona");
		return $this->db->fetchAll();
	}


}
?>