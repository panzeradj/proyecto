<?php
require_once("basededatos.php");
require_once("config.php");
$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "UPDATE entrenadores SET nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos']."',email='".$_POST['correo']."' WHERE id_entrenador='".$_POST['usuario']."';";
consulta($orden,$conexion);
header("location:entrenadores.php?mensaje=modificar");
?>