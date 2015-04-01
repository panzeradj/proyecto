<?php
	session_start();
	include("php/funciones/function.php");
	//echo "cancelado I";
	$hora=$_GET['hora'];
	$dia=$_GET['dia'];
	$cancelacion=$_GET['can'];
	echo $dia;
	$fecha=explode("*", $dia);
	if($cancelacion==1)
	{
		/**
		*Con can=1 cancelada sin pago
		*/
		$ordensql="update horario set estado=1 where hora=".$hora." and dia=".$fecha[2]." and mes=".$fecha[1]." and anyo=".$fecha[0]." and estado=0";
		ordensqlupdate($ordensql);
	}
	else
	{
		if($cancelacion==2)
		{
			/**
			*Con can=2 cancelada con pago
			*/
		
			$ordensql="update horario set estado=2 where hora=".$hora." and dia=".$fecha[2]." and mes=".$fecha[1]." and anyo=".$fecha[0]." and estado=0";
			ordensqlupdate($ordensql);
		}
	}
	
	header("refresh:0;url=calendario.php");
?>