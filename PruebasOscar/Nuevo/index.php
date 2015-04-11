<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Training manager</title>
	<link rel="stylesheet" href="estiloindice.css">
	<link rel="icon" type="image/png" href="" />
	<script src="control.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body id="principal">
<img src="imagenes/AC Wellness logos-02.png" class="logoindice">
	<section id="sesion">
		
		<form action="administrador.php" method="POST" accept-charset="utf-8">
			<strong>Usuario</strong> <br>
     		<input type="text" name="usuario" class="campo" required><br>
    		<strong>Clave</strong> <br>
      		<input type="password" name="contrasena" class="campo" required><br>
     		<input type="submit" name="Submit" class="boton" value="Enviar">
		</form>	
	</section>
</body>
</html>