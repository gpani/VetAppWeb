<?php

// controllers/agregarTurno.php

require '../fw/fw.php';
require '../views/AgregarTurnos.php';
require '../models/Mascotas.php';
require '../models/Estilistas.php';
require '../models/Veterinarios.php';

if (isset($_POST["id_profesional"])){
    require '../models/Turnos.php';
    $m = new Turnos();
    $m->agregar(
        $_POST["id_profesional"],
        $_POST["mascota"],
        $_POST["fecha"]
    );
    exit("Turno solicitado");
}

$v = new AgregarTurnos();

$mascotas = new Mascotas();
$estilistas = new Estilistas();
$veterinarios = new Veterinarios();
$v->mascotas = $mascotas->getTodos();
$v->estilistas = $estilistas->getTodos();
$v->veterinarios = $veterinarios->getTodos();
$v->render();

?>