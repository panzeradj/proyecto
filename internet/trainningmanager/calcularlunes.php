<?php

	include("php/funciones/function.php");
	$anyo_inicio=anyo();
	$mes_inicio=mes();
	$dia_inicio=dia();

		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];
		$arrayDias= array("lunes", "martes","miercoles", "jueves","viernes","sabado","domingo");
		$fecha=calcularLunes(0);
		echo "<table border=2 id=calendario>";
			echo "<tr>";
				echo "<td></td>";
				for($dia_mas=$fecha[2];$dia_mas<=($fecha[2]+6);$dia_mas++)
				{
					$dias_mes= cal_days_in_month(CAL_GREGORIAN, $fecha[1], $fecha[0]);
					$mes=$fecha[1];
					$anyo=$fecha[0];
					if($dias_mes<$dia_mas)
					{
						$mes++;
						$dia=$dia_mas-$dias_mes;
					}
					else
					{
						$dia=$dia_mas;
					}
					if($mes>12)
					{
						$anyo++;
						$mes=1;
					}
					$diaenviar="".$dia."/".$mes."/".$anyo;

					echo "<td id=diaSemana>".diaDeLaSemana("".$anyo."-".$mes."-".$dia)."<br>$diaenviar</td>";
				}	
			echo "</tr>";
			
		for($hora=1;$hora<17;$hora++) {

			echo "<tr><td>$hora</td>";
			foreach ($arrayDias as $key => $value)
			{
				$bandera=true;		
				$orden="select distinct  hora from horario where mes>=".($mes_inicio+1)." and mes<=".($mes_fin-1)."  and diaSemana='".$value."' and hora=".$hora."and estado=0";
				$cho=ordensql($orden);
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$bandera=false;
					}
				}
				if($bandera==true)
				{
					//Dia limpio
					
					//Ahora mirar las otras dos condiciones 
					//sí el mes actual tiene alguna (dia de hoy hasta final de mes)
					$orden="select distinct  hora from horario where mes=".($mes_inicio)." and dia>=".($dia_inicio)."  and diaSemana='".$value."' and hora=".$hora."and estado=0";
					$chos=ordensql($orden);
					if($chos!=false)
					{
						while ($regi = $chos->fetch_array()) {
							$bandera=false;
						}
					}
					if($bandera==true)
					{
						echo "<td> Dia mismo mes</td>";
					}
					else
					{
						$orden="select distinct  hora from horario where mes=".($mes_fin)." and dia<=".($dia_fin)."  and diaSemana='".$value."' and hora=".$hora."and estado=0";
						echo $orden;
						
						$chorizo=ordensql($orden);
						if($chorizo!=false)
						{
							while ($regi = $chorizo->fetch_array()) {
								$bandera=false;
							}
						}
						if($bandera==true)
						{
							echo"<td>Dia y hora limpio</td>";	
						}
						else
						{
							echo "<td> ocupado</td>";
							
						}
										
					}


				}
				else
				{
					echo "<td> ocupado</td>";
				}	

			}

			echo "</tr>";
			
		}
?>