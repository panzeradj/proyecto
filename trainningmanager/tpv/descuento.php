<?php
	include ("./funciones/funciones.php");
	$nfactura=$_POST['nfactura'];
	$descuento=$_POST['descuento'];
	
	$conexion=abre();
	if ($nfactura!=null) {
		
		
		$orden="select estado from facturas WHERE id_factura=".$nfactura.";";
		$conexion->query($orden);
		$chorizo = $conexion->query($orden);
		$registro = $chorizo->fetch_array();

	if($registro[0]==0){
		$orden="UPDATE facturas SET  descuento=".$descuento." WHERE id_factura=".$nfactura.";";
		$chorizo=$conexion->query($orden);
		$mensaje = "descok";
	}else{
		$mensaje="errcre";
	}
	cierra($conexion);
}else{
	$mensaje="errnocre";

}

header ("Location: tpv.php?nfactura=$nfactura&mensaje=$mensaje");
?>