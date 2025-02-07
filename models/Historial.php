<?php

// models/Historial.php

class Historial extends Model {
	
	public function getHistorial() {
		$this->db->query("SELECT h.id,masc.nombre as mascota, prof.nombre_apellido as profesional, DATE_FORMAT(fecha,'%d/%m/%Y') as fecha, precio, peso, notas FROM historial h join mascota masc on id_mascota = masc.id
		join persona prof on prof.dni = id_profesional order by h.id");
        return $this->db->fetchAll();
	}	

	public function getPorMascota($id_mascota) {
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		$this->db->query("SELECT id_mascota, per.tipo, per.nombre_apellido as nombre_prof, DATE_FORMAT(fecha,'%d/%m/%Y %H:%i') as fecha, precio, peso, notas FROM historial hist join persona per on per.dni = hist.id_profesional where id_mascota = $id_mascota");		
        return $this->db->fetchAll();
	}

	public function getPorProfesional($id_profesional) {
		if (!is_int($id_profesional)) {
            die("id_profesional debe ser int");
		}
		$this->db->query("SELECT h.id,masc.nombre,DATE_FORMAT(h.fecha,'%d/%m/%Y') as fecha,h.precio,h.peso,h.notas FROM historial h
		join mascota masc on masc.id = h.id_mascota where id_profesional = $id_profesional order by h.fecha desc");		
        return $this->db->fetchAll();
	}

	public function agregar($id_profesional, $id_mascota, $fecha, $precio, $peso, $notas) {
		if (!is_int($id_mascota)) {
            die("id_mascota debe ser int");
		}
		if (!is_int($id_profesional)) {
            die("id_profesional debe ser int");
		}
		$fecha = $this->db->escape($fecha);
		if ($fecha == '') {
			die("fecha incorrecta");
		}
		if (!is_float($precio)) {
			die("precio debe ser float");
		}
		if (!is_float($peso)) {
			die("peso debe ser float");
		}
		$fecha = $this->db->escape($fecha);
		$notas = substr($notas, 0, 10000);
		$notas = $this->db->escapeWildcards($this->db->escape($notas));
		$this->db->query("INSERT INTO historial(id_mascota,id_profesional,fecha,precio,peso,notas) VALUES ($id_mascota,$id_profesional,'$fecha',$precio,$peso,'$notas')");
	}

	public function actualizar($id, $fecha, $precio, $peso, $notas) {
        if (!is_int($id)) {
            die("Historial::actualizar id debe ser int");
		}
		if (!is_float($precio)) {
			die("precio debe ser float");
		}
		if (!is_float($peso)) {
			die("peso debe ser float");
		}
		$fecha = $this->db->escapeWildcards($fecha);
		$notas = substr($notas, 0, 10000);
		$notas = $this->db->escapeWildcards($this->db->escape($notas));
        $this->db->query("UPDATE historial SET fecha=DATE(STR_TO_DATE('$fecha','%d/%m/%Y')), precio=$precio, peso=$peso, notas='$notas' where id=$id");
    }

	public function baja($id) {
		if (!is_int($id)) {
            die("Historial::baja: id debe ser int");
		}
		$this->db->query("DELETE from historial where id=$id");
	}
}
