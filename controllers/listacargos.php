<?php

// controllers/listacargos.php

require '../fw/fw.php';
require '../models/Cargos.php';
require '../views/ListadoCargos.php';

$m = new Cargos();
$cargos = $m->getTodos();

$v = new ListadoCargos();
$v->cargos = $cargos;
$v->render();