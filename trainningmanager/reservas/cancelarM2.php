<?php
	include("../php/funciones/function.php");
	$id=$_GET['id'];

	$orden="select diaSemana, hora, dia_fin,mes_fin,anyo_fin from reservasmultiples where cancelada=0 and id=".$id;


	$cho=ordensql($orden);
	if($cho!=false)
	{
		while ($regi = $cho->fetch_array()) {
			$diaSemana=$regi[0];
			$hora=$regi[1];
			$dia_fin=$regi[2];
			$mes_fin=$regi[3];
			$anyo_fin=$regi[4];
		}
		//mes actual
		$orden="update reservas set cancelada=1  where  mes=".mes()."  and Semana='".$diaSemana."' and hora=".$hora." and dia>=".dia().";";
		ordensqlupdate($orden);
		//mes del medio 
		$orden="update  reservas set cancelada=1 where  mes<".$mes_fin." and mes>".mes()."  and Semana='".$diaSemana."' and hora=".$hora.";";
		ordensqlupdate($orden);
		//Mesfin
		$orden="update reservas set cancelada=1 where  mes=".$mes_fin." and Semana='".$diaSemana."' and hora=".$hora." and dia<".($dia_fin+1).";";
		//echo $orden;
		ordensqlupdate($orden);
		$orden="update reservasmultiples set cancelada=1 where  id=".$id.";";
		ordensqlupdate($orden);
	header("refresh:0;url=http://localhost/trainningmanager/reservas/calendario.php");
	}

?>