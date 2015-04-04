<?php
	
	////////////////////////////////////////////////////////////////////////
	//////////////////////////////////BBDD//////////////////////////////////
	////////////////////////////////////////////////////////////////////////

	function abrirBBDD()
	{
			$conexion = new mysqli("127.0.0.1", "root", "root", "proyecto");
			$conexion->Set_charset("UTF8");

			if (mysqli_connect_errno()) 
			{
		    	die("Error grave: " . mysqli_connect_error());
			}
			return $conexion;
	}

	function cerrarBBDD($conexion)
	{
		$conexion->close($conexion);
	}
	function ordensql($ordensql)
	{
		//echo $ordensql;
		$conexion=abrirBBDD();
		
		if($chorizo=$conexion->query($ordensql))
		{
			cerrarBBDD($conexion);

			return $chorizo;
		}
		else
		{
			return false;
		}			
	}
	function ordensqlupdate($ordensql)
	{
		$conexion=abrirBBDD();
		$conexion->query($ordensql);
		cerrarBBDD($conexion);
	}
	///////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////CALENDARIO//////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////
	function dia()
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		$dia=explode("",  $fecha_mas[2]);
		/*if($dia[0]==0)
		{
			$resultado=$dia[1];
		}
		else
		{
			$resultado=$fecha_mas[2];
		}*/
		return intval($fecha_mas[2]);
	}
	function mes()
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		return $fecha_mas[1];
	}
	function anyo()
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		return $fecha_mas[0];
	}
	function diaDeLaSemana($fech)
	{
		//echo $fech;
		$dias=array('','lunes','martes','miercoles','jueves','viernes','sabado','domingo');
		$dia=$dias[date('N',strtotime($fech))];
		return $dia;
	}

	function sumarSemana($anyo,$mes,$dia)
	{
		/*
			Calcula la fecha dentro de una semana(fecha introducida por parámetros)
		*/
	
		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
		$resultado="";
		if($dias_mes<($dia+7))
		{
			$resta_dias=($dia+7)-$dias_mes;
			//echo $resta_dias."-----";
			$dia_final=$resta_dias;
			$mes_final=$mes+1;
			$anyo_final=$anyo;
			if($mes_final==13)
			{
				$anyo_final++;
				$mes_final=1;
			}
		}
		else
		{
			$dia_final=$dia+7;
			$mes_final=$mes;
			$anyo_final=$anyo;
		}
		$resultado="".$anyo_final."-".$mes_final."-".$dia_final;
		//echo $resultado."     --------";
		return $resultado;
	}
	function sumar6Meses($anyo, $mes, $dia)
	{
		$mes=$mes+6;
		if($mes>12)//comprobamos el año
		{
			
			$mes=$mes-12;;
			$anyo++;

			$dias_mes_final= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
			if($dia>$dias_mes_final)
			{
				$dia=1;
				$mes++;
			}

		}
		else//mismo año
		{
			$dias_mes_final= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
			if($dia>$dias_mes_final)//sumamos 
			{
				$dia=1;
				$mes++;
			}
		}
	
		$fecha = array($anyo, $mes, $dia);
		return $fecha;
	}
	function reservas($anyo_inicio,$mes_inicio,$dia_inicio,$hora, $cliente)
	{
		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];

		
		$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
		
		$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);		
		while( $bandera==true)
		{
			$fecha_mas=explode("-",$fecha);
		
			if( $fecha_mas[0]==$anyo_fin)//año igual
			{
				if($fecha_mas[1]==$mes_fin  )//mes igual 
				{
					if( $fecha_mas[2] >= $dia_fin )
					{
					
						$bandera=false;

					}
					else
					{
						echo  $fecha_mas[0]."/".$fecha_mas[1]."/".$fecha_mas[2]."<br>";
						$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
						ordensqlupdate($orden);
					}
				}
				else//distinto mes de fin por tanto tiene que seguir 
				{
					if($fecha_mas[1]<$mes_fin  )//mes igual 
					{
						
							echo  $fecha_mas[0]."/".$fecha_mas[1]."/".$fecha_mas[2]."<br>";
							$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
							ordensqlupdate($orden);
					}
					else
					{
						$bandera=false;
					}
				}
			}
			else//año distinto por tanto debe entrar sin problemas
			{
				echo  $fecha_mas[0]."/".$fecha_mas[1]."/".$fecha_mas[2]."<br>";
				$orden="insert into horario(anyo, mes, dia, hora, cliente) values($fecha_mas[0],$fecha_mas[1],$fecha_mas[2],$hora,'".$cliente."')";
				ordensqlupdate($orden);
			}
			$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);		
			
		}
	}
	function comprobarReservas($anyo_inicio,$mes_inicio,$dia_inicio,$hora)
	{
		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];

		$banderaComprobar=true;
		$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
		
		$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);
		
		
		
		while( $bandera==true)
		{
			$bandera=false;
			$fecha_mas=explode("-",$fecha);
			$bandera=true;
			if( $fecha_mas[0]==$anyo_fin)//año igual
			{
				if($fecha_mas[1]==$mes_fin  )//mes igual 
				{
					if( $fecha_mas[2] >= $dia_fin )
					{
						$bandera=false;
					}
					else
					{
						$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2]";
						//echo $orden;
						$cho=ordensql($orden);
						
						if($cho!=false)
						{
							while ($regi = $cho->fetch_array()) {
								$banderaComprobar=false;
							}
						}
					}
				}
				else//distinto mes de fin por tanto tiene que seguir 
				{
					if($fecha_mas[1]<$mes_fin  )//mes igual 
					{
						$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2]";
						//echo $orden;
						$cho=ordensql($orden);
						
						if($cho!=false)
						{
							while ($regi = $cho->fetch_array()) {
								$banderaComprobar=false;
							}
						}	
					}
				}
			}
			else//año distinto por tanto debe entrar sin problemas
			{
				$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2]";
				
				$cho=ordensql($orden);
				//echo $orden;
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$banderaComprobar=false;
					}
				}			
				
			}
			$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);			
		}	
		return $banderaComprobar;
	}
	function reservaIndividual($dia, $mes,$anyo,$hora,$cliente)
	{
		$orden="insert into horario(anyo, mes, dia, hora, cliente) values(".$anyo.",".$mes.",".$dia.",".$hora.",'".$cliente."')";		
		ordensqlupdate($orden);
	}
	function horarioDia()
	{
		echo "<table border=1><tr><td></td><td>".diaDeLaSemana(anyo()."-".mes()."-".dia())."</td>";
		echo "</tr><tr>";
		for($hora=1;$hora<9;$hora++)
		{
			$orden="select dia, hora, cliente from horario where dia =".dia()." and mes=".mes()."  and anyo =".anyo()." and hora=".$hora." order by 1,2,3" ;
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
				echo "<td>".$hora."</td><td>no</td>";
			}
			else
			{
				echo "<td>".$hora."</td><td>si</td>";
			}
			echo "</tr>";
		}	
		echo "</table>";
	}
	function horarioSemana()
	{
		echo "<table border=2 id=calendario>";
			echo "<tr>";
				echo "<td></td>";
				for($dia_mas=dia();$dia_mas<=(dia()+6);$dia_mas++)
				{
						echo "<td id=diaSemana>".diaDeLaSemana("".anyo()."-".mes()."-".$dia_mas)."</td>";
				}	
			echo "</tr>";
			echo "<tr>";
			for($hora=1;$hora<9;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora."</td>";
				for($dia_mas=dia();$dia_mas<=(dia()+6);$dia_mas++)
				{
					$orden="select dia, hora, cliente from horario where dia =".$dia_mas." and mes=".mes()."  and anyo =".anyo()." and hora=".$hora." order by 1,2,3" ;
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
						$diaenviar="".anyo()."-".mes()."-".$dia_mas;

						echo "<td id=campo onClick=enviar('".$diaenviar."',".$hora.")>$diaenviar Libre</td>";
					}
					else
					{
						echo "<td>Ocupado</td>";
					}
					
				}	
				echo "</tr>";
			}
		echo "</table>";
	}
	/*function horarioReservaI($horas, $dias)
	{
		$horass=explode("/", $horas);
		$diass=explode("/", $dias);
		echo "<table border=2 id=calendario>";
			echo "<tr>";
				echo "<td></td>";
				for($dia_mas=dia();$dia_mas<=(dia()+6);$dia_mas++)
				{
					echo "<td id=diaSemana>".diaDeLaSemana("".anyo()."-".mes()."-".$dia_mas)."</td>";
				}	
			echo "</tr>";
			echo "<tr>";
			for($hora=1;$hora<9;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora."</td>";
				for($dia_mas=dia();$dia_mas<=(dia()+6);$dia_mas++)
				{
					$banderaReserva=true;
					for($i=1;$i<sizeof($horass);$i++ ) {
						if($horass[$i]!=null)
						{
							$d=explode("-",$diass[$i]);
							if($horass[$i]==$hora && $d[2]==$dia_mas)
							{
								//echo $d[2]."/".$horass[$i]."<br>";	
								$banderaReserva=0;
							}
							//echo $d[2]."/".$horass[$i]."<br>";	
						}
								
					}	

					
					if($banderaReserva==1)
					{
						$orden="select dia, hora, cliente from horario where dia =".$dia_mas." and mes=".mes()."  and anyo =".anyo()." and hora=".$hora." order by 1,2,3" ;
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
							$diaenviar="".anyo()."-".mes()."-".$dia_mas;
							echo "<td id=campo onClick=individual('".$diaenviar."',".$hora.")>$diaenviar  Libre</td>";
						}
						else
						{
							echo "<td>Ocupado</td>";
						}
					}
					else
					{
						echo "<td id=campo onClick=>aaaa $banderaReserva Libre</td>";
					}
					
					
				}	
				echo "</tr>";
			}
		echo "</table>";
	}*/
	///////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////PARTES////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////
	function generaNav(){
		echo "<header>
		<h1 id='txt'>Training manager</h1>
		<nav>
			<ul id=nav>
			<li id=two><a href=# class=one><span><img src=imagenes/client.png />Clientes</span></a></li>
			<li id=two><a href=# class=one><span><img src=imagenes/save.png />Reservas</span></a>
			<ul id=sub2>
	   			<li id=subone><a href=individuales.php id=subtwo>Individuales</a></li>
	  			<li id=subone><a href=multiples.php id=subtwo >multiples</a></li>
	  		</ul>
	  		</li>
			<li id=two><a href=calendario.php class=one><span><img src=imagenes/calendar.png />Calendario</span></a></li>
			<li id=two><a href=# class=one><span><img src=imagenes/tarifas.png />Tarifas y bonos</span></a></li>
			<li id=two><a href=index.php class=one><span>Cerrar sesion</span></a></li>
			</ul>
		</nav>
		</header>";
	}
?>