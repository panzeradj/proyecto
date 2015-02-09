<?php
	include("/php/funciones/function.php");
	
	//horarioSemana();
	//Sumar6Meses
	$dia= 29;
	$mes=1;
	$anyo=2015;
	if(comprobarReservas($anyo,$mes,$dia,4))
	{
		ECHO "HORA LIBRE";
	}
	else
	{
		ECHO "HORA OCUPADA";
	}
?>