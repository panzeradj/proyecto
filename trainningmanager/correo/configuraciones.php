<?php  
require_once("../php/funciones/function.php");
require_once("funcionesCorreo.php");
include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();
?>
<style type="text/css">
	#control{


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
function mail(){
    alertify.success("<?php echo correoIniciado(); ?>"); 
    return false;
}
function error(){
    alertify.error("Correo mal introducido"); 
    return false; 
}
</script>
</head>
<?php menu(); ?>
<?php
	
	$resultado = iniciado();

	if($resultado==1){
	?>
	<script type="text/javascript">mail();</script>
	<?php
		}
	?>
<body>
	<div id="control">
		<!--<div style="text-center"><h3 style="text-align=center"><?php echo correoIniciado() ?></h3></div>-->
		<div style="text-center"><h3 style="text-align=center"><?php if(isset($_GET["mensaje"])){echo "<script>error();</script>";} ?></h3></div>
		<form method=POST id="form" class="form-horizontal center-block"  action="guardarConfiguracion.php">
			<div class="center-block">
				<div style="text-center"><h1>Configuracion Correo Electrónico&nbsp;&nbsp;<img class="img-rounded" src='../iconos/config.png'></h1></div>
			<div  ><label>Correo Electrónico</label><input required  class="form-control  " title="Se necesita un correo " type=text name="correo" placeholder='correo@servidor.dominio'/></div>
			<div  ><label>Contraseña</label><input required  class="form-control  "  type="password" name="contraCorreo" placeholder='●●●●●●●●●●●'/></div>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Confirmar">
  		
  			</div>
  		</form>
  		<br>
  		<br>
		<form method=POST id="form" class="form-horizontal center-block container "  action="configuracionAvanzada.php">
			<div class="center-block">
  			<input type="submit"  class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="avanzada" value="Configuración Avanzada">
  		</div>
	</div >
	
	</div>
</body>	
</html>