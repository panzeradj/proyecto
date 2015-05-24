<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$cifrar = hash('md5',$_POST['pass']);
$orden = "INSERT INTO login(entrenador,pass) VALUES ('".$_POST['identrenador']."','".$cifrar."')";
consulta($orden,$conexion);
header("location:entrenadores.php?mensaje=sesion");
?>