<?php
require_once("basededatos.php");
require_once("config.php");

function nombreEntrenador($us){
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT nombre, apellidos FROM entrenadores WHERE id_entrenador='".$us."'";
	$resultado = consulta($orden,$conexion);
	$registro = $resultado->fetch_array(MYSQLI_ASSOC);
	$respuesta = $registro['nombre']." ".$registro['apellidos'];
	return $respuesta;
}


?>