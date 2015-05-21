<?php  
require_once("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
include ('funcionesNotificaciones.php');

require_once("config.php");
require_once("basededatos.php");
cabecera();
?>
    <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
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
	h1{
		text-align: center;
	}
	#borrar{
		width: 100%;
	}
</style>
<script type="text/javascript">
function borrado(){
    alertify.error("Mensaje eliminado"); 
    return false; 
}
function ok(){
    alertify.success("Mensaje automatico guardado"); 
    return false;
}
</script>
</head>
<?php menu();
if(!(empty($_GET["mensaje"]))){
    if($_GET["mensaje"]=="ok"){
        echo "<script type=text/javascript>ok();</script>";
    }
    if($_GET["mensaje"]=="borrado"){
         echo "<script type=text/javascript>borrado();</script>";
    }
}
?>

<body>
	<div id="control">
		<form method=POST id="form" class="form-horizontal center-block"  action="configuraNot.php">
			<div style="text-center"><h1>Configurar correo cumpleaños&nbsp;&nbsp;<img class="img-rounded" src='../iconos/cumple.png'></h1></div>
  			<div  ><label>Mensaje</label><textarea required class="form-control"rows='10' cols='100' wrap='soft' name="mensaje"><?php 	
  			$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
			$orden = "SELECT mensaje FROM notificaciones WHERE nombre='birthday'";
			$resultado = consulta($orden,$conexion);
			$registro = $resultado->fetch_array(MYSQLI_ASSOC);
			echo $registro['mensaje'];
			$conexion->close(); ?>
			</textarea>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Configurar">

  			</div>
  		</form>
  		<br/>
  		<form method=POST id="form" class="form-horizontal center-block"  action="delete.php">
  			<input id='borrar' type="submit"  class=" anchoMax  PATEON btn btn-success btn-danger  RESET" name="Enviar" value="Borrar">
  		</form>
  		<br>
  		<br>
	</div >
</body>	
</html>