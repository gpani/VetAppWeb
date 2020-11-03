<?php
// models/Clientes.php

class Clientes extends Model {
 
    public function __construct(){
        $this->db = Database::getInstance();

    }

    public function getTodos(){

        $this->db->query("SELECT nombre_apellido, dni, direccion, telefono, usuario, email FROM persona WHERE tipo = 'cliente'");
        return $this->db->fetchAll();
    }

}

?>