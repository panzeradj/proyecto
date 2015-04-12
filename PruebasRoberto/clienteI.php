<?php
	include("/php/funciones/function.php");

	$id_cliente=$_GET['cliente'];
	echo $id_cliente;
?>
<!DOCTYPE html>
<html lang='es' xml:lang='es' xmlns="http://www.w3.org/1999/xhtml">
	<head>
		 <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <link rel="icon" type="image/png" href="imagenes/ico.png" />
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		 
		  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		 <style>
		 	.container{
		 		max-width: 50em;
		 	}
		 </style>
		 <link rel="stylesheet" href="style2.css"/>
		<script src="js/javaScript.js"></script>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
		<script src="js/jquery.datetimepicker.js"></script>
		<title>AC Wellness - Clientes</title>
	    <link href="bootstrap/bootstrap.min.css"s rel="stylesheet">
	    <link href="bootstrap/logo-nav.css" rel="stylesheet">
	    <link rel="stylesheet" href="estilos/stylesadmin.css">
	</head>
	<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="administrador.php">
                    <img src="imagenes/e.png" id="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="clientes.php" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="individuales.php">Individuales</a></li>
                          <li><a href="multiples.php">Multiples</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendario.php">Calendario</a>
                    </li>
                    <li>
                        <a href="#">Tarifas y bonos</a>
                    </li>
                    <li>
                        <a href="#">Configuracion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</nav>
		<?php 
		$sql="select nombre, dni, genero,fecha_nacimiento, telefono, telefono2,email,fecha_alta, fecha_baja,objetivos,comentarios,medicacion 
			  from clientes where id_cliente=".$id_cliente;
			$cho=ordensql($sql);
		
			$datos=array();
			if($cho!=false)
			{
				while ($regi = $cho->fetch_array()) {
					$datos['nombre']=$regi[0];
					$datos['dni']=$regi[1];
					$datos['genero']=$regi[2];
					$datos['fecha_nacimiento']=$regi[3];
					$datos['telefono']=$regi[4];
					$datos['telefono2']=$regi[5];
					$datos['email']=$regi[6];
					$datos['fecha_alta']=$regi[7];
					$datos['fecha_baja']=$regi[8];
					$datos['objetivos']=$regi[9];
					$datos['comentarios']=$regi[10];
					$datos['mediccion']=$regi[11];
					
				}
			}

		?>
		<!-- Realizo busqueda por id del cliente y meto todo en un array -->
		<div class="container">
			<div class='col-lg-6'>
				<label>Nombre</label>
				<div><?php 
					echo $datos['nombre'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>Telefono</label>
				<div><?php 
					echo $datos['telefono'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>DNI</label>
				<div><?php 
					echo $datos['dni'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>Otro telefono</label>
				<div><?php 
					echo $datos['telefono2'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>Genero</label>
				<div><?php 
					echo $datos['genero'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>email</label>
				<div><?php 
					echo $datos['email'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>fecha de nacimiento</label>
				<div><?php 
					echo $datos['fecha_nacimiento'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<!-- Desplegable para cambiar -->
				<label>tarifa</label>
				<div><select></select></div>
			</div>
			<div class='col-lg-6'>
				<label>Fecha alta</label>
				<div><?php 
					echo $datos['fecha_alta'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<label>Fecha de baja</label>
				<div><?php 
					echo $datos['fecha_baja'];
				?></div>
			</div>
			<div class='col-lg-12'>
				<label>Objetivos</label>
				<div><?php 
					if($datos['objetivos']=="")
					{
						echo "--";
					}
					else
					{
						echo $datos['objetivos'];
					}
				?></div>
			</div>
			<div class='col-lg-12'>
				<label>Comentarios</label>
				<div><?php 

					if($datos['comentarios']=="")
					{
						echo "--";
					}
					else
					{
						echo $datos['comentarios'];
					}
				?></div>
			</div>
			<div class='col-lg-12'>
				<label>Medicación</label>
				<div><?php 
					if($datos['medicacion']=="")
					{
						echo "--";
					}
					else
					{
						echo $datos['medicacion'];
					}
				?></div>
			</div>
			<div class='col-lg-12'>
				<label>Horas totales</label>
				<!-- Select con las horas totales -->
			</div>
		</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>