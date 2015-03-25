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
	<header>
		<h1>Training manager</h1>
		<nav id="superior">
			<ul id="nav">
			<li id="two"><a href="#" class="one"><span>Clientes</span></a></li>
			<li id="two"><a href="#" class="one"><span>Reservas</span></a>
			<ul id="sub2">
	   			<!--<li id="two"><a href="individuales.php" id="subtwo">Individuales</a></li>
	  			<li id="two"><a href="multiples.php" id="subtwo" >multiples</a></li>-->
	  		</ul>
	  		</li>
			<li id="two"><a href="calendario.php" class="one"><span>Calendario</span></a></li>
			<li id="two"><a href="#" class="one"><span>Tarifas y bonos</span></a></li>
			</ul>
		</nav>
	</header>
	<section id="cuerpo">
	<nav id="general">			
		<ul id='menu'>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/client.png" id="icon"/><span id="contenidoMenu"> Clientes</span></a></li>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/save.png" id="icon"/><span id="contenidoMenu"> Reservas</span></a>
				<ul id="submenu">
					<li class="liMenu"><a href='individuales.php' class="submenu"><img src="imagenes/individual2.png" id="icon"/><span id="contenidoMenu"> Individua</span></a>
					<li class="liMenu"><a href='#' class="submenu"><img src="imagenes/multiple2.png" id="icon" /><span id="contenidoMenu"> Multiples</span></a>
				</ul>
			</li>	
			<li class="liMenu"><a href='calendario.php' class="menu"><img src="imagenes/calendar.png" id="icon" /><span id="contenidoMenu"> Calendario</span></a></li>
			<li class="liMenu"><a href='tarifas.php' class="menu"><img src="imagenes/tarifas.png" id="icon" /><span id="contenidoMenu"> Tarifas</span></a></li>
		</ul>
		<img src="../logo/logoTM.png" class="logo">
	</nav>
	<article id="zona">
		[esta página haría lo que tuviera que hacer y luego redirige a tarifas]
		<?php header("Refresh: 5; url=tarifas.php"); ?>
	</article>
	</section>
</body>
</html>