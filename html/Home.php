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
  <style>
  .fakeimg {
    height: 200px;
    background: #17a2b8;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">VetLali</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Turnos</button>
            <button type="button" class="btn btn-primary">Agregar Mascota</button>
            <button type="button" class="btn btn-primary">Historial</button>
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






<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>





