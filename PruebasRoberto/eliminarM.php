<?php 
	session_start();
	include("php/funciones/function.php");
	
	if(  !empty($_POST['hora']) && !empty($_POST['dia']))
	{

		
		$dia=$_POST['dia'];
		echo $dia;
		$hora=$_POST['hora'];
		$horass=explode("*", $_SESSION['hora']);
		$diass=explode("*", $_SESSION['dia']);
		$_SESSION['hora']="";
		$_SESSION['dia']="";
		for($i=1;$i<sizeof($diass);$i++ ) {
			//echo "hola";
			//echo $diass[$i]."/".$dia."**";
			if((strcmp ($diass[$i] , $dia ) == 0) && $horass[$i]==$hora)
			{
				echo "hola";
				//echo "holaAAAAAAAA<BR>";
				$diass[$i]="";
				$horass[$i]="";
			}
			//echo $diass[$i]."/".$dia."**";
			$_SESSION['hora']=$_SESSION['hora']."*".$horass[$i];
			$_SESSION['dia']=$_SESSION['dia']."*".$diass[$i];
		}
	}
	else
	{
		echo "fuera";
	}	
	horarioReservaM($_SESSION['hora'], $_SESSION['dia']);

?>
