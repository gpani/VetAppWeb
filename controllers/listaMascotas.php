<?php

// controllers/listaempleados.php

require '../fw/fw.php';
require '../models/Mascotas.php';
require '../views/ListadoMascotas.php';

$e = new Mascotas();
$todos = $e->getTodos();

//var_dump($todos);

$v = new ListadoMascotas();
$v->mascotas = $todos;
$v->render();

?>
