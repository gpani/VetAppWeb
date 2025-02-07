<!DOCTYPE html>
<html lang="en">

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->
    <style>
        .note {
            text-align: center;
            height: 80px;
            background: #17a2b8;
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .form-controlDir {


            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 1.5rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #17a2b8;
            color: #fff;

        }

        .btnEstilo {
            padding-left: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm" style="background-color: #77d6d3">
        <a class="navbar-brand" href="#">
            <img src="./assets/logo_size.jpg" alt="Logo" style="width:120px;">
        </a>
    </nav>

    <div class="container register-form">
        <form action="" method="post" class="form" name="formulario">
            <div class="note">
                <p>Registar Usuario</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="nombre_apellido" class="form-control" placeholder="Nombre *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre_apellido" class="form-control" placeholder="Apellido *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Mail *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="direccion" class="form-control" placeholder="Nombre de Calle *" value="" />
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" name="" placeholder="Altura *" class="form-controlDir"  />
                            </div>
                            <div class="col-4">
                                <input type="num" id="card-number"  placeholder="Cod. Postal *"class="form-controlDir" maxlength="4" />
                            </div> 
                        </div>
    </br>
                        <div class="form-group">
                            <input type="text" name="dni" class="form-control" placeholder="DNI *" value="" required />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario*" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="matricula" class="form-control" placeholder="Matricula *" value="" />
                        </div>
                        <div class="form-group">
                            <select class="form-control " name="tipo">
                                <option class="hidden" disabled>Tipo de Usuario</option>
                                <?php foreach ($this->listaTipos as $t) { ?>
                                    <option><?= $t['tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="N° celular *" value="" />
                        </div>
                    </div>

                </div>
                <button type="submit" class="btnSubmit">Confirmar</button>
                <button type="reset" class="btnSubmit">Cancelar</button>
            </div>
        </form>
    </div>
    <div class="btnEstilo">
        <a type="button" class="btn btn-outline-info" href="./homeCliente">Atrás</a>
    </div>


    <footer class="footer" style="background-color: #77d6d3">
        <div class="container text-center">
            <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
        </div>
    </footer>
</body>

</html>