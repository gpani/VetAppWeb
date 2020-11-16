<!DOCTYPE html>
<html lang="en">

<head>
  <title>VetLali</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  <style>
    .fakeimg {
      height: 200px;
      background: #17a2b8;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm" style="background-color: #77d6d3">
      <a class="navbar-brand" style="font-size:38px; color:ghostwhite" href="#">VetLali</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <div class="btn-group">
            <button id="botHistTur" type="button" class="btn btn-primary">Historial</button>
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Perfil
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Mi cuenta: <?= $this->user['nombre_apellido'] ?></a>
                <a class="dropdown-item" href="./logout.php">Salir</a>
              </div>
            </div>
          </div>

        </ul>
      </div>
    </nav>
  </header>
  <?php if ($this->mensaje) { ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body"><?= $this->mensaje ?></div>
    </div>
  <?php } ?>
  <main role="main" class="container">
    <div id="turnos">
      <h1>Mis próximos turnos</h1>
      <table class="table">
        <thead>
          <tr class="table-success">
            <th>Fecha</th>
            <th>Mascota</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Dueño</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->turnos as $t) { ?>
            <tr class="table-primary">
              <td><?= $t['fecha_hora'] ?></td>
              <td class="table-danger"><?= $t['mascota'] ?></td>
              <td class="table-info"><?= $t['especie'] ?></td>
              <td class="table-info"><?= $t['raza'] ?></td>
              <td class="table-info"><?= $t['nombre_apellido'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div id="historial">
      <h1>Registrar historial</h1>
      <form action="" method="post" class="form" name="formulario">
        <div class="row">
          <div class="col-md-9 register-right">
            <div class="row register-form">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="date" name="fecha" class="form-control" placeholder="Fecha Nacimiento *" value="" />
                </div>
                <div class="form-group">
                  <select name="id_mascota" class="form-control">
                    <option class="hidden" selected disabled>Mascota - Dueño</option>
                    <?php foreach ($this->mascotas as $m) { ?>
                      <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?> - <?= $m['nombre_apellido'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" name="peso" step="0.01" class="form-control" placeholder="Peso" value="" />
                </div>
                <div class="form-group">
                  <input type="number" name="precio" step="0.01" class="form-control" placeholder="Precio" value="" />
                </div>
                <div class="form-group">
                  <input type="text" name="notas" class="form-control" placeholder="Notas" value="" />
                </div>
                <input type="submit" class="btnRegister" value="Registrar" />
              </div>
            </div>
          </div>
        </div>
      </form>
      <br>
      <h1>Mis registros</h1>
      <table class="table">
          <thead>
            <tr class="table-success">
              <th>Fecha</th>
              <th>Mascota</th>
              <th>Peso</th>
              <th>Notas</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->historial as $t) { ?>
              <tr class="table-primary">
                <td><?= $t['fecha'] ?></td>
                <td class="table-info"><?= $t['nombre'] ?></td>
                <td class="table-info"><?= $t['peso'] ?></td>
                <td class="table-info"><?= $t['notas'] ?></td>
                <td class="table-info"><?= $t['precio'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
    <script>
      function verHistorial(onoff) {
        if (onoff) {
          $('#turnos').hide();
          $('#historial').show();
          $('#botHistTur').html("Turnos");
          $('#botHistTur').click(function() {
            verHistorial(false);
          });
        } else {
          $('#turnos').show();
          $('#historial').hide();
          $('#botHistTur').html("Historial");
          $('#botHistTur').click(function() {
            verHistorial(true);
          });
        }
      }
      verHistorial(false);
    </script>
  </main>
  <footer class="footer">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
</body>

</html>