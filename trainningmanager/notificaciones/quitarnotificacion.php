<?php
require_once("config.php");
require_once("basededatos.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$notificacion = "TRUNCATE log_notificaciones";
consulta($notificacion,$conexion);
$fecha_actual=date("d/m/Y");
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha_actual ) ) ;
$notificacion = "INSERT INTO log_notificaciones (id_log,fecha) VALUES (1,".$nuevafecha");";
consulta($notificacion,$conexion);
$conexion->close();
?>