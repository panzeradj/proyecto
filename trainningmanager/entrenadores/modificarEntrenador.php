<?php  
require_once("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
require_once("basededatos.php");
require_once("config.php");
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
</style>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
    function error(){
        alertify.error("Error al intentar modificar"); 
        return false;
    }
    function error2(){
        alertify.error("No encontramos el entrenador"); 
        return false;
    }
</script>
</head>
<?php menu(); ?>
<body>
	<div id="control">
<?php 
	if(isset($_POST["entrenador"])){
		$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
		$orden = "SELECT * FROM entrenadores WHERE id_entrenador = '".$_POST['entrenador']."'";
		$resultadoInfo = consulta($orden,$conexion);
		$cuanto = cantdatos($resultadoInfo);
		if($cuanto==1){
			$resultado = $resultadoInfo ->fetch_array(MYSQLI_ASSOC);
			$patronMail = "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$";
			echo '<form method=POST id="form" class="form-horizontal center-block"  action="modifica.php">
				<div class="center-block">
					<div style="text-center"><h1>Modificar entrenador&nbsp;&nbsp;<img class="img-rounded" src="../iconos/introducirentrenador.png"></h1></div>
				<input type=hidden name="usuario" value="'.$resultado['id_entrenador'].'"/>
				<div  ><label>Nombre</label><input class="form-control  "  type=text name="nombre" value="'.$resultado['nombre'].'" /></div>
	  			<div  ><label>Apellidos</label><input class="form-control  "  type=text name="apellidos" value="'.$resultado['apellidos'].'" /></div>
				<div  ><label>Correo Electronico</label><input class="form-control  " pattern="'.$patronMail.'"  type=text name="correo" value="'.$resultado['email'].'" /></div>
	  			<br>
	  			<input type="submit"  class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="Enviar" value="Modificar">
	  			</div>
  			</form>';


		}else{
			echo "<script>error2();</script>";
			//No llega ningun entrenador;
		}
	}else{
		echo "<script>error();</script>";
	}
	
	
		?>
		

  		<br>
  		<br>
	</div >
</body>	
</html>