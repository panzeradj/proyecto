<?php
	include ("./funciones/funciones.php");
	$nombre=$_POST['nombre'];
	$nif=$_POST['nif'];
	$empresa=$_POST['empresa'];
	$tel=$_POST['tel'];
	$direccion=$_POST['direccion'];
 	$cp=$_POST['cp'];
 	$correo=$_POST['correo'];

	$conexion=abre();


$mensaje=altaproveedor($conexion,$nombre,$nif,$empresa,$tel,$direccion,$cp,$correo);
header ("Location: registroproveedor.php?mensaje=$mensaje");
?>
