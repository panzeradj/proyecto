<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "INSERT INTO locales(nombre) VALUES ('".$_POST['name']."')";
consulta($orden,$conexion);
header("location:anadirlocal.php?mensaje=bien");
?>