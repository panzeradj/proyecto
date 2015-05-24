<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "DELETE FROM externas WHERE cod_externas=".$_POST['idexterna']."";
consulta($orden,$conexion);
header("location:listadoexternas.php?mensaje=borrado");
?>