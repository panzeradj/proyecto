<?php
require_once("basededatos.php");
require_once("config.php");
require_once("email.php");



$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$mensaje = "";
$compruebaMail = comprobar_email($correo);
if($compruebaMail==0){
	$mensaje = "correo";
}else{
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT id_entrenador FROM entrenadores WHERE id_entrenador='".$usuario."'";
	$resultadoInfo = consulta($orden,$conexion);
	$cuanto = cantdatos($resultadoInfo);
	if($cuanto==1){
		$mensaje = "mal";
	}else{
		$orden = "INSERT INTO entrenadores(id_entrenador,nombre,apellidos,email) VALUES ('".$usuario."','".$nombre."','".$apellidos."','".$correo."');";
		$resultadoInfo = consulta($orden,$conexion);
		$mensaje = "bien";
	}
}
header("Location: masEntrenador.php?mensaje=".$mensaje."");

?>