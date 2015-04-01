<html>
<head>
	<link rel="stylesheet" href="estilo.css"/>
</head>
<body>
<?php
	session_start();
	include("/php/funciones/function.php");
	if(!empty($_POST['cliente']))
	{
		$cliente=$_POST['cliente'];
		
	}
	
	$horass=explode("*", $_SESSION['hora']);
	$diass=explode("*", $_SESSION['dia']);
	$bandera=false;
	for($i=1;$i<sizeof($diass);$i++ ) {
		if(!empty($diass[$i]))
		{
			
			for($a=0;$a<4;$a++)
			{
				if(!empty($cliente[$a]))
				{
					$fecha=explode("/", $diass[$i]);
					reservas($fecha[0],$fecha[1],$fecha[2],$horass[$i], $cliente[$a]);
				}
				
			}
		}
	}

		echo "<script>alert('orden realizada con exito');</script>";
		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";
		header("refresh:0;url=calendario.php");

	
?>
</body>
</html>