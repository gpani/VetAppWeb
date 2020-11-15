<?php

// controllers/listaTurnos.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../models/Personas.php';

$e = new Personas();
if (!$e->hay_sesion()) {
    header('location:./login.php');
}

if (isset($_GET['idtur'])) {
    $e = new Turnos();
    $e->baja(intval($_GET['idtur']));
    header('location:./home.php');
}

?>
