<?php
	include("/php/funciones/function.php");
	$dia_inicio=1;
	$mes_inicio=1;
	$anyo_inicio=2015;
	

	$dia_fin=6;
	$mes_fin=2;
	$anyo_fin=2015;
	$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);
		$fecha_mas=explode("-",$fecha);
		echo $fecha_mas[0]."/";
		echo $fecha_mas[1]."/";
		echo $fecha_mas[2];
	while($feha_mas[0]<=$anyo_fin && $fecha_mas[1]<=$mes_fin)
	{
		$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);
		echo $fecha."<br>";
		$fecha_mas=explode("-",$fecha);
		/*echo $fecha_mas[0]."/";
		echo $fecha_mas[1]."/";
		echo $fecha_mas[2]."<br>";*/
	}
	

?>