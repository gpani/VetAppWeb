<?php

// controllers/agregarMascota.php

require '../fw/fw.php';
require '../views/AgregarMascotas.php';
require '../models/Clientes.php';

if (isset($_POST["nombre"])){
    require '../models/Mascotas.php';
    $m = new Mascotas();
    $m->agregar(
        $_POST["nombre"], 
        $_POST["especie"],
        $_POST["raza"],
        $_POST["sexo"],
        $_POST["fecha_nac"],
        intval($_POST["dueño"]));
    header('location:./homeCliente');
}

$v = new AgregarMascotas();

$m = new Clientes();
$actual = $m->getActual();
if ($actual) { /* si esta logueado un cliente, la mascota se agrega solo a ese cliente */
    $v->clientes = [$actual];
} else {
    $v->clientes = $m->getTodos();
}

$v->render();

?>
