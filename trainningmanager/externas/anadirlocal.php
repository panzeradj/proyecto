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
	function anadir(){
        alertify.success("Se a añadido el local externo"); 
        return false;
    }
    function borrar(){
        alertify.success("Se a borrado el local externo"); 
        return false;
    }
</script>
</head>
<?php menu(); 
if(isset($_GET["mensaje"])){
	if($_GET["mensaje"]=='bien'){
		echo "<script>anadir();</script>";
	}
	if($_GET["mensaje"]=='borrado'){
		echo "<script>borrar();</script>";
	}
}	
?>
<body>
	<div id="control">
		<form method=POST id="form" class="form-horizontal center-block"  action="maslocal.php">
			<div class="center-block">
			<div style="text-center"><h1>Añadir local&nbsp;&nbsp;<img class="img-rounded" src='../iconos/poli.png'></h1></div>
			<div  ><label>Nombre</label><input required  class="form-control  "  type="text" name="name" placeholder='Polideportivo'/></div>
  			<br/>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Añadir">
  		
  			</div>
  		</form>
  		<br>
  		<br>
  		
  		<?php
  		$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
  		$orden = "SELECT * FROM locales";
  		$respuesta  = consulta($orden,$conexion);
  		$esta = cantdatos($respuesta);
		if($esta!=0){
			echo "<div style='text-center'><h1>Listado locales&nbsp;&nbsp;<img class='img-rounded' src='../iconos/listadolocales.png'></h1></div>";
			echo "<table class='table table-hover'>
    		<tr><th class='titulo'>Nombre</th> 
   			<th class='titulo'>Acción</th> </tr>
			<tr>";
			while($registro = $respuesta->fetch_array()){
				echo "<td>".$registro[1]."</td><td><form method=POST id='form' class='form-horizontal center-block'  action='eliminalocal.php'><input type='hidden' name='idlocal' value='".$registro[0]."''><input class='btn btn-danger' type='submit' name='Borrar' value='borrar'/></form></td>";
			}
			echo "</tr>";
			echo "</table>";
		}
  		?>
	</div >
	
	</div>
</body>	
</html>