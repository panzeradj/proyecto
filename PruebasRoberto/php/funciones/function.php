<?php

	////////////////////////////////////////////////////////////////////////
	//////////////////////////////////BBDD//////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	function abrirBBDD()
	{
			$conexion = new mysqli("127.0.0.1", "root", "root", "prueba");
			$conexion->Set_charset("UTF8");

			if (mysqli_connect_errno()) 
			{
		    	die("Error grave: " . mysqli_connect_error());
			}
			return $conexion;
	}

	function cerrarBBDD($conexion)
	{
		$conexion->close($conexion);
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
	///////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////CALENDARIO//////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////
	function sumarSemana($anyo, $mes,$dia)
	{
		
		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
		$resultado="";
		if($dias_mes<($dia+7))
		{
			$resta_dias=($dia+7)-$dias_mes;
			$dia_final=$resta_dias;
			$mes_final=$mes+1;
			$anyo_final=$anyo;
			if($mes_final==13)
			{
				$anyo_final++;
				$mes_final=1;
			}

		}
		else
		{
			$dia_final=$dia+7;
			$mes_final=$mes;
			$anyo_final=$anyo;
		}

		$resultado="".$anyo_final."-".$mes_final."-".$dia_final;
		return $resultado;
	}
	

?>