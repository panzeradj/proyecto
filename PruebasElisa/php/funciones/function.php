<?php
	function abrirBBDD()
	{
			$conexion = new mysqli("127.0.0.1", "root", /*"root"*/"", "trainningmanager");
			$conexion->Set_charset("UTF8");

			if (mysqli_connect_errno()) 
			{
		    	die("Error grave: " . mysqli_connect_error());
			}
			return $conexion;
	}

	function cerrarBBDD($conexion)
	{
		$conexion->close(/*$conexion*/);
	}
	function ordensql($ordensql)
	{
		//echo $ordensql;
		$conexion=abrirBBDD();
		
		if($chorizo=$conexion->query($ordensql))
		{
			cerrarBBDD($conexion);
			return $chorizo;
		}
		else
		{
			
			return false;
		}			
	}
	function ordensqlupdate($ordensql)
	{
		$conexion=abrirBBDD();
		$conexion->query($ordensql);
		cerrarBBDD($conexion);
	}

	function comprobarpagos(){
		//primero hay que mirar si en la tabla pagos hay entrada para este mes y este año
		$anyo=date("Y");
		$mes=date("m");
		$lista = ordensql("SELECT * from pagos where mes=".$mes." and anyo=".$anyo.";");
		
		if (!($lista->fetch_array())){
			//EMISIÓN DE PAGOS
			//1. Calcular cada factura por cada cliente que haya tenido reservas sin pagar de ese mes o anteriores
				//1.1. Mirar clientes con reservas sin pagar
			$listaclientes=ordensql("SELECT id_cliente FROM clientes, reservas WHERE pagada =0 and (cancelada=0 or cancelada=2) AND cliente = id_cliente and mes<=".$mes." and anyo=".$anyo." GROUP BY id_cliente;");
			while ($resultadoclientes=$listaclientes->fetch_array()){
				//1.2. En los clientes que las tengan, empezar una nueva factura (que empieza como emitida, 0)
				ordensqlupdate("INSERT INTO facturas (cliente, fecha, estado,valor,descuento) VALUES (".$resultadoclientes[0].", now(), 0, 0, 0);");
				$listaid=ordensql("SELECT MAX(id_factura) FROM facturas");
				$resultadoid=$listaid->fetch_array();
				//1.3. Añadir cada clase como línea de factura y marcarla como pagada en reservas
				$listaclases=ordensql("SELECT id_reserva FROM reservas WHERE pagada=0 and (cancelada=0 or cancelada=2) and ((mes<=".$mes." and anyo=".$anyo.") or (anyo<".$anyo.")) AND cliente =".$resultadoclientes[0].";");
				while ($resultadoclases=$listaclases->fetch_array()){
					ordensqlupdate("INSERT into lineas_factura VALUES(".$resultadoid[0].", ".$resultadoclases[0].", 1);");
					ordensqlupdate("UPDATE reservas set pagada=1 where id_reserva=".$resultadoclases[0].";");
				}
				//1.4. Calcular el valor de la factura y meterlo
				$valorfactura=preciofactura($resultadoid[0]);
				ordensqlupdate("UPDATE facturas set valor=".$valorfactura." where id_factura=".$resultadoid[0].";");
			}				
			//2. Meter en pagos el mes y el año, para que se sepa que ya se han metido las facturas de ese mes
			ordensqlupdate("INSERT INTO pagos VALUES(".$mes.",".$anyo.");");				
		}
	}

	function preciofactura($factura){
		$listaelementos=ordensql("SELECT producto from lineas_factura where factura=".$factura.";");
		$precio=0;
		while ($resultado=$listaelementos->fetch_array()){
			$listafecha=ordensql("SELECT anyo, mes, dia, cliente from reservas where id_reserva=".$resultado[0]);
			$fecha=$listafecha->fetch_array();
			if ($fecha[1]<10){
				if ($fecha[2]<10) {
					$dia=$fecha[0]."-0".$fecha[1]."-0".$fecha[2];
				}else{
					$dia=$fecha[0]."-0".$fecha[1]."-".$fecha[2];
				}				
			}else{
				if ($fecha[2]<10) {
					$dia=$fecha[0]."-".$fecha[1]."-0".$fecha[2];
				}else{
					$dia=$fecha[0]."-".$fecha[1]."-".$fecha[2];
				}
			}
			$listavalor=ordensql("SELECT valor_sin_iva from precios_tarifas p,contratos c
							    	where c.tarifa=p.tarifa and cliente=".$fecha[3]."
							    	and fecha_inicial<'".$dia."'
							    	order by fecha_inicial desc limit 1;");
			$resultadoprecio=$listavalor->fetch_array();
			$precio=$precio+$resultadoprecio[0];
		}
		return $precio;
	}
	function calculaedad($cliente){
		$lista=ordensql("SELECT fecha_nacimiento from clientes where id_cliente=".$cliente.";");
		$resultado=$lista->fetch_array();
		$diacli=date("d", strtotime($resultado[0]));
		$mescli=date("m", strtotime($resultado[0]));
		$anyocli=date("Y", strtotime($resultado[0]));
		$diahoy=date("d");
		$meshoy=date("m");
		$anyohoy=date("Y");
		$edad=$anyohoy-$anyocli;
		if ($mescli>$meshoy){
			$edad=$edad-1;
		}elseif ($mescli==$meshoy && $diacli>$diahoy) {
			$edad=$edad-1;
		}
		return $edad;
	}
?>