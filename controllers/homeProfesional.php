<?php

// controllers/home.php

require '../fw/fw.php';
require '../views/HomeProfesional.php';
require '../models/Personas.php';
require '../models/Turnos.php';
require '../models/Historial.php';

$p = new Personas();
if (!$p->hay_sesion()) {
    header('location:./login.php');
}
if ($_SESSION['user']['tipo'] == 'cliente') {
    header('location:./home.php');
}

$v = new HomeProfesional();
$v->user = $_SESSION['user'];

$t = new Turnos();
$h = new Historial();

$v->turnos = $t->getTurnosDeProfesional(intval($v->user['dni']));

$v->render();

?>
