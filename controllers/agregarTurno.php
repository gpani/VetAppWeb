<?php

// controllers/agregarTurno.php

require '../fw/fw.php';
require '../views/AgregarTurnos.php';
require '../models/Mascotas.php';
require '../models/Estilistas.php';
require '../models/Veterinarios.php';
require '../models/Clientes.php';

if (isset($_POST["id_profesional"])){
    require '../models/Turnos.php';
    $m = new Turnos();
    $m->agregar(
        intval($_POST["id_profesional"]),
        intval($_POST["mascota"]),
        $_POST["fecha"]
    );
    exit("Agregado. <a href='./home.php'>Ir al inicio.</a>");
}

$v = new AgregarTurnos();

$mascotas = new Mascotas();
$estilistas = new Estilistas();
$veterinarios = new Veterinarios();
$m = new Clientes();
$actual = $m->getActual();
if ($actual) {
    $v->mascotas = $mascotas->getByIdCliente(intval($actual['dni']));
} else {
    $v->mascotas = $mascotas->getTodos();
}
$v->estilistas = $estilistas->getTodos();
$v->veterinarios = $veterinarios->getTodos();
$v->render();

?>