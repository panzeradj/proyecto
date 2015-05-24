<?php
require_once("basededatos.php");
require_once("config.php");
require_once("compruebaPass.php");
session_start();
$comprobando = compruebaPass($_POST['passActual']);
if($comprobando==0){
	//echo $comprobando;
	header("Location: nuevapass.php?mensaje=mal");
	exit;
}

if (strcmp ($_POST['passNueva'] , $_POST['passNuevaC'] ) == 0) {
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$pas = hash('md5',$_POST['passNueva']);
	$orden = "UPDATE login SET pass='".$pas."' WHERE entrenador='".$_SESSION["us"]."'";
	$resultadoInfo = consulta($orden,$conexion);
	header("Location: nuevapass.php?mensaje=bien");

}else{
	header("Location: nuevapass.php?mensaje=nocoincide");
}

?>