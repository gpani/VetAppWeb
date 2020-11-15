<?php
// models/Personas.php

class Personas extends Model {
 
    public function getTodos(){
        $this->db->query("SELECT nombre_apellido, dni, direccion, telefono, usuario, email FROM persona");
        return $this->db->fetchAll();
    }

    public function agregar($dni, $usuario, $password, $nombre_apellido, $tipo, $direccion, $telefono, $email){
        if (!is_int($dni)) {
            die("dni debe ser int");
        }
        $usuario = $this->db->escape($usuario);
        $password = sha1($this->db->escape($password));
        $nombre_apellido = $this->db->escape($nombre_apellido);
        $tipo = $this->db->escape($tipo);
        $direccion = $this->db->escape($direccion);
        $telefono = $this->db->escape($telefono);
        $email = $this->db->escape($email);
        $this->db->query("INSERT INTO `persona` (`dni`, `usuario`, `password`, `nombre_apellido`, `tipo`, `direccion`, `telefono`, `email`) VALUES ($dni, '$usuario', '$password', '$nombre_apellido', '$tipo', '$direccion', '$telefono', '$email')");
    }

    public function listarTipos(){
        $this->db->query("SELECT tipo FROM tipo_persona");
        return $this->db->fetchAll();
    }

}
