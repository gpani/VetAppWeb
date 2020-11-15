<?php

// controllers/home.php

require '../fw/fw.php';
require '../views/Home.php';
require '../models/Personas.php';
require '../models/Mascotas.php';

$p = new Personas();

if (!$p->hay_sesion()) {
    header('location:./login.php');
}

$v = new Home();
$v->user = $_SESSION['user'];

$masc = new Mascotas();
$v->mascotas = $masc->getByIdCliente(intval($v->user['dni']));

$v->render();

?>
