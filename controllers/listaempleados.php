<?php

// controllers/listaempleados.php

require '../fw/fw.php';
require '../models/Empleados.php';
require '../views/ListadoEmpleados.php';

$e = new Empleados();
$todos = $e->getTodos();

//var_dump($todos);

$v = new ListadoEmpleados();
$v->empleados = $todos;
$v->render();