<?php  
require_once("../php/funciones/function.php");
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
        function ok(){
            alertify.success("Contraseña modificada con exito"); 
            return false;
        }
        function actualNo(){
        	alertify.error("Contraseña actual incorrecta"); 
        	return false; 
    	}
    	function diferente(){
       		alertify.error("Las contraseñas no coinciden"); 
        	return false; 
    	}
    </script>
</head>
<?php menu(); ?>
<body>
	<div id="control">
		<div style="text-center"><h3 style="text-align=center"><?php if(isset($_GET["mensaje"])){if($_GET["mensaje"]=="mal"){echo "<script>actualNo();</script>";}if($_GET["mensaje"]=="nocoincide"){echo "<script>diferente();</script>";}if($_GET["mensaje"]=="bien"){echo "<script>ok();</script>";}} ?></h3></div>

		<form method=POST id="form" class="form-horizontal center-block"  action="changepass.php">
			<div class="center-block">
				<div style="text-center"><h1>Cambio de contraseña del sistema  <img src='../iconos/pass.png'></h1></div>
			<div  ><label>Contraseña Actual</label><input required  class="form-control  "  type="password" name="passActual" placeholder='●●●●●●●●●●●'/></div>
			<div  ><label>Nueva contraseña</label><input required  class="form-control  " title="Se necesita un correo " type="password" name="passNueva" placeholder='●●●●●●●●●●●'/></div>
			<div  ><label>Confirmar contraseña</label><input required  class="form-control  " title="Se necesita un correo " type="password" name="passNuevaC" placeholder='●●●●●●●●●●●'/></div>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Confirmar">
  		</form>
  		</div>
  		<br>
  		<br>
		
	</div >
	</form>
	</div>
</body>	
</html>