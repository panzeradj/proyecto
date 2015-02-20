<?php 
	session_start();
	include("php/funciones/function.php");
	
	if(  !empty($_POST['hora']) && !empty($_POST['dia']))
	{
		$dia=$_POST['dia'];
		$hora=$_POST['hora'];
		//echo $hora;
		//echo $dia;
		$_SESSION['hora']=''.$_SESSION['hora']."/".$hora;
		$_SESSION['dia']=''.$_SESSION['dia']."/".$dia;
	}
	else
	{
		//echo "fuera";
	}
	
	horarioReservaI($_SESSION['hora'], $_SESSION['dia']);

?>
