<?php 
/*Eliminar WARNING*/ error_reporting(0);
	 session_destroy();
	include("../php/funciones/function.php");
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
	
	cabecera();
?>
<script src="http://acwellness.es/trainningmanager/js/javaScriptMulti.js"></script>
<style type="text/css">
	body, form, #zona{
	
	width: 100%;

	display: inline-flex;
		display: -webkit-inline-flex;
		display: -moz-inline-flex;
		display: -ms-inline-flex;

	justify-content:center; 
    -webkit-justify-content:center; 
    -moz-justify-content:center; 
    -ms-justify-content:center; 

    flex-wrap: wrap;
	-webkit-flex-wrap: wrap;
	-moz-flex-wrap: wrap;
	-ms-flex-wrap: wrap;
}
</style>
</head>
<body>
	
	<?php menu();?>
	<form method="post" action=cancelarM.php ><input type=submit value="Cancelación multiple"></form>
	<h1>Reserva multiple</h1>
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
</body>
</html>