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
		<br/>
		<?php
		include("funciones/function.php"); 
		if (isset($_POST['crear'])||isset($_POST['cambiar'])){
			$nombreahora=$_POST['nombre'];
			$descripcionahora=$_POST['descripcion'];
			$valorahora=$_POST['valor'];			
			if (isset($_POST['crear'])){
				ordensqlupdate("INSERT into tarifas (nombre, descripcion, valor_sin_iva, fecha_inicial, obsoleta) VALUES ('".$nombreahora."', '".$descripcionahora."', ".$valorahora.", now(), false);");
				echo "<h2>La tarifa ha sido creada satisfactoriamente</h2>
					A continuación se redirigirá a la página principal de tarifas. ";
			}
			if (isset($_POST['cambiar'])){
				$idanterior=$_POST['anterior'];
				//1- hay que hacer consulta de la tarifa que se va a cambiar, para eso se tiene el $idanterior, y se sacan todos los datos.
				$lista=ordensql("SELECT valor_sin_iva from tarifas where id_tarifa=".$idanterior.";");
				$resultado=$lista->fetch_array();
				$valoranterior=$resultado[0];				
				//2- comparar $valorahora y $valoranterior
				if($valoranterior==$valorahora){
					//2a (caso iguales): se hace un update del resto de los campos, y no hay que modificar nada más.
					ordensqlupdate("UPDATE tarifas set descripcion='".$descripcionahora."', nombre='".$nombreahora."' where id_tarifa='".$idanterior."';");
				}else{
					//2b (caso diferentes): Se crea una nueva tarifa y la anterior se marca como finalizada. 
						//Se actualizará la tabla de los contratos, marcando como finalizados los anteriores que se tuvieran.
						//Por cada uno marcado, se hace uno nuevo con los mismos datos y que empiece en esa fecha.
					echo "valores diferentes";
				}
				echo "<h2>La tarifa ha sido cambiada satisfactoriamente</h2>
					A continuación se redirigirá a la página principal de tarifas. ";
			}
			header("Refresh: 5; url=tarifas.php"); 
		}else{
			header("Location:tarifas.php");
		}
		?>
	</article>
	</section>
</body>
</html>