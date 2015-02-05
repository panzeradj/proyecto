<?php
	include("/php/funciones/function.php");
	$dia_inicio=1;
	$mes_inicio=1;
	$anyo_inicio=2015;
	$dia_fin=25;
	$mes_fin=2;
	$anyo_fin=2015;
	$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
	$hora=1;
	$cliente='alonso';
		/*echo $fecha_mas[0]."/";
		echo $fecha_mas[1]."/";
		echo $fecha_mas[2]."<br>";*/
	$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);
	$fecha_mas=explode("-",$fecha);
		$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";		
		//echo $fecha."<br>";
		
	while( $bandera==true)
	{
		
		$fecha_mas=explode("-",$fecha);
	
		if( $fecha_mas[0]==$anyo_fin)
		{
			if($fecha_mas[1]==$mes_fin  )
			{
				if( $fecha_mas[2] > $dia_fin )
				{
					$bandera=false;
				}
				else
				{
					//echo $fecha."<br>";
				$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
					ordensqlupdate($orden);
				}
			}
			else
			{
			//	echo $fecha."<br>";
				$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
				ordensqlupdate($orden);
			}
		}
		else
		{
			//echo $fecha."<br>";
		$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
			ordensqlupdate($orden);
		}
		$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);
		
	}
	

?>