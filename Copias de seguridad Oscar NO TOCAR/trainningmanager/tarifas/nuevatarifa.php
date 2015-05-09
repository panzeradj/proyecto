<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../php/funciones/function.php");
    cabecera();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <meta name="author" content="Oscar Romero">
    <title>AC Wellness</title>   
	<script src="../js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <h1>Nueva tarifa</h1>
			<br/>
			<br/>
			<form name="datostarifa" action="compruebatarifa.php" method="post">
				<fieldset>
					<label for="nombre">Nombre:</label> <input type="text" name="nombre" required/>
					<br/>
					<label for="descripcion">Descripción de la tarifa:</label> <input type="fieldtext" name="descripcion" required/>
					<br/>
					<label for="valor">Precio por clase sin IVA:</label> <input type="text" name="valor" id="valor" required/> <div id="precioconiva"> </div>
					<br/>
					<input type="submit" name="crear" value="Crear tarifa">
				</fieldset>
			</form>
			<button onclick="location.href='tarifas.php'">Volver</button>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>