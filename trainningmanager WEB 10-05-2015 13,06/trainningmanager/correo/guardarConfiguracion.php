<?php

require_once("basededatos.php");
require_once("config.php");
require_once("funcionesCorreo.php");


$resultado = comprobar_email($_POST["correo"]);
if($resultado==1){
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "truncate correo";
	consulta($orden,$conexion);
	if($_POST["puerto"]==null){
		$orden = "INSERT INTO correo (correo,pass,servidor,puerto) VALUES ('".$_POST["correo"]."','".$_POST["contraCorreo"]."','smtp.1and1.es','25');";
	}else{
		$orden = "INSERT INTO correo (correo,pass,servidor,puerto) VALUES ('".$_POST["correo"]."','".$_POST["contraCorreo"]."','".$_POST["servidor"]."','".$_POST["puerto"]."');";
	}
	consulta($orden,$conexion);
	$conexion->close();
	header("Location:configuraciones.php");
}else{
	$mensaje = "Mal";
	header("Location:configuraciones.php?mensaje=".$mensaje."");
}


?>