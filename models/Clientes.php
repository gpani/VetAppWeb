<?php
// models/Clientes.php

class Clientes extends Model {
 
    public function __construct(){
        $this->db = Database::getInstance();

    }

    public function getTodos(){

        $this->db->query("SELECT cliente.Id_cliente, Persona.nombre_apellido, Persona.edad, Persona.dni, Persona.dirección, Persona.nro_telefono, Persona.usuario, Persona.email FROM cliente INNER JOIN Persona ON cliente.Id_persona=Persona.id_persona");
        return $this->db->fetchAll();
    }

}

?>