<?php
	include("php/funciones/function.php");
	$dia=0;
	if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"lunes")==0)
	{
		$dia=dia();
	}
	else
	{
		if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"martes")==0)
		{
			$dia=dia()-1;
		}	
		else
		{
			if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"miercoles")==0)
			{
				$dia=dia()-2;
			}
			else
			{
				if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"jueves")==0)
				{
					$dia=dia()-3;
				}
				else
				{
					if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"viernes")==0)
					{
						$dia=dia()-4;
					}
					else
					{
						if( strcmp(diaDeLaSemana("".anyo()."-".mes()."-".dia()),"sabado")==0)
						{
							$dia=dia()-5;
						}
						else//Domingo
						{
							$dia=dia()-6;

						}

					}
				}

			}

		}
	}
	$mes=mes();
	$anyo=anyo();
	//echo $dia;
	if($dia<1)
	{
		
		$mes--;
		
		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
		//echo $dias_mes;
		$dia=intval($dias_mes)+$dia;
	}
	else
	{
		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
		if($dia>$dias_mes)
		{
			//echo $dia;
			$mes++;
			$dia=$dias_mes-$dia;
		}

	}
	echo "<br>".$dia;
?>