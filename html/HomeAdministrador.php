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
  <main role="main" class="container">
    <h1>Consola de Administrador</h1>
  </main>
  <footer class="footer">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
</body>

</html>