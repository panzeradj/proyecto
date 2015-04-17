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
		
		if (mysql_num_rows($lista)==0){
			//EMISIÓN DE PAGOS
			//1. Calcular cada factura por cada cliente que haya tenido reservas sin pagar de ese mes o anteriores (teniendo 
			//	en cuenta que para las fechas simplemente se hará con mes<$mes+1 y anyo=$anyo")
				//1.1. Mirar clientes con reservas sin pagar
				//1.2. En los clientes que las tengan, empezar una nueva factura (que empieza como emitida, 0 si no me equivoco)
				//1.3. Añadir cada clase como línea de factura y marcarla como pagada en reservas
				//1.4. Calcular el valor de la factura y meterlo
			//2. Meter en pagos el mes y el año, para que se sepa que ya se han metido las facturas de ese mes
			echo "no devuelve nada, hay que emitir";
		}
	}
?>