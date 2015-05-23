<?php session_start();
	include("../php/funciones/function.php");
?>
<!DOCTYPE html>
<html lang='es' xml:lang='es' xmlns="http://www.w3.org/1999/xhtml">
	<head>
		 <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		 <style>
		 	.container{
		 		max-width: 50em;
		 	}
		 </style>
	</head>
<head>
	<link rel="stylesheet" href="estilo.css"/>
</head>
<body>
<?php
	if(!empty($_POST['clientes']))
	{
		$cliente=$_POST['clientes'];

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
					$id=0;
					$clieNomb=explode(",",$cliente[$a]);
					$sql="select id_cliente from clientes where apellido like '".$clieNomb[1]."' and nombre like '".$clieNomb[0]."'";

					$cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$id=$regi[0];
						}
					}

					$fecha=explode("/", $diass[$i]);
					reservas($fecha[0],$fecha[1],$fecha[2],$horass[$i], $id);
				}

			}
		}
	}


		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";
		echo '<meta http-equiv="refresh" content="0; url=http://localhost/trainningmanager/reservas/calendario.php?mensaje=bien">';


?>
</body>
</html>
