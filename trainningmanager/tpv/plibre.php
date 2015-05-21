<?php
	include ("./funciones/funciones.php");
	$nfactura=$_POST['nfactura'];
	$cantidad=$_POST['cantidad'];
	$concepto=$_POST['concepto'];
	$conexion=abre();

	if ($nfactura==null) {
		
		$nfactura=creafatura($conexion);
		
	}
	
	$orden="select estado from facturas WHERE id_factura=".$nfactura.";";
	$conexion->query($orden);
	$chorizo = $conexion->query($orden);
	$registro = $chorizo->fetch_array();

if($registro[0]==0){
	

	
	
	$orden="insert into productos_libres (descripcion,valor) values ('".$concepto."',".$cantidad.");";
	$conexion->query($orden);
	$orden="SELECT LAST_INSERT_ID()";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$id_concepto=$registro[0];

	
	addproductolibre($conexion,$nfactura,$id_concepto);
	$mensaje = "okconcep";
	
	}else{
	$mensaje="errcre";
}
cierra($conexion);
header ("Location: tpv.php?nfactura=$nfactura&mensaje=$mensaje");
?>