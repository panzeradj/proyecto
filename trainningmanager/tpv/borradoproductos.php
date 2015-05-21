<?php
	include ("./funciones/funciones.php");
	
	$producto=$_POST['producto'];
	
	$conexion=abre();


$mensaje=borrarproducto($conexion,$producto);

cierra($conexion);
header ("Location: registroproducto.php?mensaje=$mensaje");
?>