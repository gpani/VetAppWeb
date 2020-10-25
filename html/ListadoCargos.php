<!-- html/ListadoCargos.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Listado de cargos de la empresa</title>
</head>
<body>

	<h1>Listado de cargos</h1>

	<?php foreach($this->cargos as $c) { ?>

		<?= $c['descripcion'] ?> <br/>

	<?php } ?>


</body>
</html>