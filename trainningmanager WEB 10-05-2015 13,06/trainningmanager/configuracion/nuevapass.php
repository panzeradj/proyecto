<?php  
require_once("../php/funciones/function.php");
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
	</head>
<?php menu(); ?>
<body>
	<div id="control">
		<div style="text-center"><h3 style="text-align=center"><?php if(isset($_GET["mensaje"])){if($_GET["mensaje"]=="mal"){echo "Contraseña actual mal introducida";}if($_GET["mensaje"]=="nocoincide"){echo "Las contraseñas no coinciden";}if($_GET["mensaje"]=="bien"){echo "Contraseña modificada con exito";}} ?></h3></div>

		<form method=POST id="form" class="form-horizontal center-block"  action="changepass.php">
			<div class="center-block">
				<div style="text-center"><h1>Cambio de contraseña del sistema</h1></div>
			<div  ><label>Contraseña Actual</label><input required  class="form-control  "  type="password" name="passActual" placeholder='●●●●●●●●●●●'/></div>
			<div  ><label>Nueva contraseña</label><input required  class="form-control  " title="Se necesita un correo " type="password" name="passNueva" placeholder='●●●●●●●●●●●'/></div>
			<div  ><label>Confirmar contraseña</label><input required  class="form-control  " title="Se necesita un correo " type="password" name="passNuevaC" placeholder='●●●●●●●●●●●'/></div>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="Enviar" value="Confirmar">
  		</form>
  		</div>
  		<br>
  		<br>
		
	</div >
	</form>
	</div>
</body>	
</html>