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
			if ($_POST["valor"]==0){
				$listaprecio=ordensql("SELECT valor_sin_iva*count(*)
							from precios_tarifas p, contratos c, tarifas t, facturas f, lineas_factura lf 
							where c.tarifa=p.tarifa and p.tarifa=id_tarifa and f.cliente=c.cliente and f.id_factura=lf.factura	
							and fecha_inicial=(select fecha_inicial
							                    from precios_tarifas p,contratos c
							                    where c.tarifa=p.tarifa and factura=".$factura."
							                    order by fecha_inicial desc limit 1);");
				$resultadoprecio=$listaprecio->fetch_array();
				ordensqlupdate("UPDATE facturas set valor=".$resultadoprecio[0]." where id_factura=".$factura.";");
			}elseif ($valor>0){
				ordensqlupdate("UPDATE facturas set valor=".$valor." where id_factura=".$factura.";");
			}
			break;
	}
}
header("location:pagos.php");
?>