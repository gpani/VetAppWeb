<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agrega Mascota</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->
    <style>
        .register {
            background: #007bff;
            margin-top: 3%;
            padding: 3%;
            text-align: center;
            
        }
        .btnEstilo {
          padding-left: 15px;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #007bff;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
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
    <div class="container register">
        <form action="" method="post" class="form" name="formulario">

            <div class="row">

                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Agregar Datos de Mascota</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre de Mascota *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="especie" class="form-control" placeholder="Especie *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="raza" class="form-control" placeholder="Raza*" value="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="fecha_nac" class="form-control" placeholder="Fecha Nacimiento *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <select name="sexo" class="form-control" required>
                                            <option class="hidden" selected disabled>Sexo</option>
                                            <option value="F">F</option>
                                            <option value="M">M</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="dueño" class="form-control" required>
                                            <option class="hidden" selected disabled>Dueño</option>
                                            <?php foreach ($this->clientes as $e) { ?>
                                                <option value="<?= $e['dni'] ?>"><?= $e['nombre_apellido'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <button type="reset" class="btnRegister " style="color:white;" value="Cancelar">Cancelar</button>
                                    <input type="submit" class="btnRegister" value="Registrar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="btnEstilo">
    <a type="button" class="btn btn-outline-info" href="./home.php">Atrás</a>
  </div>
  </main>

    <footer class="footer" style="background-color: #77d6d3">
    <div class="container text-center">
      <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
    </div>
  </footer>
</body>

</html>