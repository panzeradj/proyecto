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
		<h1>Cambiar tarifa</h1>
		<br/>
		<br/>
		<?php
		include("funciones/function.php"); 
		if(isset($_POST['cambiartarifa'])){
		$tarifa=$_POST['tarifa'];
		$lista=ordensql("select nombre, descripcion, valor_sin_iva from tarifas where id_tarifa=".$tarifa.";");
		while ($resultado=$lista->fetch_array()){
			$id=$tarifa;
			$nombre=$resultado[0];
			$descripcion=$resultado[1];
			$valor=$resultado[2];
		}
		$listaiva=ordensql("select * from IVA;");
		while ($resultado=$listaiva->fetch_array()){
			$iva=$resultado[0];
		}
		?>
		<form name="datostarifa" action="compruebatarifa.php" method="post">
			<fieldset>
				<label for="nombre">Nombre:</label> <input type='text' name='nombre' value="<?php echo $nombre;?>" required/>
				<br/>
				<label for="descripcion">Descripción de la tarifa:</label> <input type='fieldtext' name='descripcion' value="<?php echo $descripcion;?>" required/>
				<br/>
				<label for="valor">Precio por clase sin IVA:</label> <input type='text' name='valor' value="<?php echo $valor;?>" required/> [quizás actualizar a un lado lo que vale con iva]
				<br/>
				<input type="hidden" name="anterior" value="<?php echo $tarifa;?>"/>
				<input type="submit" name="cambiar" value="Guardar cambios"/>

			</fieldset>
		</form>
		<button onclick="location.href='tarifas.php'">Volver</button>
		<?php
		}else{
			header("Location:tarifas.php");
		}
		?>
	</article>
	</section>
</body>
</html>