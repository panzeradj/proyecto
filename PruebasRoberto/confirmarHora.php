<?php
	include("/php/funciones/function.php");
	$hora=$_POST['hora'];
	$dia=$_POST['dia'];
	$cliente=$_POST['cliente'];	
	$fecha=explode("-", $dia);
	
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
	}

?>
