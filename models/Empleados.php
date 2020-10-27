<?php

// models/Empleados.php

class Empleados extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT empleado.Id_empleado, Persona.nombre_apellido FROM empleado INNER JOIN Persona ON empleado.Id_persona=Persona.id_persona");
		return $this->db->fetchAll();
	}


}
?>