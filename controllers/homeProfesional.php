<?php

// controllers/home.php

require '../fw/fw.php';
require '../views/HomeProfesional.php';
require '../models/Personas.php';
require '../models/Turnos.php';
require '../models/Historial.php';
require '../models/Mascotas.php';

$p = new Personas();
if (!$p->hay_sesion()) {
    header('location:./login');
}
/* chequeo tipo de usuario logueado y redirecciono a su home
segun el tipo */
switch ($_SESSION['user']['tipo']) {
case 'cliente':
    header('location:./homeCliente');
case 'administrador':
    header('location:./homeAdministrador');
}

$v = new HomeProfesional();
$v->user = $_SESSION['user'];
$v->mensaje = null;

$h = new Historial();

if (isset($_POST['modo'])) {
    switch ($_POST['modo']) {
    case 'ModifHistorial':
        $h->actualizar(
            intval($_POST['id']),
            $_POST['fecha'],
            floatval($_POST['precio']),
            floatval($_POST['peso']),
            $_POST['notas']
        );
        break;
    case 'BajaHistorial':
        $h->baja(intval($_POST['id']));
        break;
    }
} else if (isset($_POST['id_mascota'])) {
    $h->agregar(
        intval($v->user['dni']),
        intval($_POST['id_mascota']),
        $_POST['fecha'],
        floatval($_POST['precio']),
        floatval($_POST['peso']),
        $_POST['notas']
    );
    $v->mensaje = "Registrado correctamente.";
}

$t = new Turnos();
$m = new Mascotas();

$v->turnos = $t->getTurnosDeProfesional(intval($v->user['dni']));
$v->mascotas = $m->getTodos();
$v->historial = $h->getPorProfesional(intval($v->user['dni']));
$v->render();

?>
