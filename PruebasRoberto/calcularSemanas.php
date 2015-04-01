<?php
	session_start();
	include("php/funciones/function.php");
	$semana=$_GET['semana'];
function diferencia($date1,$date2)
{
	if(!is_integer($date1)) 
	{
		$date1=strtotime($date1);
	}
	if(!is_integer($date2)) 
	{
		$date2=strtotime($date2);
	}
	return floor(abs($date1-$date2) /60/60/24);
}
	$semanaCorrecta=explode("/", $semana);
	$semana=$semanaCorrecta[2]."/".$semanaCorrecta[1]."/".$semanaCorrecta[0];
	$dia="".anyo()."/".mes()."/".dia();
	$dif=diferencia($semana,$dia);
	$dif=ceil($dif/7);

	if($semana<$dia)
	{
		$dif=($dif*-1)+1;
	}
	if(strcmp(diaDeLaSemana($semana),'lunes')==0 )
	{
		if($dif>0)
		{
			$dif++;
		}
	}
	if(strcmp(diaDeLaSemana($semana),'domingo')==0 )
	{
		if($dif<0)
		{
			echo "<script>alert('ASDASD')</script>";
			$dif--;
		}
	}
	header("refresh:0;url=calendario.php?semana=".$dif);

?>