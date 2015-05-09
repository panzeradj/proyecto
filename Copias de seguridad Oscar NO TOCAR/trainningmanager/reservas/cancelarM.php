<html>
	<head>
		<link rel="stylesheet" href="estilo.css"/>
	</head>
	<body>
		<?php
			session_start();
			include("../php/funciones/function.php");
		?>
		<table >
			<tr><td>Cliente</td><td>Fecha Inicio</td><td>Fecha Fin</td> <td> Cancelar</td></tr>
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
	</body>
</html>