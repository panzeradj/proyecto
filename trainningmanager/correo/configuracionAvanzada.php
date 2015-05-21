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
	</head>
<?php menu(); ?>
<body>
	<div id="control">
		<div style="text-center"><h3 style="text-align=center"><?php echo correoIniciado() ?></h3></div>
		<div style="text-center"><h3 style="text-align=center"><?php if(isset($_GET["mensaje"])){echo "Correo mal introducido";} ?></h3></div>

		<form method=POST id="form" class="form-horizontal center-block"  action="guardarConfiguracion.php">
			<div class="center-block">
				<div style="text-center"><h1>Configuracion Correo Electrónico Avanzada</h1></div>
			<div  ><label>Correo Electrónico</label><input required  class="form-control  " title="Se necesita un correo " type=text name="correo" placeholder='correo@servidor.dominio'/></div>
			<div  ><label>Servidor SMTP</label><input required  class="form-control  " title="Se necesita un correo " type=text name="servidor" placeholder='smtp.1and1.es'/></div>
			<div  ><label>Puerto</label><input required  class="form-control  " title="Se necesita un correo " type=text name="puerto" placeholder='25'/></div>
			<div  ><label>Contraseña</label><input required  class="form-control  "  type="password" name="contraCorreo" placeholder='**********************'/></div>
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