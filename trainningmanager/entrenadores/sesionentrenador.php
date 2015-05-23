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
</head>
<?php menu(); 
?>
<body>
	<div id="control">
		<form method=POST id="form" class="form-horizontal center-block"  action="sesion.php">
			<div class="center-block">
				<div style="text-center"><h1>Sesión entrenador <?php echo $_POST['entrenador']; ?>&nbsp;&nbsp;<img class="img-rounded" src='../iconos/sesion.png'></h1></div>
			<div  ><label>Contraseña</label><input required  class="form-control  "  type="password" name="pass" placeholder='●●●●●●●●●●●'/></div>
  			<br>
  			<input type="hidden" name="identrenador" value="<?php echo $_POST['entrenador']; ?>">
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Añadir">
  		
  			</div>
  		</form>
  		<br>
  		<br>
	</div >
	
	</div>
</body>	
</html>