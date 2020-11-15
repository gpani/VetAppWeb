<!-- html/ListadoTurnos.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Historial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Historial</h2>

    <table class="table">
      <thead>
        <tr class="table-success">
          <th>id Mascota</th>
          <th>id Profesional</th>
          <th>Fecha</th>
          <th>Precio</th>
          <th>Peso</th>
          <th>Notas</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->vetHistorial as $e) { ?>
          <tr class="table-primary">
            <td><?= $e['id_mascota'] ?></td>
            <td><?= $e['id_profesional'] ?></td>
            <td class="table-danger"><?= $e['fecha'] ?></td>
            <td class="table-info"><?= $e['precio'] ?></td>
            <td class="table-active"><?= $e['peso'] ?></td>
            <td class="table-info"><?= $e['notas'] ?></td>

          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  

</body>

</html>