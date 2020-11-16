<html>

<head>
    <title>Agregar Turnos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <style>
        .container {

            min-width: 200px;
            max-width: 400px;

        }  

        .btnEstilo {
            padding-left: 15px;
        }
    </style>
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-sm" style="background-color: #77d6d3">
            <a class="navbar-brand" href="#">
                <img src="../assets/logo_size.jpg" alt="Logo" style="width:120px;">
            </a>
        </nav>
    </header>
    <main role="main">
    <div class="container">
        <form action="" method="post" class="form" name="formulario">
            <div class="panel panel-primary">
                <div class="panel-heading">Sacar Turno</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Seleccione Profesional</label>
                                <select name="id_profesional" class="form-control" required>
                                    <option disabled>Veterinarios</option>
                                    <?php foreach ($this->veterinarios as $e) { ?>
                                        <option value="<?= $e['dni'] ?>"><?= $e['nombre_apellido'] ?></option>
                                    <?php } ?>
                                    <option disabled>Estilistas</option>
                                    <?php foreach ($this->estilistas as $e) { ?>
                                        <option value="<?= $e['dni'] ?>"><?= $e['nombre_apellido'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Seleccione Mascota</label>
                                <select name="mascota" class="form-control" required>
                                    <option disabled>Seleccione mascota</option>
                                    <?php foreach ($this->mascotas as $e) { ?>
                                        <option value="<?= $e['id'] ?>"><?= $e['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label class="control-label">Fecha y Hora</label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input data-date-format="YYYY-MM-DD HH:mm" name="fecha" type='text' class="form-control" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="reset" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </form>
        <p>Recordá que los turnos se asignan por hora, de 10 a 18.</p>
    </div>
    </main>
    <div class="btnEstilo">
        <a type="button" class="btn btn-outline-info" href="./home.php">Atrás</a>
    </div>

    <footer class="footer" style="background-color: #77d6d3">
        <div class="container text-center">
            <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
        </div>
        <script>
            $(function() {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

    </footer>
</body>

</html>