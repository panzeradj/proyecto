<?php
	include ("./funciones/funciones.php");
	$nfactura=$_POST['nfactura'];
	if($nfactura!=null){
		$conexion=abre();
		$orden="select cliente from facturas WHERE id_factura=".$nfactura.";";
		$conexion->query($orden);
		$chorizo = $conexion->query($orden);
		$registro = $chorizo->fetch_array();
		

		if($registro[0]==1){
			$orden="SELECT f.borrable FROM facturas f where id_factura=".$nfactura.";";
			$chorizo=$conexion->query($orden);
			$registro = $chorizo->fetch_array();

			if($registro[0]==0){
				$orden="delete FROM lineas_factura  where producto>199999 and factura=$nfactura;";
				$conexion->query($orden);
				fijartotal($conexion,$nfactura);


			}else{
				$orden="delete FROM lineas_factura  where producto>199999 and factura=$nfactura;";
				$conexion->query($orden);
				$orden="delete FROM facturas  where id_factura=$nfactura;";
				$conexion->query($orden);
				
			}
			$mensaje="eliminados";
	}else{
			$mensaje="errcre";
		}
	cierra($conexion);
}else{
	$mensaje="errnocre";
}	

	header ("Location: tpv.php?mensaje=$mensaje");
?>