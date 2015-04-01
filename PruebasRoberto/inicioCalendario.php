<?php
	include("/php/funciones/function.php");
	$anyo_inicio=2015;
	$mes_inicio=3;
	$dia_inicio=25;
	$hora=3;

	$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];
		echo $fecha_fin[0]."/".$fecha_fin[1]."/".$fecha_fin[2];

		$banderaComprobar=true;
		$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
		
		$orden="select * from horario where anyo=$anyo_inicio and  mes=$mes_inicio and dia=$dia_inicio and hora=$hora and estado=0";
		
		$cho=ordensql($orden);
		
		if($cho!=false)
		{
			while ($regi = $cho->fetch_array()) {
				$banderaComprobar=false;
			}
		}
		echo "<br>".$banderaComprobar."<br>";

		$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);
		
		while( $bandera==true && $banderaComprobar==true)
		{
			$fecha_mas=explode("-",$fecha);
			if($fecha_mas[0]==$anyo_fin)
			{
				
				if($fecha_mas[1]>$mes_fin)
				{
					
					if($fecha_mas[2]>$dia_fin)
					{
						$bandera=false;
					}
					
				}
				else
				{
					if($fecha_mas[1]==$mes_fin )
					{
						if($fecha_mas[2]<=$dia_fin)
						{
							$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora and estado=0";
							//echo $orden;
							$cho=ordensql($orden);
							
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {
									$banderaComprobar=false;
								}
							}
						}
						else
						{
							$bandera=false;
						}
						

						
					}
					if($fecha_mas[1]<$mes_fin )
					{

							$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora and estado=0";
							//echo $orden;
							$cho=ordensql($orden);
							
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {
									$banderaComprobar=false;
								}
							}
						
					}
					if($fecha_mas[1]>$mes_fin )
					{	
						$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora and estado=0";
						//echo $orden;
						$cho=ordensql($orden);
						
						if($cho!=false)
						{
							while ($regi = $cho->fetch_array()) {
								$banderaComprobar=false;
							}
						}
					}

					
				}	
	
			}
			else//año fin mayor
			{
				if($fecha_mas[0]==($anyo_fin -1))
				{
					$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora and estado=0";
					//echo $orden;
					$cho=ordensql($orden);
					
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$banderaComprobar=false;
						}
					}
				}
				else
				{
					$bandera=false;
				}
				
			}
			$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);	
		}	
		
		if($banderaComprobar==true)
		{
			echo "treu";
		}
		else
		{
			echo "false";
		}
		echo "banderaComprobar".$banderaComprobar;

?>