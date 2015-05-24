<?php
	session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
?>

		<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
		<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
	<script>
		function envio(id,cliente){
			//alert("HOLA "+cliente +" "+id);
			alertify.confirm("<p>Estás seguro de que quieres cancelar las reservas  del cliente "+cliente+"<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
					if (e) {
			  		location="cancelarM2.php?id="+id;
					} else {
						alertify.error("Has cancelado la acción");
					}
				});
		};
	</script>
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
				$orden="select reservasmultiples.dia_inicio, reservasmultiples.mes_inicio, reservasmultiples.anyo_inicio, reservasmultiples.dia_fin, reservasmultiples.mes_fin, reservasmultiples.anyo_fin, reservasmultiples.cliente, reservasmultiples.ID, clientes.nombre, clientes.apellido from reservasmultiples inner join clientes on clientes.id_cliente=reservasmultiples.cliente where cancelada=0 ";
				$cho=ordensql($orden);
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$inicio="".$regi[0]."/".$regi[1]."/".$regi[2];
						$fin="".$regi[3]."/".$regi[4]."/".$regi[5];
						$usuario = $regi[8]."&nbsp;".$regi[9];
						echo "<tr><td>".$regi[8]." ".$regi[9]."</td><td>".$inicio."</td><td>".$fin."</td><td><a  onClick=envio(".$regi[7].",'".$usuario."')>Cancelar</a></td></tr>";
					}
				}

			?>

		</table>
	</div>

	</body>
</html>
