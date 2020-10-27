<?php

// controllers/listaClientes.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/ListadoClientes.php';

$e = new Clientes();
$todos = $e->getTodos();

//var_dump($todos);

$v = new ListadoClientes();
$v->clientes = $todos;
$v->render();