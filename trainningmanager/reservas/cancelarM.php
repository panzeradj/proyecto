<?php
	session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
?>
<html>
	<head>
		<link rel="stylesheet" href="estilo.css"/>
		<style type="text/css">
		td{
			background-color: #fff;
		}
		#control{
			width: 50em;
		}
		body{
			
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
		thead td{
			background-color: #EEEEEE;
		}
		</style>
	</head>
	<body>
	<?php menu();?>
	<div id="control">
		<div style="text-center"><h1>Cancelación Multiple&nbsp;&nbsp;<img class="img-rounded" src='../iconos/multiple.png'></h1></div>
		<table class='table table-hover'>
			<thead><tr><td>Cliente</td><td>Fecha Inicio</td><td>Fecha Fin</td> <td> Cancelar</td></tr></thead>

			<?php 
				$orden="select dia_inicio, mes_inicio, anyo_inicio, dia_fin, mes_fin, anyo_fin, cliente, ID from reservasmultiples where cancelada=0";
				$cho=ordensql($orden);
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$inicio="".$regi[0]."/".$regi[1]."/".$regi[2];
						$fin="".$regi[3]."/".$regi[4]."/".$regi[5];
						echo "<tr><td>".$regi[6]."</td><td>".$inicio."</td><td>".$fin."</td><td><a href=cancelarM2.php?id=".$regi[7].">Cancelar</a></td></tr>";
					}
				}

			?>

		</table>
	</div>
	</body>
</html>