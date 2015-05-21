<?php  
require_once("../php/funciones/function.php");
require_once("funcionesEntrenadores.php");
include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();
?>
<style type="text/css">
	#control{
		width: 60em;
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
	td{
		background-color: #ffffff;
	}
	td, th{
		text-align: center;
		vertical-align: middle !important;
	}
	thead th{
		background-color: #eeeeee;
	}
</style>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
    function error(){
        alertify.error("No tenemos entrenadores en el sistema"); 
        return false;
    }
    function borrar(){
        alertify.error("Se a eliminado al entrenador"); 
        return false;
    }
    function modificar(){
        alertify.success("Se a modificado correctamente el entrenador"); 
        return false;
    }
    function version(){
        alertify.log("No disponible en esta versión"); 
        return false;
    }
</script>
</head>
<?php menu(); ?>
<body>
	<div id="control">
		<?php
		if(isset($_GET["mensaje"])){
			if($_GET["mensaje"]=='sin'){
				echo "<script>error();</script>";
			}
			if($_GET["mensaje"]=='borrar'){
				echo "<script>borrar();</script>";
				echo "<div style=text-center><h1>Listado de entrenadores&nbsp;&nbsp;<img class='img-rounded' src='../iconos/entrenadores.png'></h1></div>";
				echo listarEntrenadores();
			}
			if($_GET["mensaje"]=='modificar'){
				echo "<script>modificar();</script>";
				echo "<div style=text-center><h1>Listado de entrenadores&nbsp;&nbsp;<img class='img-rounded' src='../iconos/entrenadores.png'></h1></div>";
				echo listarEntrenadores();
			}
		}else{
			echo "<div style=text-center><h1>Listado de entrenadores&nbsp;&nbsp;<img class='img-rounded' src='../iconos/entrenadores.png'></h1></div>";
			echo listarEntrenadores();
		}
		?>
	</div >
</body>	
</html>