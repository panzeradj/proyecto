<?php
	include ("./funciones/funciones.php");
	$cantidad=$_POST['cantidad'];
	$producto=$_POST['producto'];
	$nfactura=$_POST['nfactura'];
	$conexion=abre();
	
	if ($nfactura==null) {
		
		$nfactura=creafatura($conexion);
		
	}
	
	$orden="select estado from facturas WHERE id_factura=".$nfactura.";";
	$conexion->query($orden);
	$chorizo = $conexion->query($orden);
	$registro = $chorizo->fetch_array();
	
if($registro[0]==0){
	

	if ($nfactura==null) {
		
		$nfactura=creafatura($conexion);
		
	}
	
	
	addproducto($conexion,$nfactura,$producto,$cantidad);
	$mensaje = "addproducto";
	
	
	
}else{
	$mensaje="errcre";
}

cierra($conexion);
header ("Location: tpv.php?nfactura=$nfactura&mensaje=$mensaje");

?>
