
<?php
	session_start();
	include("../php/funciones/function.php");
	//cabecera();
	if(!empty($_POST['clientes']))
	{
		$cliente=$_POST['clientes'];
	}

	$horass=explode("/", $_SESSION['hora']);
	$diass=explode("/", $_SESSION['dia']);
	$bandera=false;
	for($i=1;$i<sizeof($diass);$i++ ) {
		if(!empty($diass[$i]))
		{
			for($a=0;$a<4;$a++)
			{
			//	echo $a;
				//echo $cliente[$a];
				if(strcmp($cliente[$a],"--")!=0 && !empty($cliente[$a]))
				{
					//miro la bbdd y saco el cliente si existe
					$id=0;
					$clieNomb=explode(",",$cliente[$a]);
					$sql="select id_cliente from clientes where apellido like '".$clieNomb[1]."' and nombre like '".$clieNomb[0]."'";
				//	echo $sql;
					$cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$id=$regi[0];
						}
					}
					//si existe tengo el id

				//echo $cliente[$a]."/".$id;
					$fecha=explode("*", $diass[$i]);
						$cli=$id;
						//echo $cli;
						$fech=("".$fecha[0]."-".$fecha[1]."-".$fecha[2]);
						//$cli=1;//CAMBIAR CUANDO SALGA A EXPLOTACION O SE TENGA LOS CLIETNES
						$orden="insert into reservas(cliente,anyo,mes,dia, hora, semana , pagada) values('".$cli."', $fecha[0] , $fecha[1] ,$fecha[2] ,$horass[$i] ,'".diaDeLaSemana($fech)."',0);";
						//echo $orden;
						ordensqlupdate($orden);
						$orden="select * from reservas where hora=$horass[$i] and anyo = $fecha[0] and mes=$fecha[1] and dia=$fecha[2]  and cliente='".$cli."' and cancelada=0";
						$cho=ordensql($orden);



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
		//echo "<script>alert('orden realizada con exito');</script>";
		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";

		echo '<meta http-equiv="refresh" content="0; url=http://localhost/trainningmanager/reservas/calendario.php?mensaje=bien">';


	}
	else
	{
	//	echo "<script>alert('orden no realizada con exito');</script>";
		echo "<img src=imagenes/2F7864BDA.gif id=cargando/>";
		echo '<meta http-equiv="refresh" content="0; url=http://localhost/trainningmanager/reservas/calendario.php?mensaje=mal">';

	}



?>
</body>
</html>
