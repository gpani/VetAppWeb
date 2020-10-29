<!DOCTYPE html>
<html lang="en">
<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
            .note
            {
                text-align: center;
                height: 80px;
                background: #17a2b8;
                color: #fff;
                font-weight: bold;
                line-height: 80px;
            }
            .form-content
            {
                padding: 5%;
                border: 1px solid #ced4da;
                margin-bottom: 2%;
            }
            .form-control{
                border-radius:1.5rem;
            }
            .btnSubmit
            {
                border:none;
                border-radius:1.5rem;
                padding: 1%;
                width: 20%;
                cursor: pointer;
                background: #17a2b8;
                color: #fff;
                
            }
    </style>
</head>

<body>
    <div class="container register-form">
                <div class="form">
                    <div class="note">
                        <p>Registar Usuario</p>
                    </div>

                    <div class="form-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre y Apellido *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mail *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Dirección *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="DNI *" value=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario*" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contraseña *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Edad *" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="N° celular *" value=""/>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btnSubmit">Confirmar</button>
                        <button type="button" class="btnSubmit">Cancelar</button>
                    </div>
                </div>
    </div>
</body>
</html>





