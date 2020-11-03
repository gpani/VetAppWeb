<!-- html/ListadoClientes.php -->

<!DOCTYPE html>
<html>

<head>
	<title>Listado de clientes</title>
</head>

<body>
	<h1>Listado de clientes</h1>
	<table>
		<tr>
			<th>nombre_apellido</th>
			<th>dni</th>
			<th>dirección</th>
			<th>nro_telefono</th>
			<th>usuario</th>
			<th>email</th>
		</tr>
		<?php foreach ($this->clientes as $e) { ?>
			<tr>
				<td><?= $e['nombre_apellido'] ?></td>
				<td><?= $e['dni'] ?></td>
				<td><?= $e['direccion'] ?></td>
				<td><?= $e['telefono'] ?>
				<td><?= $e['usuario'] ?>
				<td><?= $e['email'] ?></td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>