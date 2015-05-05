<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../../php/funciones/function.php");
    cabecera();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <meta name="author" content="Oscar Romero">
    <title>AC Wellness</title>
</head>
<body>
    <?php menu(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <button onclick="location.href='generarexcel.php'">Click aquí para generar archivo Excel</button>
            </div>
        </div>
    </div>
</html>