<?php 
	session_start();
	include("php/funciones/function.php");
	
	if(  !empty($_POST['hora']) && !empty($_POST['dia']))
	{
		$dia=$_POST['dia'];
		$hora=$_POST['hora'];
		$_SESSION['hora']=''.$_SESSION['hora']."/".$hora;
		$_SESSION['dia']=''.$_SESSION['dia']."/".$dia;
	}

	if(!empty($_POST['semanaMenos']))
	{
		$_SESSION['semanas']=$_SESSION['semanas']-1;
	}
	if(!empty($_POST['semanaMas']))
	{
		$_SESSION['semanas']=$_SESSION['semanas']+1;
	}

	
	horarioReservaI($_SESSION['hora'], $_SESSION['dia'],$_SESSION['semanas']);

?>
