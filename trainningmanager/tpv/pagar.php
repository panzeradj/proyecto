<?php
	include ("./funciones/funciones.php");
	$nfactura=$_POST['nfactura'];
	if($nfactura!=null){
	$conexion=abre();
	$orden="select estado from facturas WHERE id_factura=".$nfactura.";";
	$conexion->query($orden);
	$chorizo = $conexion->query($orden);
	$registro = $chorizo->fetch_array();

	if($registro[0]==0){
		$total=fijartotal($conexion,$nfactura);
		$orden="UPDATE facturas SET valor=".$total.",estado=1 WHERE id_factura=".$nfactura.";";
		$conexion->query($orden);
		$mensaje="Factura pagada";
	}else{
		$mensaje="Esta factura ya esta pagada";
	}
}else{
	$mensaje="No hay ninguna factura ";
}
	cierra($conexion);

	header ("Location: tpv.php?mensaje=$mensaje");
?>