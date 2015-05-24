<?php  
require_once("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
include('basededatos.php');
include('config.php');
cabecera();
?>
<style type="text/css">
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
	td, th{
		text-align: center;
		vertical-align: middle !important;
	}
</style>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
    function borrar(){
        alertify.success("Se a borrado la reserva"); 
        return false;
    }
</script>
</head>
<?php menu();
if(isset($_GET["mensaje"])){
	if($_GET["mensaje"]=='borrado'){
		echo "<script>borrar();</script>";
	}
} ?>
<body>
	<div id="control">
  		<?php
	  		$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	  		$orden = "SELECT * FROM externas";
	  		$respuesta  = consulta($orden,$conexion);
	  		$esta = cantdatos($respuesta);
			if($esta!=0){
				echo "<div style='text-center'><h1>Listado reservas externas&nbsp;&nbsp;<img class='img-rounded' src='../iconos/listadolocales.png'></h1></div>";
				echo "<table class='table table-hover'>
	    		<tr><th class='titulo'>Local</th> 
	   			<th class='titulo'>Cliente</th><th class='titulo'>Horas</th><th class='titulo'>Precio</th><th class='titulo'>Fecha</th><th class='titulo'>Hora</th><th class='titulo'>Acción</th> </tr>
				<tr>";
				while($registro = $respuesta->fetch_array(MYSQLI_ASSOC)){
					$orden = "SELECT nombre,apellido FROM clientes WHERE id_cliente=".$registro['cod_cliente']."";
					$respuesta2  = consulta($orden,$conexion);
					$cliente = $respuesta2->fetch_array(MYSQLI_ASSOC);	
					$cliente2 = $cliente['nombre']." ".$cliente['apellido'];

					$orden = "SELECT nombre FROM locales WHERE id_local=".$registro['id_loca']."";
					$respuesta2  = consulta($orden,$conexion);
					$local = $respuesta2->fetch_array(MYSQLI_ASSOC);

					$dia1 = explode( '-', $registro['fecha'] );
					$dia2 = $dia1[2].'/'.$dia1[1].'/'.$dia1[0];

					echo "<td>".$local['nombre']."</td><td>".$cliente2."</td><td>".$registro['horas']."</td><td>".$registro['precio']."€</td><td>".$dia2."</td><td>".$registro['hora']."</td><td><form method=POST id='form' class='form-horizontal center-block'  action='borrareservaexterna.php'><input type='hidden' name='idexterna' value='".$registro['cod_externas']."''><input class='btn btn-danger' type='submit' name='Borrar' value='borrar'/></form></td>";
				}
				echo "</tr>";
				echo "</table>";
			}else{
				echo "<div style='text-center'><h1>No hay reservas externas&nbsp;&nbsp;<img class='img-rounded' src='../iconos/listadolocales.png'></h1></div>";
			}
  		?>	
	</div>
</body>	
</html>