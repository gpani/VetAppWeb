<?php
// models/Clientes.php

class Clientes extends Model {
 
    public function getTodos(){
        $this->db->query("SELECT nombre_apellido, dni, direccion, telefono, usuario, email FROM persona WHERE tipo = 'cliente'");
        return $this->db->fetchAll();
    }

    public function getActual(){
        session_start();
        if (isset($_SESSION['id']) && ($_SESSION['user']['tipo'] == 'cliente')) {
            return $_SESSION['user'];
        } else {
            return null;
        }
    }

}
