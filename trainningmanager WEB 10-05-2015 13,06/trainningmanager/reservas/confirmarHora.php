
<?php
	session_start();
	include("../php/funciones/function.php");
	//cabecera();
	if(!empty($_POST['cliente']))
	{
		$cliente=$_POST['cliente'];
		
	}
	
	$horass=explode("/", $_SESSION['hora']);
	$diass=explode("/", $_SESSION['dia']);
	$bandera=false;
	for($i=1;$i<sizeof($diass);$i++ ) {
		if(!empty($diass[$i]))
		{
			for($a=0;$a<4;$a++)
			{
				if(strcmp($cliente[$a],"--")!=0 && !empty($cliente[$a]))
				{
					
					$fecha=explode("*", $diass[$i]);
						$cli=$cliente[$a];
						//echo $cli;
						$fech=("".$fecha[0]."-".$fecha[1]."-".$fecha[2]);
						//$cli=1;//CAMBIAR CUANDO SALGA A EXPLOTACION O SE TENGA LOS CLIETNES 
						$orden="insert into reservas(cliente,anyo,mes,dia, hora, semana , pagada) values('".$cli."', $fecha[0] , $fecha[1] ,$fecha[2] ,$horass[$i] ,'".diaDeLaSemana($fech)."',0);";
						//echo $orden;
						ordensqlupdate($orden);
						$orden="select * from reservas where hora=$horass[$i] and anyo = $fecha[0] and mes=$fecha[1] and dia=$fecha[2]  and cliente='".$cli."' and cancelada=0";
						$cho=ordensql($orden);

						$bandera=false;

						if($cho!=false)
						{
							while ($regi = $cho->fetch_array()) {
								$bandera=true;
							}
						}
						
					
					
				}
				
			}
		}
	}
	if($bandera==true)
	{
		echo "<script>alert('orden realizada con exito');</script>";
		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";
		
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/reservas/calendario.php">';
		
	
	}
	else
	{
		echo "<script>alert('orden no realizada con exito');</script>";
		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/reservas/calendario.php">';
	
	}

	
	
?>
</body>
</html>