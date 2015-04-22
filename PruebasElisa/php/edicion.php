<?php
include("funciones/function.php");
if (isset($_POST["accion"])){
	switch ($_POST["accion"]) {
		case 0:
			$factura=$_POST["factura"];
			ordensqlupdate("UPDATE facturas set estado=2 where id_factura=".$factura.";");
			break;
		case 1:
		case 2:
			$factura=$_POST["factura"];
			ordensqlupdate("UPDATE facturas set estado=0 where id_factura=".$factura.";");
			break;
		case 3:
			$factura=$_POST["factura"];
			$valor=$_POST["valor"];
			if (!isset($_POST["valor"])|| $_POST["valor"]==0){
				ordensql("SELECT valor_sin_iva * COUNT( * ) 
FROM precios_tarifas p, contratos c, tarifas t, facturas f, lineas_factura lf
WHERE c.tarifa = p.tarifa
AND p.tarifa = id_tarifa
AND f.cliente = c.cliente
AND f.id_factura = lf.factura
AND id_factura =12");
				ordensqlupdate("UPDATE facturas set valor=".$valor." where id_factura=".$factura.";");
			}
			ordensqlupdate("UPDATE facturas set valor=".$valor." where id_factura=".$factura.";");
			break;
	}
}
header("location:pagos.php");
?>