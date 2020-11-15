<?php

// controllers/listaTurnos.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../views/ListadoTurnos.php';

$e = new Turnos();
$vetTurno = $e->getTurnosVeterinaria();
$peluTurno = $e->getTurnosPeluqueria();

$v = new ListadoTurnos();
$v->vetTurno = $vetTurno;
$v->peluTurno = $peluTurno;

$v->render();

?>
