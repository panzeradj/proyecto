<?php 
	session_start();
	include("/php/funciones.php");	
	$dia=$_GET['dia'];
	$hora=$_GET['hora'];
	$calendario=$_GET['calendario'];
	$_SESSION['hora']=''.$_SESSION['hora']."/".$hora;
	$_SESSION['dia']=''.$_SESSION['dia']."/".$dia;
	echo $_SESSION['hora']."<br>";
	echo $_SESSION['dia'];	
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Training manager</title>
	<link rel="stylesheet" href="estilo.css">
	<script src="js/javaScript.js"></script>
</head>
<body>
	<?php
		include("php/funciones/function.php");
		generaNav();
		if($calendario!=null )
		{
			echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
				echo "<br><input type=text name=cliente[1]>";
				echo "<br><input type=text name=cliente[2]>";
				echo "<br><input type=text name=cliente[3]>";
				echo "<br><input type=hidden name=dia value=$dia>";
				echo "<input type=hidden name=hora value=$hora>";
				echo "<input type=submit name=Aceptar value=Aceptar>";
			echo "</form>";
		}
		else
		{

				echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
					echo "<br><input type=text name=cliente[1]>";
					echo "<br><input type=text name=cliente[2]>";
					echo "<br><input type=text name=cliente[3]>";
					echo "<br><input type=hidden name=dia value=$dia>";
					echo "<input type=hidden name=hora value=$hora>";
					horarioReservaI($_SESSION['hora'], $_SESSION['dia']);
					echo "<input type=submit name=Aceptar value=Aceptar>";
				echo "</form>";			
		}		
	?>
</body>
</html>