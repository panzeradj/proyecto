<?php 
	session_start();
	include("../php/funciones/function.php");
	
	if(  !empty($_POST['hora']) && !empty($_POST['dia']))
	{
		
		$dia=$_POST['dia'];
		$hora=$_POST['hora'];
		$horass=explode("/", $_SESSION['hora']);
		$diass=explode("/", $_SESSION['dia']);
		$_SESSION['hora']="";
		$_SESSION['dia']="";
		for($i=1;$i<sizeof($diass);$i++ ) {
			if((strcmp ($diass[$i] , $dia ) == 0) && $horass[$i]==$hora)
			{
				$diass[$i]="";
				$horass[$i]="";
			}
			$_SESSION['hora']=$_SESSION['hora']."/".$horass[$i];
			$_SESSION['dia']=$_SESSION['dia']."/".$diass[$i];
		}
	}
	
	horarioReservaI($_SESSION['hora'], $_SESSION['dia'],$_SESSION['semanas']);

?>
