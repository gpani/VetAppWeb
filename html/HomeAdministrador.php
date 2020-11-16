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
            <a id="botHistTur" type="button" class="btn btn-primary" href="./registrar.php">Nuevo usuario</a>
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
  <main role="main" class="container">
    <h1>Personas</h1>
    <table class="table">
      <thead>
        <tr class="table-success">
          <th>DNI</th>
          <th>Nombre y Apellido</th>
          <th>Tipo</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Usuario</th>
          <th>email</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->personas as $t) { ?>
          <tr class="table-primary" id="<?=$t['dni']?>">
            <td><?= $t['dni'] ?></td>
            <td id="nomap<?=$t['dni']?>" class="table-danger" contenteditable="true"><?= $t['nombre_apellido'] ?></td>
            <td id="tipo<?=$t['dni']?>" class="table-info" contenteditable="true"><?= $t['tipo'] ?></td>
            <td id="dir<?=$t['dni']?>" class="table-info" contenteditable="true"><?= $t['direccion'] ?></td>
            <td id="tel<?=$t['dni']?>" class="table-info" contenteditable="true"><?= $t['telefono'] ?></td>
            <td id="usu<?=$t['dni']?>" class="table-info" contenteditable="true"><?= $t['usuario'] ?></td>
            <td id="email<?=$t['dni']?>" class="table-info" contenteditable="true"><?= $t['email'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaPersona(<?= $t['dni'] ?>);">Baja</button></td>
            <td class="text-center"><button type="button" class="btn btn-primary" onclick="updatePersona(<?= $t['dni'] ?>);">Actualizar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <h1>Mascotas</h1>
    <table class="table">
      <thead>
        <tr class="table-success">
          <th>id</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Raza</th>
          <th>Sexo</th>
          <th>Fecha de Nacimiento</th>
          <th>Dueño</th>
          <th></th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->mascotas as $t) { ?>
          <tr class="table-primary">
            <td><?= $t['id'] ?></td>
            <td id="mnom<?=$t['id']?>" class="table-danger" contenteditable="true"><?= $t['nombre'] ?></td>
            <td id="mesp<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['especie'] ?></td>
            <td id="mraz<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['raza'] ?></td>
            <td id="msex<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['sexo'] ?></td>
            <td id="mfec<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['fecha_nac'] ?></td>
            <td class="table-info"><?= $t['nombre_apellido'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaMascota(<?= $t['id'] ?>);">Baja</button></td>
            <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateMascota(<?= $t['id'] ?>);">Actualizar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <h1>Historial</h1>
    <table class="table">
      <thead>
        <tr class="table-success">
          <th>id</th>
          <th>Mascota</th>
          <th>Profesional</th>
          <th>Fecha</th>
          <th>Precio</th>
          <th>Peso</th>
          <th>Notas</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->historial as $t) { ?>
          <tr class="table-primary">
            <td><?= $t['id'] ?></td>
            <td class="table-danger"><?= $t['mascota'] ?></td>
            <td class="table-info"><?= $t['profesional'] ?></td>
            <td id="hfec<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['fecha'] ?></td>
            <td id="hpre<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['precio'] ?></td>
            <td id="hpes<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['peso'] ?></td>
            <td id="hnot<?=$t['id']?>" class="table-info" contenteditable="true"><?= $t['notas'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaHistorial(<?= $t['id'] ?>);">Baja</button></td>
            <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateHistorial(<?= $t['id'] ?>);">Actualizar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <h1>Turnos Veterinaria</h1>
    <table class="table">
      <thead>
        <tr class="table-success">
          <th>ID</th>
          <th>Fecha</th>
          <th>Profesional</th>
          <th>Mascota</th>
          <th>Dueño</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->turnosVet as $t) { ?>
          <tr class="table-primary">
            <td><?= $t['id'] ?></td>
            <td id="tfec<?=$t['id']?>" class="table-danger" contenteditable="true"><?= $t['fecha_hora'] ?></td>
            <td class="table-info"><?= $t['profesional'] ?></td>
            <td class="table-info"><?= $t['nombre'] ?></td>
            <td class="table-info"><?= $t['dueño'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaTurno(<?= $t['id'] ?>);">Baja</button></td>
            <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateTurno(<?= $t['id'] ?>);">Actualizar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <h1>Turnos Peluquería</h1>
    <table class="table">
      <thead>
        <tr class="table-success">
          <th>ID</th>
          <th>Fecha</th>
          <th>Profesional</th>
          <th>Mascota</th>
          <th>Dueño</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->turnosPel as $t) { ?>
          <tr class="table-primary">
            <td><?= $t['id'] ?></td>
            <td id="tfec<?=$t['id']?>" class="table-danger" contenteditable="true"><?= $t['fecha_hora'] ?></td>
            <td class="table-info"><?= $t['profesional'] ?></td>
            <td class="table-info"><?= $t['nombre'] ?></td>
            <td class="table-info"><?= $t['dueño'] ?></td>
            <td class="text-center"><button type="button" class="btn btn-danger" onclick="bajaTurno(<?= $t['id'] ?>);">Baja</button></td>
            <td class="text-center"><button type="button" class="btn btn-primary" onclick="updateTurno(<?= $t['id'] ?>);">Actualizar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
  <footer class="footer">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
  <script>
    function bajaPersona(dni) {
      if (confirm('¿Confirmas la baja de esta persona?')) {
        $.post('./homeAdministrador.php',
          {'modo': 'BajaPersona',
            'dni': dni}
        ).done(function(){
          location.reload();
        });
      }
    }
    function updatePersona(dni) {
      data = {
        'modo':             'ModifPersona',
        'dni':              dni,
        'nombre_apellido':  $("#nomap"+dni).html(),
        'tipo':             $("#tipo"+dni).html(),
        'direccion':        $("#dir"+dni).html(),
        'telefono':         $("#tel"+dni).html(),
        'usuario':          $("#usu"+dni).html(),
        'email':            $("#email"+dni).html(),
      };
      $.post('./homeAdministrador.php', data).done(function(){
        alert('Actualizado correctamente.');
        location.reload();
      });
    }
    function bajaMascota(id) {
      if (confirm('¿Confirmas la baja de esta mascota?')) {
        $.post('./homeAdministrador.php',
          {'modo': 'BajaMascota',
            'id': id}
        ).done(function(){
          location.reload();
        });
      }
    }
    function updateMascota(id) {
      data = {
        'modo':      'ModifMascota',
        'id':        id,
        'nombre':    $("#mnom"+id).html(),
        'especie':   $("#mesp"+id).html(),
        'raza':      $("#mraz"+id).html(),
        'sexo':      $("#msex"+id).html(),
        'fecha_nac': $("#mfec"+id).html(),
      };
      $.post('./homeAdministrador.php', data).done(function(){
        alert('Actualizado correctamente.');
        location.reload();
      });
    }
    function bajaHistorial(id) {
      if (confirm('¿Confirmas la baja de este historial?')) {
        $.post('./homeAdministrador.php',
          {'modo': 'BajaHistorial',
            'id': id}
        ).done(function(){
          location.reload();
        });
      }
    }
    function updateHistorial(id) {
      data = {
        'modo':   'ModifHistorial',
        'id':     id,
        'fecha':  $("#hfec"+id).html(),
        'peso':   $("#hpes"+id).html(),
        'precio': $("#hpre"+id).html(),
        'notas':  $("#hnot"+id).html(),
      };
      $.post('./homeAdministrador.php', data).done(function(rsp){
        alert('Actualizado correctamente.');
      });
    }
    function bajaTurno(id) {
      if (confirm('¿Confirmas la baja de este turno?')) {
        $.post('./homeAdministrador.php',
          {'modo': 'BajaTurno',
            'id': id}
        ).done(function(){
        });
      }
    }
    function updateTurno(id) {
      data = {
        'modo':       'ModifTurno',
        'id':         id,
        'fecha_hora': $("#tfec"+id).html(),
      };
      $.post('./homeAdministrador.php', data).done(function(rsp){
        alert('Actualizado correctamente.');
        location.reload();
      });
    }
  </script>
</body>

</html>