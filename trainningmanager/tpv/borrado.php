<?php
	include ("./funciones/funciones.php");
	
	$proveedor=$_POST['proveedor'];
	
	$conexion=abre();


$mensaje=borrarproveedor($conexion,$proveedor);
cierra($conexion);
header ("Location: registroproveedor.php?mensaje=$mensaje");
?>