<?php
	include ("./funciones/funciones.php");
	$nfactura=$_POST['nfactura'];
	echo($nfactura);
	if($nfactura!=null){
		$conexion=abre();
		$orden="select cliente from facturas WHERE id_factura=".$nfactura.";";
		$conexion->query($orden);
		$chorizo = $conexion->query($orden);
		$registro = $chorizo->fetch_array();
		echo($nfactura);
		
		if($registro[0]==1){
			$orden="delete FROM lineas_factura  where producto>199999 and factura=$nfactura;";
				$conexion->query($orden);
				$orden="delete FROM facturas  where id_factura=$nfactura;";
				$conexion->query($orden);
	
				echo("aqui");


			}else{
				$orden="delete FROM lineas_factura  where producto>199999 and factura=$nfactura;";
				$conexion->query($orden);
				fijartotal($conexion,$nfactura);
				
			}
			$mensaje="eliminados";
	}else{
			$mensaje="errcre";
		}
	cierra($conexion);


	header ("Location: tpv.php?mensaje=$mensaje");
?>