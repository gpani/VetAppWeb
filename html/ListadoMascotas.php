<!-- html/ListadoMascotas.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Listado de Mascotas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Listado de Mascotas</h2>

    <table class="table">
      <thead>
        <tr class="table-primary">
          <th>Nombre</th>
          <th>Especie</th>
          <th>Raza</th>
          <th>Fecha de Nacimiento</th>
          <th>Dueño</th>
          <th></th>

        </tr>
      </thead>
      <tbody>

        <?php foreach ($this->mascotas as $e) { ?>
          <tr class="table-info">
            <td><?= $e['nombre'] ?></td>
            <td><?= $e['especie'] ?></td>
            <td><?= $e['raza'] ?></td>
            <td><?= $e['fecha_nac'] ?></td>
            <td> <?= $e['nombre_apellido'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger">Baja</button></td>

          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>

</body>

</html>