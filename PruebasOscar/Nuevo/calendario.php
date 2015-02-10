<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="imagenes/logoTM.png" />
	<title>Training manager</title>
	<link rel="stylesheet" href="estilo.css"/>
	<script src="js/javaScript.js"></script>
</head>
<body>
	<header><h1>Calendario</h1></header>
	<section id="cuerpo">
	<nav>			
		<ul id='menu'>
			<li><a href='#' class="menu"><img src="imagenes/client.png" />Clientes</a></li>
			<li><a href='#' class="menu"><img src="imagenes/save.png" />Reservas</a>
				<ul id="submenu">
					<li><a href='#' class="submenu"><img src="imagenes/individual2.png" />Individual</a>
					<li><a href='#' class="submenu"><img src="imagenes/multiple2.png" />Multiples</a>
				</ul>
			</li>	
			<li><a href='#' class="menu"><img src="imagenes/calendar.png" />Calendario</a></li>
			<li><a href='#' class="menu"><img src="imagenes/tarifas.png" />Tarifas y bonos</a></li>
		</ul>
		<img src="../logo/logoTM.png" class="logo">
	</nav>
	<article id="zona">
	<?php 
	include("funciones/function.php"); 
	horarioSemana(); 
	?>
	</article>
	</section>
</body>
</html>