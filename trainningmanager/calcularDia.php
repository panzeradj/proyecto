<?php
	session_start();
	include("php/funciones/function.php");
	$dia=$_GET['dia'];
	//echo $dia."////**/*/";
	//echo $semana."///semanaNueva///  ";
	$mensaje = "nada";
	if(strcmp($dia,"1")==0){
		$_SESSION['dia']++;
		$mensaje = "mas";

	}else{
		$_SESSION['dia']--;
		$mensaje = "menos";
	}
	if(!($mensaje=="nada")){
		//ECHO 'http://acwellness.es/trainningmanager/administrador.php?dia='.$_SESSION['dia'];
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/administrador.php?dia='.$_SESSION['dia'].'&mensaje='.$mensaje.'">';
		//header("refresh:0;url=http://acwellness.es/trainningmanager/reservas/calendario.php?semana=".$dif);
	}else{
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/administrador.php?dia='.$_SESSION['dia'].'">';
	}

?>