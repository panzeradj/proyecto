

<?php
	include ("./funciones/funciones.php");
	$nombre=$_POST['nombre'];
	$nif=$_POST['nif'];
	$empresa=$_POST['empresa'];
	$tel=$_POST['tel'];
	$direccion=$_POST['direccion'];
  $cp=$_POST['cp'];


	$conexion=abre();


altaproveedor($conexion,$usuario,$nif,$empresa,$tel,$direccion,$cp);
?>
