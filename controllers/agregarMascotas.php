<?php

// controllers/agregarMascota.php

require '../fw/fw.php';
require '../views/AgregarMascotas.php';

$v = new AgregarMascotas();
$v->render();

?>
