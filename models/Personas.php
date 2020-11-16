<?php
// models/Personas.php

class Personas extends Model {
 
    public function getTodos(){
        $this->db->query("SELECT nombre_apellido, dni, direccion, telefono, usuario, email, tipo FROM persona");
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

    public function login($usuario, $password) {
        $usuario = $this->db->escape($usuario);
        $password = $this->db->escape($this->db->escapeWildcards($password));
        $this->db->query("SELECT * FROM persona WHERE usuario = '$usuario'");
        $respuesta = $this->db->fetchAll();
        if (sha1($password) === $respuesta[0]['password']) {
            session_start();
            $_SESSION['id'] = session_id();
            $_SESSION['user'] = $respuesta[0];
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        session_start();
        if (isset($_SESSION['id'])) {
            session_destroy();
            return true;
        } else {
            return false;
        }
    }

    public function hay_sesion() {
        session_start();
        return isset($_SESSION['id']);
    }

    public function listarTipos(){
        $this->db->query("SELECT tipo FROM tipo_persona");
        return $this->db->fetchAll();
    }

}
