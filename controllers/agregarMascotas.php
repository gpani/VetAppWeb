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
        $_POST["dueño"]);
    exit("Agregado.");
}

$m = new Clientes();
$v = new AgregarMascotas();
$v->clientes = $m->getTodos();
$v->render();

?>
