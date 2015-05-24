<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$cifrar = hash('md5',$_POST['pass']);
$orden = "SELECT entrenador from login WHERE entrenador='".$_POST['identrenador']."'";
$resultado = consulta($orden,$conexion);
$esta = cantdatos($resultado);
if($esta<1){
	$orden = "INSERT INTO login(entrenador,pass,id_rol) VALUES ('".$_POST['identrenador']."','".$cifrar."',".$_POST['rol'].")";
	echo $orden;
	consulta($orden,$conexion);
}else{
	$orden = "UPDATE login SET pass='".$cifrar."',id_rol=".$_POST['rol']." WHERE entrenador='".$_POST['identrenador']."'";
	echo $orden;
	consulta($orden,$conexion);
}
header("location:entrenadores.php?mensaje=sesion");
?>