<?php

// controllers/home.php

require '../fw/fw.php';
require '../views/HomeAdministrador.php';
require '../models/Personas.php';
require '../models/Turnos.php';
require '../models/Historial.php';
require '../models/Mascotas.php';

/* verifico tipo de usuario logueado
 y redirecciono a su home si es necesario */
$p = new Personas();
if (!$p->hay_sesion()) {
    header('location:./login.php');
}
switch ($_SESSION['user']['tipo']) {
case 'cliente':
    header('location:./home.php');
case 'estilista':
case 'veterinario':
    header('location:./homeProfesional.php');
}

if (isset($_POST['modo'])) {
    switch ($_POST['modo']) {
    case 'UPDATE':
        $p->actualizar(
            intval($_POST['dni']),
            $_POST['nombre_apellido'],
            $_POST['tipo'],
            $_POST['direccion'],
            $_POST['telefono'],
            $_POST['usuario'],
            $_POST['email']
        );
        break;
    case 'DELETE':
        $p->baja(intval($_POST['dni']));
        break;
    }
}

$v = new HomeAdministrador();
$v->user = $_SESSION['user'];

$h = new Historial();
$t = new Turnos();
$m = new Mascotas();

$v->turnosPel = $t->getTurnosPeluqueria();
$v->turnosVet = $t->getTurnosVeterinaria();
$v->personas = $p->getTodos();
$v->mascotas = $m->getTodos();
$v->historial = $h->getHistorial();

$v->render();

?>
