<?php
	include("/php/funciones/function.php");
	$id=$_GET['id'];
	echo $id;
	$orden="select diaSemana, hora, dia_fin,mes_fin,anyo_fin from reservasmultiples where estado=0 and id=".$id;


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
		$orden="update horario set estado=1  where  mes=".mes()."  and diaSemana='".$diaSemana."' and hora=".$hora." and dia>=".dia().";";
		ordensqlupdate($orden);
		//mes del medio 
		$orden="update  horario set estado=1 where  mes<".$mes_fin." and mes>".mes()."  and diaSemana='".$diaSemana."' and hora=".$hora.";";
		ordensqlupdate($orden);
		//Mesfin
		$orden="update horario set estado=1 where  mes=".$mes_fin." and diaSemana='".$diaSemana."' and hora=".$hora." and dia<".($dia_fin+1).";";
		//echo $orden;
		ordensqlupdate($orden);
		$orden="update reservasmultiples set estado=1 where  id=".$id.";";
		ordensqlupdate($orden);
			
	}

?>