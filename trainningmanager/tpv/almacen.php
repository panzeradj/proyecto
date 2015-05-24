<?php 
include ("./funciones/funciones.php");
	$cantidad=$_POST['cantidad'];
	$producto=$_POST['producto'];
	$conexion=abre();
	//echo $producto.$cantidad;

	$orden="INSERT INTO stock (producto,cantidad) VALUES ($producto,$cantidad);";
	//echo $orden;
	$conexion->query($orden);
	$mensaje="<h1align='center'>Alacén actualizado</h1>";

	header ("Location: registroproducto.php?mensaje=$mensaje");


?>