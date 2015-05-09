<?php
	session_start();
	include("../php/funciones/function.php");
	$semana=$_GET['semana'];
	//echo $semana."///semanaNueva///  ";
	$fecha_mas=explode("/",$semana);
	//echo "mes:".$fecha_mas[1]."////";
	$semanaNueva=date("W", mktime(0,0,0,$fecha_mas[1],$fecha_mas[0],$fecha_mas[2]));
	//echo $semanaNueva."  ";
	$semanaActual=date("W");
	$dif=$semanaNueva-$semanaActual;
	if($dif>0)
	{
		$dif++;
	}
	//echo $semanaActual;
	header("refresh:0;url=http://localhost/trainningmanager/reservas/calendario.php?semana=".$dif);

?>