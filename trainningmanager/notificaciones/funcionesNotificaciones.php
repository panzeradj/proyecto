<?php
require_once("config.php");
//require_once("basededatos.php");
function compruebaNotificacion(){
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT * FROM notificaciones WHERE nombre='birthday'";
	$resultadoInfo = consulta($orden,$conexion);
	$cuanto = $resultadoInfo->num_rows;
	if(!($cuanto==0)){
		$orden = "SELECT * FROM log_notificaciones WHERE fecha!=CURDATE()";
		$resultado = consulta($orden,$conexion);
		$cuanto = $resultado->num_rows;
		if(!($cuanto==0)){
			return "si";
		}else{
			return "esta";
		}
	}else{
		return "no";
	}
}
/*function datos(){
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT mensaje FROM notificaciones WHERE nombre='birthday'";
	$resultado = consulta($orden,$conexion);
	$registro = $resultado->fetch_array(MYSQLI_ASSOC);
	$vuelta = $registro['mensaje'];
	$conexion->close();
	return $vuelta;
}*/



?>