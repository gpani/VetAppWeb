<?php

// controllers/login.php

require '../fw/fw.php';
require '../views/Login.php';

$v = new Login();
$v->error = null;

if (isset($_POST["username"])) {
    require '../models/Personas.php';
    $p = new Personas();
    if ($p->login($_POST["username"], $_POST["password"])) {
        header('location:./home.php');
    } else {
        $v->error = "Login incorrecto!";
    }
}

$v->render();

?>
