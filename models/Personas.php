<?php
// models/Personas.php

class Personas extends Model {
 
    public function getTodos(){
        $this->db->query("SELECT nombre_apellido, dni, direccion, telefono, usuario, email FROM persona");
        return $this->db->fetchAll();
    }

    public function agregar($dni, $usuario, $password, $nombre_apellido, $tipo, $direccion, $telefono, $email){
        $this->db->query("INSERT INTO `persona` (`dni`, `usuario`, `password`, `nombre_apellido`, `tipo`, `direccion`, `telefono`, `email`) VALUES ($dni, '$usuario', '$password', '$nombre_apellido', '$tipo', '$direccion', '$telefono', '$email')");
    }
    public function listarTipos(){
        $this->db->query("SELECT tipo FROM tipo_persona");
        return $this->db->fetchAll();
    }

}
