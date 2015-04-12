<?php 
/*Eliminar WARNING*/ error_reporting(0);
	 session_destroy();
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
	<script src="js/javaScriptMulti.js"></script>



	<link rel="stylesheet" href="style2.css"/>
	<link rel="icon" type="image/png" href="imagenes/ico.png" />
	<script src="js/javaScript.js"></script>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<title>AC Wellness - Multiples</title>
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
	<article id="zona">
	<?php
		

				echo "<form name=a method=post action=confirmarHoraM.php>Nombre del cliente:";
					echo "<input type=text name=cliente[1]>";
					echo "<input type=text name=cliente[2]>";
					echo "<input type=text name=cliente[3]>";
					echo "<input type=hidden name=dia value=".$dia.">";
					echo "<input type=hidden name=hora value=$hora>";
					echo "<input type=submit name=Aceptar value=Aceptar>
					<div id='calendario'></div>";
				echo "</form>";			
				
	?>
	</article>
	</section>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>