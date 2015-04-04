<?php 
	session_start();
	include("php/funciones/function.php");
	if(!empty($_GET['dia']) &&  !empty($_GET['hora']))
	{
		$dia=$_GET['dia'];
		$hora=$_GET['hora'];

		$_SESSION['hora']=''.$_SESSION['hora']."/".$hora;
		$_SESSION['dia']=''.$_SESSION['dia']."/".$dia;
	}
	else
	{

		$dia="";
		$hora="";	
	}
	
		$_SESSION['semanas']=0;
	
	
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Training manager</title>
	<link rel="stylesheet" href="estilo.css">
	<script src="js/javaScriptIndividuales.js"></script>
</head>
<body>
	<header>
		<h1>Training manager</h1>
		<nav id="superior">
			<ul id="nav">
			<li id="two"><a href="#" class="one"><span>Clientes</span></a></li>
			<li id="two"><a href="#" class="one"><span>Reservas</span></a>
			<ul id="sub2">
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
					<li class="liMenu"><a href='#' class="submenu"><img src="imagenes/individual2.png" id="icon"/><span id="contenidoMenu"> Individua</span></a>
					<li class="liMenu"><a href='#' class="submenu"><img src="imagenes/multiple2.png" id="icon" /><span id="contenidoMenu"> Multiples</span></a>
				</ul>
			</li>	
			<li class="liMenu"><a href='calendario.php' class="menu"><img src="imagenes/calendar.png" id="icon" /><span id="contenidoMenu"> Calendario</span></a></li>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/tarifas.png" id="icon" /><span id="contenidoMenu"> Tarifas y bonos</span></a></li>
		</ul>
		<img src="../logo/logoTM.png" class="logo">
	</nav>
	<article id="zona">
		<button onClick=semanaMenos()>Semana menos</button>
		<button onClick=semanaMas()>Semana mas</button>
				
	<?php
		if(!empty($_GET['calendario']))
		{
			echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
				echo "<br><input type=text name=cliente[1]><br>";
				echo "<br><input type=text name=cliente[2]><br>";
				echo "<br><input type=text name=cliente[3]><br>";
				echo "<br><input type=hidden name=dia value=$dia>";
				echo "<input type=hidden name=hora value=$hora>";
				echo "<input type=submit name=Aceptar value=Aceptar>";
			echo "</form>";
		}
		else
		{

				echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
					echo "<div id='calendario'></div><br><input type=text name=cliente[1]><br>";
					echo "<br><input type=text name=cliente[2]><br>";
					echo "<br><input type=text name=cliente[3]><br>";
					echo "<br><input type=hidden name=dia value=".$dia.">";
					echo "<input type=hidden name=hora value=$hora>";
					echo "<input type=submit name=Aceptar value=Aceptar>";
				echo "</form>";			
		}		
	?>
	</article>
	</section>
</body>
</html>