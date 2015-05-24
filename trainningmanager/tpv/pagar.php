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
		$orden="SELECT producto,cantidad FROM lineas_factura l where factura=$nfactura and producto>199999 and producto<600000;";
		if ($chorizo = $conexion->query($orden)){
		
				while ($registro = $chorizo->fetch_array()) {
					
					$orden="INSERT INTO stock (producto,cantidad,accion) VALUES ($registro[0],$registro[1],1);";
					$conexion->query($orden);

				}
		}			


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