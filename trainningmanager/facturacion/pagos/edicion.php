<?php
session_start();
include("../../php/funciones/function.php");
comprueba();
$mensaje = "";
if (isset($_POST["accion"])){
	switch ($_POST["accion"]) {
		case 0:
			$factura=$_POST["factura"];
			ordensqlupdate("UPDATE facturas set estado=2 where id_factura=".$factura.";");
			$mensaje = "a";
			break;
		case 1:
		case 2:
			$factura=$_POST["factura"];
			ordensqlupdate("UPDATE facturas set estado=0 where id_factura=".$factura.";");
			$mensaje = "h";
			break;
		case 3:
			$factura=$_POST["factura"];
			$valor=$_POST["valor"];
			if ($valor>=0 && is_numeric($valor)) {
				if ($valor==0){
					$valorfactura=preciofactura($factura);
					ordensqlupdate("UPDATE facturas set valor=".$valorfactura." where id_factura=".$factura.";");
				}elseif ($valor>0){
					ordensqlupdate("UPDATE facturas set valor=".$valor." where id_factura=".$factura.";");
				}
				$mensaje = "e";
			}
			
			break;
		case 4:
			$factura=$_POST["factura"];
			ordensqlupdate("UPDATE facturas set estado=1 where id_factura=".$factura.";");
			$mensaje = "p";
			break;
	}
}
header("location:pagos.php?mensaje=".$mensaje."");
?>