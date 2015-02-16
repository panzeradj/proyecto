<?php
	session_start();
	include("/php/funciones/function.php");
	if(!empty($_POST['cliente']))
	{
		$cliente=$_POST['cliente'];
		//ECHO "CLIENT";
	}
	
	$horass=explode("/", $_SESSION['hora']);
	$diass=explode("/", $_SESSION['dia']);
	$bandera=false;
	for($i=1;$i<sizeof($diass);$i++ ) {
		if(!empty($diass[$i]))
		{
			//echo "hola";
			for($a=0;$a<4;$a++)
			{
				if(!empty($cliente[$a]))
				{
					//echo $cliente[$a];
					
					$fecha=explode("*", $diass[$i]);
					//echo $fecha[2];
						$bandera=false;
					$orden="select * from horario where hora=$horass[$i] and anyo =$fecha[0] and mes=$fecha[1] and dia=$fecha[2] cuando < now()+50";
					//echo $orden;
					$cho=ordensql($orden);

				

					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$bandera=true;
						//	echo "nooooo";
						}
					}
					if($bandera==false)
					{
						$cli=$cliente[$a];
						$orden="insert into horario(cliente, anyo, mes , dia , hora, cuando) values('$cli', $fecha[0] , $fecha[1] ,$fecha[2] ,$horass[$i] ,now())";
						//echo $orden;
						ordensqlupdate($orden);
						$orden="select * from horario where hora=$horass[$i] and anyo = $fecha[0] and mes=$fecha[1] and dia=$fecha[2]  and cliente='$cli'";
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
				else//no cliente
				{
					//echo "no cliente";
				}

			}
		}
	}
	if($bandera==true)
	{
		echo "orden realizada con exito";
	}

	echo "<form method=post action=calendario.php name=a><input type=submit name=volver value=volver></form>";
	/*
	for($i=1;$i<4;$i++)
	{
		if($cliente[$i]!=null)
		{
			
			$orden="select * from horario where hora=$hora and anyo =$fecha[0] and mes=$fecha[1] and dia=$fecha[2] cuando < now()+50";
			$cho=ordensql($orden);

			$bandera=false;

			if($cho!=false)
			{
				while ($regi = $cho->fetch_array()) {
					$bandera=true;
				}
			}
			if($bandera==false)
			{
				$cli=$cliente[$i];
				$orden="insert into horario(cliente, anyo, mes , dia , hora, cuando) values('$cli', $fecha[0] , $fecha[1] ,$fecha[2] ,$hora ,now())";
				echo $orden;
				ordensqlupdate($orden);
				$orden="select * from horario where hora=$hora and anyo = $fecha[0] and mes=$fecha[1] and dia=$fecha[2]  and cliente='$cliente'";
				$cho=ordensql($orden);

				$bandera=false;

				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$bandera=true;
					}
				}
				if($bandera==true)
				{
					echo "orden realizada con exito";
				}
			}
			
		}
	}*/

?>
