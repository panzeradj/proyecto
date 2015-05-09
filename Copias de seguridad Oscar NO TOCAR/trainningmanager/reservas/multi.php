<?php 
/*Eliminar WARNING*/ error_reporting(0);
	 session_start();
	include("../php/funciones/function.php");
	
	if(  !empty($_POST['hora']) && !empty($_POST['dia']))
	{
		$dia=$_POST['dia'];
		$hora=$_POST['hora'];
		$_SESSION['hora']=''.$_SESSION['hora']."*".$hora;
		$_SESSION['dia']=''.$_SESSION['dia']."*".$dia;
	}
	
	

	
	horarioReservaM($_SESSION['hora'], $_SESSION['dia']);

?>
