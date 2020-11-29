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
            <button id="botTur" type="button" class="btn btn-primary">Mis turnos</button>
            <button id="botHist" type="button" class="btn btn-primary">Historial</button>
            <div class="btn-group">
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
  <?php if ($this->mensaje) {
    echo ("
    <div id=\"mensaje\" class=\"alert alert-primary\" role=\"alert\">
    $this->mensaje
    </div>");
    $this->mensaje = null;
  } ?>
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
                  <input type="date" name="fecha" class="form-control" placeholder="Fecha*" value="" required />
                </div>
                <div class="form-group">
                  <select name="id_mascota" class="form-control" required>
                    <option class="hidden" selected disabled>Mascota - Dueño</option>
                    <?php foreach ($this->mascotas as $m) { ?>
                      <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?> - <?= $m['nombre_apellido'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" name="peso" step="0.01" class="form-control" placeholder="Peso" value="" required />
                </div>
                <div class="form-group">
                  <input type="number" name="precio" step="0.01" class="form-control" placeholder="Precio" value="" required />
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
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->historial as $t) { ?>
            <tr class="table-primary">
              <td id="hfec<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['fecha'] ?></td>
              <td class="table-info"><?= $t['nombre'] ?></td>
              <td id="hpes<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['peso'] ?></td>
              <td id="hnot<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['notas'] ?></td>
              <td id="hpre<?= $t['id'] ?>" class="table-info" contenteditable="true"><?= $t['precio'] ?></td>
              <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaHistorial(<?= $t['id'] ?>);">Baja</button></td>
              <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateHistorial(<?= $t['id'] ?>);">Actualizar</button></td>
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
        } else {
          $('#turnos').show();
          $('#historial').hide();
        }
      }
      $('#botHist').click(function() {
        verHistorial(true);
      });
      $('#botTur').click(function() {
        verHistorial(false);
      });

      verHistorial(false);

      function bajaHistorial(id) {
        if (confirm('¿Confirmas la baja de este historial?')) {
          $.post('./homeProfesional', {
            'modo': 'BajaHistorial',
            'id': id
          }).done(function() {
            location.reload();
          });
        }
      }

      function updateHistorial(id) {
        data = {
          'modo': 'ModifHistorial',
          'id': id,
          'fecha': $("#hfec" + id).html(),
          'peso': $("#hpes" + id).html(),
          'precio': $("#hpre" + id).html(),
          'notas': $("#hnot" + id).html(),
        };
        $.post('./homeProfesional', data).done(function(rsp) {
          alert('Actualizado correctamente.');
        });
      }
    </script>
  </main>
  <footer class="footer">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
</body>

</html>