<html>

<head>
    <title>Agregar Turnos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <style>
        .container {
            margin-top: 100px;
        
            min-width: 200px;
            max-width: 400px;
        
        }
    </style>
</head>


<body>
    <div class="container">
        <form action="" method="post" class="form" name="formulario">
            <div class="panel panel-primary">
                <div class="panel-heading">Sacar Turno</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Seleccione Profesional</label>
                                <select name="id_profesional" class="form-control">
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
                                <select name="mascota" class="form-control">
                                    <option class="hidden" selected disabled>Seleccione mascota</option>
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
                                    <input data-date-format="YYYY-MM-DD HH:mm" name="fecha" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="cancel" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
</body>

</html>