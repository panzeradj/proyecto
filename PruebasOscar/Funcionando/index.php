<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <title>AC Wellness</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    <link rel="stylesheet" href="estilos/styles.css">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="login">
                <form class="form-signin" role="form" action="administrador.php" method="POST" accept-charset="utf-8">
                    <div class="text-center">
                        <img id="avatar" src="imagenes/logos.png" alt="avatar">
                    </div>
                    <input id="txtEmail" type="user" class="form-control" placeholder="Usuario">
                    <input type="password" class="form-control" placeholder="Contraseña">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="jquery/jquery.md5.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="script/script.js"></script>
</body>

</html>