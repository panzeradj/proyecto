<script src="js/javaScript.js"></script>

<?php 
//muestra el calendario en la pestaña calendario
	session_start();
	include("php/funciones/function.php");
	
	if(!empty($_POST['semanaMenos']))
	{
		$_SESSION['semanas']=$_SESSION['semanas']-1;
	}
	if(!empty($_POST['semanaMas']))
	{
		$_SESSION['semanas']=$_SESSION['semanas']+1;
	}

	//echo $_SESSION['semanas'];
	
	horarioSemana($_SESSION['semanas']);

?>
