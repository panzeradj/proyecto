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
		$conexion->close();

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
	function dia()//devuelve el dia actual
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		/*$dia=explode("",  $fecha_mas[2]);
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
	function mes()//devuelve el mes actual
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		return $fecha_mas[1];
	}
	function anyo()//devuelve el año actual
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
		return $fecha_mas[0];
	}
	function diaDeLaSemana($fech)//devuelve el dia actual de la semana en string
	{
		//echo $fech;
		$dias=array('','lunes','martes','miercoles','jueves','viernes','sabado','domingo');
		$dia=$dias[date('N',strtotime($fech))];
		return $dia;
	}
	function calcularLunes($semana)//calcula el lunes de la semana actual
	{
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
		$dia=$dia-($semana*-7);
		//echo $dia;
		while($dia<1)
		{	
			$mes--;
			if($mes<1)
			{
				$anyo--;
				$mes=12;
			}
			$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
			
			$dia=intval($dias_mes)+$dia;			
		}
		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
	
		while($dia>$dias_mes)
		{
			//echo "hola";
			$mes++;
			$dias_mes= cal_days_in_month(CAL_GREGORIAN, ($mes-1), $anyo);
			echo $dias_mes;
			$dia=$dia-$dias_mes;
		
		}
		while($dia<1)
		{	
			$mes--;
			if($mes<1)
			{
				$anyo--;
				$mes=12;
			}
			$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
			
			$dia=intval($dias_mes)+$dia;			
		}


		
		

		
		if($mes>12)
		{
			$mes=1;
			$anyo++;
		}
		
		$fech="".$anyo."*".$mes."*".$dia;
		$fecha=explode("*", $fech);

		return $fecha;
	}

	function sumarSemana($anyo,$mes,$dia)//suma 7 dias a la semana actual
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
	function sumar6Meses($anyo, $mes, $dia)//suma 6 meses al día actual
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
	function reservas($anyo_inicio,$mes_inicio,$dia_inicio,$hora, $cliente)//realiza las reservas múltiples de hoy a 6 meses
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
	function comprobarReservas($anyo_inicio,$mes_inicio,$dia_inicio,$hora)//comprueba la hora de hoy a los proximos 6 meses
	{
		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];
		//echo $fecha_fin[0]."/".$fecha_fin[1]."/".$fecha_fin[2];

		$banderaComprobar=true;
		$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
		
		$orden="select * from horario where anyo=$anyo_inicio and  mes=$mes_inicio and dia=$dia_inicio and hora=$hora";
		
		$cho=ordensql($orden);
		
		if($cho!=false)
		{
			while ($regi = $cho->fetch_array()) {
				$banderaComprobar=false;
			}
		}
//		echo "<br>".$banderaComprobar."<br>";

		$fecha=sumarSemana($anyo_inicio,$mes_inicio,$dia_inicio);
		
		while( $bandera==true && $banderaComprobar==true)
		{
			$fecha_mas=explode("-",$fecha);
			if($fecha_mas[0]==$anyo_fin)
			{
				
				if($fecha_mas[1]>$mes_fin)
				{
					
					if($fecha_mas[2]>$dia_fin)
					{
						$bandera=false;
					}
					
				}
				else
				{
					if($fecha_mas[1]==$mes_fin )
					{
						if($fecha_mas[2]<=$dia_fin)
						{
							$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora";
							//echo $orden;
							$cho=ordensql($orden);
							
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {
									$banderaComprobar=false;
								}
							}
						}
						else
						{
							$bandera=false;
						}
						

						
					}
					if($fecha_mas[1]<$mes_fin )
					{

							$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora";
							//echo $orden;
							$cho=ordensql($orden);
							
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {
									$banderaComprobar=false;
								}
							}
						
					}
					if($fecha_mas[1]>$mes_fin )
					{	
						$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora";
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
			else//año fin mayor
			{
				if($fecha_mas[0]==($anyo_fin -1))
				{
					$orden="select * from horario where anyo=$fecha_mas[0] and  mes=$fecha_mas[1] and dia=$fecha_mas[2] and hora=$hora";
					//echo $orden;
					$cho=ordensql($orden);
					
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$banderaComprobar=false;
						}
					}
				}
				else
				{
					$bandera=false;
				}
				
			}
			$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);	
		}
		return $banderaComprobar;
	}
	function reservaIndividual($dia, $mes,$anyo,$hora,$cliente)//reserva de una hora y un cliente
	{
		$orden="insert into horario(anyo, mes, dia, hora, cliente) values(".$anyo.",".$mes.",".$dia.",".$hora.",'".$cliente."')";		
		ordensqlupdate($orden);
	}
	function horarioDia()//muesra el horario el dia elegido
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
	function horarioSemana($semana)//muestra el horario de la semana (calendario)
	{
		$fecha=calcularLunes($semana);
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
			echo "<tr>";
			for($hora=1;$hora<9;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora."</td>";
				$d=  array();
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
					$banderaReserva=true;
					//echo sizeof($horass);
				

					
					if($banderaReserva==1)
					{
						$orden="select dia, hora, cliente from horario where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." order by 1,2,3" ;
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
							$diaenviar="".$anyo."*".$mes."*".$dia;
							echo "<td id=campo onClick=individual('".$diaenviar."',".$hora.")>$diaenviar  Libre</td>";
						}
						else
						{
							
							//mirar cuantos hay select count(cliente) from horario where anyo=2015 and mes=2 and dia=17
							$c=ordensql("select count(cliente) from horario where anyo=$anyo and mes=$mes and dia=$dia and hora=$hora");
							$cuantos=0;
							if($c!=false)
							{
								while ($reg = $c->fetch_array()) {

									$cuantos=$reg[0];
								}
							}
							//echo $cuantos;
							if($cuantos==1)
							{
								echo "<td>Ocupado1</td>";
							}
							else
							{
								if($cuantos==2)
								{
									echo "<td>Ocupado2</td>";
								}
								if($cuantos==3)
								{
									echo "<td>Ocupado3</td>";
								}
							}
							
						}
					}
					

					
					
				}	
				echo "</tr>";
			}
		echo "</table>";
	}
	function horarioReservaI($horas, $dias,$semana)//saca el horario de individuales
	{
		$horass=explode("/", $horas);
		$diass=explode("/", $dias);

		$fecha=calcularLunes($semana);
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
			echo "<tr>";
			for($hora=1;$hora<9;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora."</td>";
				$d=  array();
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
					$banderaReserva=true;
					//echo sizeof($horass);
					for($i=1;$i<sizeof($horass);$i++ ) {
						if(!empty($diass[$i]))
						{
							$d=explode("*",$diass[$i]);
							if($horass[$i]==$hora && $d[0]==$anyo && $d[1]==$mes && $d[2]==$dia  )
							{
								//echo $d[2]."/".$horass[$i]."<br>";	
								$banderaReserva=0;
							}
							//echo $d[2]."/".$horass[$i]."<br>";	
						}
								
					}	

					
					if($banderaReserva==1)
					{
						$orden="select dia, hora, cliente from horario where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." order by 1,2,3" ;
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
							$diaenviar="".$anyo."*".$mes."*".$dia;
							echo "<td id=campo onClick=enviar('".$diaenviar."',".$hora.")>$diaenviar  Libre</td>";
						}
						else
						{
							
							//mirar cuantos hay select count(cliente) from horario where anyo=2015 and mes=2 and dia=17
							$c=ordensql("select count(cliente) from horario where anyo=$anyo and mes=$mes and dia=$dia and hora=$hora");
							$cuantos=0;
							if($c!=false)
							{
								while ($reg = $c->fetch_array()) {

									$cuantos=$reg[0];
								}
							}
							//echo $cuantos;
							if($cuantos==1)
							{
								echo "<td>Ocupado1</td>";
							}
							else
							{
								if($cuantos==2)
								{
									echo "<td>Ocupado2</td>";
								}
								if($cuantos==3)
								{
									echo "<td>Ocupado3</td>";
								}
							}
							
						}
					}
					else
					{
						$diaenviar="".$anyo."*".$mes."*".$dia;
						echo "<td id=campo onClick= eliminar('".$diaenviar."',".$hora.")>Reservado </td>";
					}
					
					
				}	
				echo "</tr>";
			}
		echo "</table>";
	}
	function horarioReservaM($horas, $dias)//saca el horario multiple
	{
		//comprobarReservas($anyo_inicio,$mes_inicio,$dia_inicio,$hora)
		$horass=explode("/", $horas);
		$diass=explode("/", $dias);

			$fecha=calcularLunes(0);
		echo "hoa";
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
			echo "<tr>";
			for($hora=1;$hora<9;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora."</td>";
				$d=  array();
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
					$bandera=comprobarReservas($anyo,$mes,$dia,$hora);
					if($bandera==true)
					{
						$diaenviar="".$anyo."*".$mes."*".$dia;
						echo "<td id=campo onClick=enviar('".$diaenviar."',".$hora.")>$diaenviar  Libre</td>";	
					}
					else
					{
						$diaenviar="".$anyo."*".$mes."*".$dia;
						echo "<td id=campo onClick=enviar('".$diaenviar."',".$hora.")>Ocupado </td>";	
					}
					//comprobar hora a 6 meses
				}	
				echo "</tr>";
			}
		echo "</table>";
	}
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