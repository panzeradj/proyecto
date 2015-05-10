<?php
require_once("basededatos.php");
require_once("config.php");

function compruebaPass($pass){
	$pas = hash('md5',$pass);

	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden="SELECT pass from login WHERE pass='".$pas."'";
	$lista = consulta($orden,$conexion);
	$respuesta = cantdatos($lista);
	if (!($respuesta==1)){
		return 0;
	}else{
		return 1;
	}
}


?>