<?php  
require_once("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
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
    function ok(){
        alertify.success("Entrenador introducido correctamente"); 
        return false;
    }
    function error(){
        alertify.error("El usuario ya existe"); 
        return false;
    }
    function error2(){
        alertify.error("Correo electronico mal introducido"); 
        return false;
    }
</script>
</head>
<?php menu(); ?>
<body>
	<div id="control">
		<?php 
		if(isset($_GET["mensaje"])){
			if($_GET["mensaje"]=="mal"){
				echo "<script>error();</script>";
			}
			if($_GET["mensaje"]=="bien"){
				echo "<script>ok();</script>";
			}
			if($_GET["mensaje"]=="correo"){
				echo "<script>error2();</script>";
			}
		}

		?>

		<form method=POST id="form" class="form-horizontal center-block"  action="guardarConfiguracion.php">
			<div class="center-block">
				<div style="text-center"><h1>Introducir entrenador&nbsp;&nbsp;<img class="img-rounded" src='../iconos/introducirentrenador.png'></h1></div>
			<div  ><label>Usuario</label><input required  class="form-control  " title="Se necesita un correo " type=text name="usuario" placeholder='adriancarnicero'/></div>
			<div  ><label>Nombre</label><input required  class="form-control  "  type=text name="nombre" placeholder='Adrian'/></div>
  			<div  ><label>Apellidos</label><input required  class="form-control  "  type=text name="apellidos" placeholder='Carnicero'/></div>
			<div  ><label>Correo Electronico</label><input required  class="form-control  "  type=text name="correo" placeholder='adrian@acwellness.es'/></div>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Añadir">
  			</div>
  		</form>
  		<br>
  		<br>
	</div >
</body>	
</html>