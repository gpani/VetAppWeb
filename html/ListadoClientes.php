<!-- html/ListadoClientes.php -->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Listado de Clientes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<h2>Listado de Clientes</h2>

		<table class="table">
			<thead>
				<tr class="table-primary">
					<th>Nombre Apellido</th>
					<th>DNI</th>
					<th>Dirección</th>
					<th>N° telefono</th>
					<th>Usuario</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($this->clientes as $e) { ?>
					<tr class="table-info">
						<td><?= $e['nombre_apellido'] ?></td>
						<td><?= $e['dni'] ?></td>
						<td><?= $e['direccion'] ?></td>
						<td><?= $e['telefono'] ?>
						<td><?= $e['usuario'] ?>
						<td><?= $e['email'] ?></td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>

</body>

</html>