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
    header('location:./login');
}
switch ($_SESSION['user']['tipo']) {
case 'cliente':
    header('location:./homeCliente');
case 'estilista':
case 'veterinario':
    header('location:./homeProfesional');
}

$m = new Mascotas();
$h = new Historial();
$t = new Turnos();

if (isset($_POST['modo'])) {
    switch ($_POST['modo']) {
    case 'ModifPersona':
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
    case 'BajaPersona':
        $p->baja(intval($_POST['dni']));
        break;
    case 'ModifMascota':
        $m->actualizar(
            intval($_POST['id']),
            $_POST['nombre'],
            $_POST['especie'],
            $_POST['raza'],
            $_POST['sexo'],
            $_POST['fecha_nac']
        );
        break;
    case 'BajaMascota':
        $m->baja(intval($_POST['id']));
        break;
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
    case 'ModifTurno':
        $t->actualizar(
            intval($_POST['id']),
            $_POST['fecha_hora'],
        );
        break;
    case 'BajaTurno':
        $t->baja(intval($_POST['id']));
        break;
    }
}

$v = new HomeAdministrador();
$v->user = $_SESSION['user'];

$v->turnosPel = $t->getTurnosPeluqueria();
$v->turnosVet = $t->getTurnosVeterinaria();
$v->personas = $p->getTodos();
$v->mascotas = $m->getTodos();
$v->historial = $h->getHistorial();

$v->render();

?>
