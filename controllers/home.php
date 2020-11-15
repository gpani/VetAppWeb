<?php

// controllers/home.php

require '../fw/fw.php';
require '../views/Home.php';
require '../models/Personas.php';
require '../models/Mascotas.php';
require '../models/Turnos.php';
require '../models/Historial.php';

$p = new Personas();

if (!$p->hay_sesion()) {
    header('location:./login.php');
}
if (($_SESSION['user']['tipo'] == 'veterinario') ||
    ($_SESSION['user']['tipo'] == 'estilista') ) {
    header('location:./homeProfesional.php');
}

$v = new Home();
$v->user = $_SESSION['user'];

$masc = new Mascotas();
$v->mascotas = $masc->getByIdCliente(intval($v->user['dni']));
$t = new Turnos();
$h = new Historial();
foreach ($v->mascotas as $m) {
    $v->turnos[$m['nombre']] = $t->getTurnosDeMascota(intval($m['id']));
    $v->historial[$m['nombre']] = $h->getPorMascota(intval($m['id']));
}
$v->render();

?>
