<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <style>

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm" style="background-color: #77d6d3">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo_size.jpg" alt="Logo" style="width:120px;">
            </a>
        </nav>
    </header>
    <div id="login">
        <?php if ($this->error) { ?>
            <h3><?= $this->error ?></h3>
        <?php } ?>
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Iniciar Sesión</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Enviar">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="./registrar" class="text-info">Registrate</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer" style="background-color: #77d6d3">
        <div class="container text-center">
            <span class="text-muted">Copyright © 2020 VetAppWeb by Gessi.</span>
        </div>
    </footer>
</body>

</html>