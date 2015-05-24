<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "DELETE FROM locales WHERE id_local=".$_POST['idlocal']."";
consulta($orden,$conexion);
header("location:anadirlocal.php?mensaje=borrado");
?>