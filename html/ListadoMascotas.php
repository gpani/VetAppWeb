<!-- html/ListadoMascotas.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Listado de mascotas</title>
</head>
<body>

	<h1>Listado de Mascotas</h1>


	<table>
		<tr><th>Nombre</th><th>Edad</th><th>Raza</th><th>Peso</th><th>Id_mascota</th> <th>Dueño</th></tr>

		<?php foreach($this->mascotas as $e) { ?>
		<tr><td><?= $e['nombre'] ?></td> <td><?= $e['edad'] ?></td>  <td><?= $e['raza'] ?></td>  <td><?= $e['peso'] ?></td> <td><?= $e['Id_mascota'] ?></td> <td><?= $e['nombre_apellido'] ?></td></tr>
		<?php } ?>

	</table>
</body>
</html>