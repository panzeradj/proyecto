<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "DELETE FROM entrenadores WHERE id_entrenador='".$_POST['entrenador']."'";
consulta($orden,$conexion);
header("location:entrenadores.php?mensaje=borrar");
?>