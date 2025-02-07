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
        $usuario = substr($usuario, 0, 128);
        $usuario = $this->db->escape($usuario);
        $password = sha1($this->db->escape($password));
        $nombre_apellido = substr($nombre_apellido, 0, 150);
        $nombre_apellido = $this->db->escape($nombre_apellido);
        $tipo = substr($tipo, 0, 128);
        $tipo = $this->db->escape($tipo);
        $direccion = substr($direccion, 0, 200);
        $direccion = $this->db->escape($direccion);
        $telefono = substr($telefono, 0, 50);
        $telefono = $this->db->escape($telefono);
        $email = substr($email, 0, 320);
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

    public function actualizar($dni, $nombre_apellido, $tipo, $direccion, $telefono, $usuario, $email) {
        if (!is_int($dni)) {
            die("dni debe ser int");
        }
        $nombre_apellido = substr($nombre_apellido, 0, 150);
        $nombre_apellido = $this->db->escape($nombre_apellido);
        $tipo = substr($tipo, 0, 128);
        $tipo = $this->db->escape($tipo);
        $direccion = substr($direccion, 0, 200);
        $direccion = $this->db->escape($direccion);
        $telefono = substr($telefono, 0, 50);
        $telefono = $this->db->escape($telefono);
        $usuario = substr($usuario, 0, 128);
        $usuario = $this->db->escape($usuario);
        $email = substr($email, 0, 320);
        $email = $this->db->escape($email);

        $this->db->query("UPDATE persona SET nombre_apellido='$nombre_apellido', tipo='$tipo', direccion='$direccion', telefono='$telefono', usuario='$usuario', email='$email' where dni=$dni");
    }

	public function baja($dni) {
		if (!is_int($dni)) {
            die("baja: dni debe ser int");
		}
		$this->db->query("DELETE from persona where dni=$dni");
	}
}
