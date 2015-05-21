<?php
require_once("config.php");
require_once("basededatos.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "TRUNCATE notificaciones";
$resultadoInfo = consulta($orden,$conexion);

$orden = "INSERT INTO notificaciones (id_notificacion,nombre,mensaje) VALUES (1,'birthday','".$_POST['mensaje']."');";
$resultadoInfo = consulta($orden,$conexion);
$conexion->close();
header("Location: configuranotificacion.php?mensaje=ok");
?>