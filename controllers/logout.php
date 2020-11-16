<?php

require '../fw/fw.php';
require '../models/Personas.php';

$p = new Personas();
$p->logout();
header('location:./login');

?>