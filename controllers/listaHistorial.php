<?php

// controllers/listaHistorial.php

require '../fw/fw.php';
require '../models/Historial.php';
require '../views/ListadoHistorial.php';

$e = new Historial();
$v = new ListadoHistorial();

$v->vetHistorial = $e->getHistorial();

$v->render();

?>