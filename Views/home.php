<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css">
</head>
<body  id="fondo">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-4 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-danger text-center">
                        <strong class="text-white">Iniciar Sesión</strong><br>
                        <img class="img-thumbnail" src="<?php echo base_url(); ?>/Assets/img/empresa.jpg" width="100">
                    </div>
                    <div class="card-body bg-white">
                        <?php if (isset($_GET['msg']))  {
                            $alert = $_GET['msg'];
                            if ($alert == "vacio") {?>
                            <div class="alert alert-warning" role="alert">
                                <strong>Usuario o contraseña vacio</strong>
                            </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Usuario o contraseña incorrecto</strong>
                                 </div>
                            <?php }
                        } ?>
                        <form action="<?php echo base_url(); ?>Usuarios/login" method="post" autocomplete="off">
                            <div class="form-group">
                                <strong class="text-danger">Usuario</strong>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" >
                            </div>
                            <div class="form-group">
                                <strong class="text-danger">Contraseña</strong>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" >
                            </div>
                            <button class="btn btn-danger btn-block" type="submit">Iniciar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>




