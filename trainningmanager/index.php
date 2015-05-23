<?php
session_start();
include("php/funciones/function.php");
comprobarpagos();
$_SESSION["login"]="no";
$_SESSION["us"]="no";
    
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <title>AC Wellness</title>

    <script type="text/javascript" src="alertify/lib/alertify.js"></script>
    <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="alertify/themes/alertify.default.css" />

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    <link rel="stylesheet" href="estilos/styles.css">
    <script type="text/javascript">
    function error(){
        alertify.error("Usuario o constraseña incorrecto/a. <img src='iconos/no.png'>"); 
        return false; 
    }
    function ok(){
        alertify.success("Se ha cerrado sesion correctamente"); 
        return false;
    }
    </script>
</head>

<body>
    <?php
    if(isset($_POST["c"])){
        if($_POST['c']=="c"){
            echo "<script>ok();</script>";
        }
    }
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="login">
                 <form class="form-signin" role="form" id="form" action="administrador.php" method="POST" accept-charset="utf-8">
                    <div class="text-center">
                        <img id="avatar" src="imagenes/logos.png" >
                    </div>
                    <input id="txtEmail" class="form-control" placeholder="Usuario" name="us">
                    <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                    <button class="btn btn-lg btn-primary btn-block" id="boton" type="submit">Iniciar sesión</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="jquery/jquery.md5.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
<script>
    
    $('#form').submit(function(event){
        $('#boton').attr("disabled", true);
        event.preventDefault();
        ruta='comprobador.php';
        $.ajax({
            url:ruta,
            data:$(this).serialize(),
            error:function(error){

            },
            success:function(data){
                //ir a administrador
                console.dir(data);
                if(data=='1'){
                   window.location.href="administrador.php";
                }else{
                    $('#boton').attr("disabled", false);
                    error();
                }
                
            },
            type:'POST',
        });
    });
</script>
</html>