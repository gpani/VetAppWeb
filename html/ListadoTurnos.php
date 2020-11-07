<!-- html/ListadoTurnos.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Listas de Turnos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Listado de turnos Veterinario</h2>

    <table class="table">
      <thead>
        <tr class="table-success">
          <th>id</th>
          <th>Fecha</th>
          <th>Nombre Mascota</th>
          <th>Veterinario</th>
          <th>Cliente</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->vetTurno as $e) { ?>
          <tr class="table-primary">
            <td><?= $e['id'] ?></td>
            <td><?= $e['fecha_hora'] ?></td>
            <td class="table-danger"><?= $e['nombre'] ?></td>
            <td class="table-info"><?= $e['profesional'] ?></td>
            <td class="table-active"><?= $e['dueño'] ?></td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <br />
  <br />
  <br />
  <div class="container">
    <h2>Listado de turnos Estilista</h2>

    <table class="table">
      <thead>
        <tr class="table-success">
          <th>id</th>
          <th>Fecha</th>
          <th>Nombre Mascota</th>
          <th>Estilista</th>
          <th>Cliente</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->peluTurno as $e) { ?>
          <tr class="table-danger">
            <td><?= $e['id'] ?></td>
            <td><?= $e['fecha_hora'] ?></td>
            <td class="table-danger"><?= $e['nombre'] ?></td>
            <td class="table-info"><?= $e['profesional'] ?></td>
            <td class="table-active"><?= $e['dueño'] ?></td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>

</body>

</html>