<!-- html/ListadoTurnos.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Listado de turnos</title>
</head>
<body>

	<h1>Listado de turnos Veterinario</h1>
	<table>
	
		<tr> <th>id_turno</th>  <th>fecha_turno</th>  <th>nombre</th>  <th>veterinario</th> <th>cliente</th> </tr>

		<?php foreach($this->vetTurno as $e) { ?>
		<tr><td><?= $e['id_turno'] ?></td> <td><?= $e['fecha_turno'] ?></td>  <td><?= $e['nombre'] ?></td>  <td><?= $e['veterinario'] ?></td>  <td><?= $e['cliente'] ?></td> </tr>
		<?php } ?>

	</table>
	<h1>Listado de turnos Peluquero</h1>
	<table>
		<tr> <th>id_turno</th>  <th>fecha_turno</th>  <th>nombre</th>  <th>peluquero</th> <th>cliente</th></tr>

		<?php foreach($this->peluTurno as $e) { ?>
		<tr><td><?= $e['id_turno'] ?></td> <td><?= $e['fecha_turno'] ?></td>  <td><?= $e['nombre'] ?></td>  <td><?= $e['peluquero'] ?></td> <td><?= $e['cliente'] ?></td> </tr>
		<?php } ?>

	</table>
</body>
</html>