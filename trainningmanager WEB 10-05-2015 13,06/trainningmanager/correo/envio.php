<?php  
require_once("../php/funciones/function.php");
require_once("funcionesCorreo.php");
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
	h1{
		text-align: center;
	}
</style>
</head>
<?php menu(); ?>
<body>
	<?php
		$resultado = iniciado();

		if($resultado==1){
	?>
	<div id="control">
		<div style="text-center"><h3 style="text-align=center"><?php echo correoIniciado() ?></h3></div>
		<div style="text-center"><h3 style="text-align=center"><?php if(isset($_GET["mensaje"])){if($_GET["mensaje"]=="correcto"){echo "Correo enviado";} if($_GET["mensaje"]=="mal"){echo "Ha ocurrido un error inesperado";} }?></h3></div>

		<form method=POST id="form" class="form-horizontal center-block"  action="procesando.php">
			<div class="center-block">
				<div style="text-center"><h1>Enviar correo electrónico</h1></div>
			<div  ><label>Destinatario</label><input required  class="form-control  "  type=text name="destino" placeholder='correo@servidor.dominio'/></div>
			<br>
			<div  ><label>Asunto</label><input required  class="form-control  "  type=text name="asunto" placeholder='correo@servidor.dominio'/></div>
  			<br>
  			<div  ><label>Mensaje</label><textarea required class="form-control" rows="5" name="mensaje"></textarea>
  			<br>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="Enviar" value="Enviar">
  		
  			</div>
  		</form>
  		<br>
  		<br>
	</div >
	
	</div>
	<?php
		}else{
	?>
	<div id="control">
		<div style="text-center"><h1>No hay ninguna cuenta de correo configurada</h1></div>
		<div style="text-center"><h3>Configurela ahora</h3></div>
		<form method=POST id="form" class="form-horizontal center-block"  action="configuraciones.php">
			<br>
			<br>
			<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="Enviar" value="Configurar cuenta">
		</form>
	</div>
	<?php
		}
	?>
</body>	
</html>