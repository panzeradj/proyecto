<?php require_once("funcionesNotificaciones.php");   ?><!DOCTYPE html>
 
<html lang="es">

<script type="text/javascript" src="alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="alertify/themes/alertify.default.css" />
<script type="text/javascript">
	function notificacionNo(){
	//un confirm
	alertify.confirm("<p>No hay notificaciones ¿Configurarlas ahora? <br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
		if (e) {
			alertify.success("Has pulsado '" + alertify.labels.ok + "'");
		} else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
		}
	}); 
	return false
}
</script>
<?php

$hayNotificaciones = compruebaNotificacion();
echo " ";
if($hayNotificaciones=="no"){
	echo " <script type=text/javascript>notificacionNo();</script>";
	
}

?>

<head>
<title>Titulo de la web</title>
<meta charset="utf-8" />
</head>
 
<body>
<h1>Pruebas</h1>
<p>p</p>
</body>
</html>