<?php
	include ("./funciones/funciones.php");
	$nombre=$_POST['nombre'];
	$des=$_POST['des'];
	$proveedor=$_POST['proveedor'];
	$precio=$_POST['precio'];


	$conexion=abre();


$mensaje=altaproducto($conexion,$nombre,$des,$proveedor,$precio);
header ("Location: registroproducto.php?mensaje=$mensaje");
?>
