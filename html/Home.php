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

    .navbar-nav {

      margin-bottom: center !important;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm" style="background-color: #77d6d3">
      <a class="navbar-brand" href="#">
        <img src="./assets/logo_size.jpg" alt="Logo" style="width:120px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <div class="btn-group btn-group-lg">
            <a class="btn btn-primary" href="./agregarTurno">Sacar Turno</a>
            <a class="btn btn-primary" href="./agregarMascotas">Agregar Mascota</a>
            <button id="botHistTur" type="button" class="btn btn-primary">Historial</button>
            <div class="btn-group btn-group-lg">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Perfil
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Mi cuenta: <?= $this->user['nombre_apellido'] ?></a>
                <a class="dropdown-item" href="./logout">Salir</a>
              </div>
            </div>
          </div>

        </ul>
      </div>
    </nav>
  </header>
  <main role="main" class="container">
    <div id="turnos">
      <h1>Turnos para mis mascotas</h1>
      <?php foreach ($this->turnos as $k => $v) { ?>
        <h2><?= $k ?></h2>
        <table class="table">
          <thead>
            <tr class="table-success">
              <th>Fecha</th>
              <th>Tipo de Turno</th>
              <th>Profesional</th>
              <th></th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($v as $t) { ?>
              <tr class="table-primary">
                <td><?= $t['fecha_hora'] ?></td>
                <td class="table-danger"><?= $t['tipo'] ?></td>
                <td class="table-info"><?= $t['nombre_apellido'] ?></td>
                <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaTurno(<?= $t['id'] ?>);">Baja</button></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
    <div id="historial">
      <h1>Mis mascotas</h1>
      <table class="table">
        <thead>
          <tr class="table-success">
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->mascotas as $t) { ?>
            <tr class="table-primary">
              <td id="mnom<?= $t['id'] ?>" class="table-danger" contenteditable="true"><?= $t['nombre'] ?></td>
              <td id="mesp<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['especie'] ?></td>
              <td id="mraz<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['raza'] ?></td>
              <td id="msex<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['sexo'] ?></td>
              <td id="mfec<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['fecha_nac'] ?></td>
              <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaMascota(<?= $t['id'] ?>);">Baja</button></td>
              <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateMascota(<?= $t['id'] ?>);">Actualizar</button></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <h1>Historial de mis mascotas</h1>
      <?php foreach ($this->historial as $k => $v) { ?>
        <h2><?= $k ?></h2>
        <table class="table">
          <thead>
            <tr class="table-success">
              <th>Fecha</th>
              <th>Tipo de Registro</th>
              <th>Profesional</th>
              <th>Peso</th>
              <th>Notas</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($v as $t) { ?>
              <tr class="table-primary">
                <td><?= $t['fecha'] ?></td>
                <td class="table-danger"><?= $t['tipo'] ?></td>
                <td class="table-info"><?= $t['nombre_prof'] ?></td>
                <td class="table-info"><?= $t['peso'] ?></td>
                <td class="table-info"><?= $t['notas'] ?></td>
                <td class="table-info"><?= $t['precio'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
    <script>
      function bajaTurno(idtur) {
        if (confirm("¿Querés dar de baja este turno?")) {
          $.post('./homeCliente', {
            'modo': 'BajaTurno',
            'id': idtur
          }).done(function() {
            location.reload();
          });
        }
      }

      function verHistorial(onoff) {
        if (onoff) {
          $('#turnos').hide();
          $('#historial').show();
          $('#botHistTur').html("Ver Turnos");
          $('#botHistTur').click(function() {
            verHistorial(false);
          });
        } else {
          $('#turnos').show();
          $('#historial').hide();
          $('#botHistTur').html("Ver Historial");
          $('#botHistTur').click(function() {
            verHistorial(true);
          });
        }
      }
      verHistorial(false);

      function bajaMascota(id) {
        if (confirm('¿Confirmas la baja de esta mascota?')) {
          $.post('./homeCliente', {
            'modo': 'BajaMascota',
            'id': id
          }).done(function() {
            location.reload();
          });
        }
      }

      function updateMascota(id) {
        data = {
          'modo': 'ModifMascota',
          'id': id,
          'nombre': $("#mnom" + id).html(),
          'especie': $("#mesp" + id).html(),
          'raza': $("#mraz" + id).html(),
          'sexo': $("#msex" + id).html(),
          'fecha_nac': $("#mfec" + id).html(),
        };
        $.post('./homeCliente', data).done(function(rsp) {
          alert('Actualizado correctamente.');
          location.reload();
        });
      }
    </script>
  </main>
  <footer class="footer" style="background-color: #77d6d3">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
</body>

</html>