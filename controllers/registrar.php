<?php

// controllers/registrar.php

require '../fw/fw.php';
require '../views/Registrar.php';
require '../models/Personas.php';

$m = new Personas();
$v = new Registrar();

if(isset($_POST["nombre_apellido"])){
    $m->agregar(
        intval($_POST["dni"]), 
        $_POST["usuario"],
        $_POST["password"],
        $_POST["nombre_apellido"],
        $_POST["tipo"],
        $_POST["direccion"],
        $_POST["telefono"],
        $_POST["email"]);
    header('location:./login.php');
}

$v->listaTipos = $m->listarTipos();
$v->render();

?>
