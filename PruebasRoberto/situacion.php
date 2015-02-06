<?php
	include("/php/funciones/function.php");

		/*
			Reserva la hora que quieres desde el dia de inicio hasta el dia de fin, ambos inclusive
		*/
			//
		$dia_inicio=26;
		$mes_inicio=2;
		$anyo_inicio=2015;
		$dia_fin=31;
		$mes_fin=4;
		$anyo_fin=2015;
		$hora=3;
		$cliente='roberto';
	reservas($anyo_inicio,$mes_inicio,$dia_inicio,$anyo_fin,$mes_fin,$dia_fin,$hora, $cliente);
?>