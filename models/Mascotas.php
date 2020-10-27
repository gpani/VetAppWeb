<?php

// models/Mascotas.php

class Mascotas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT mascota.nombre,mascota.edad, mascota.raza, mascota.peso, mascota.Id_mascota, Persona.nombre_apellido 
FROM mascota 
INNER JOIN cliente 
INNER JOIN Persona
ON mascota.Id_duenno=cliente.Id_cliente and cliente.Id_persona=Persona.id_persona");
		return $this->db->fetchAll();
	}

	public function getByCliente($id_cliente){
		$this->db->query("SELECT mascota.nombre,mascota.edad, mascota.raza, mascota.peso, mascota.Id_mascota, Persona.nombre_apellido 
FROM mascota 
INNER JOIN cliente 
INNER JOIN Persona
ON mascota.Id_duenno=cliente.Id_cliente and cliente.Id_persona=Persona.id_persona
WHERE cliente.Id_cliente=$id_cliente");
		return $this->db->fetchAll();

	}

}
?>