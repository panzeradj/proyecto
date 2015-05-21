<?php
    //include ('../../Mobile-Detect/Mobile_Detect.php');
	////////////////////////////////////////////////////////////////////////
	//////////////////////////////////BBDD//////////////////////////////////
	////////////////////////////////////////////////////////////////////////

	function abrirBBDD()
	{
		 $host_name  = "localhost";
    $database   = "db574957313";
    $user_name  = "dbo574957313";
			$conexion = new mysqli($host_name, $user_name, 'pP1@@8*=hnd"siuy:8DX', $database);
		//$conexion = new mysqli("127.0.0.7", "root", "root", "trainningmanager");

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
	/**
											LOGIN
	*/
	function login($pass,$us){

		if(strcmp($pass,"")!=0){

			require_once("inputfilter/class.inputfilter.php");
			$filter = new InputFilter();

			$password = limpiarCadena($pass);
			$user = limpiarCadena($us);

			$user = $filter->process($user);

			$pass = hash('md5',$password);
			$sql="SELECT pass from login WHERE entrenador='".$user."' AND pass='".$pass."'";
			$lista = ordensql($sql);
			 if (!($lista->fetch_array())){
				return '0';
			}else{
				$_SESSION["login"]="yes";
				$_SESSION["us"] = $user;
				return '1';
			}
		}else{
			return '0';
		}
	}
	function comprueba(){
		if((strcmp($_SESSION["login"],"yes")!=0)){
			header("location:http://localhost/trainningmanager");
		}
	}
	function limpiarCadena($valor){
		$valor = str_ireplace("SELECT","",$valor);
		$valor = str_ireplace("COPY","",$valor);
		$valor = str_ireplace("DELETE","",$valor);
		$valor = str_ireplace("DROP","",$valor);
		$valor = str_ireplace("DUMP","",$valor);
		$valor = str_ireplace(" OR ","",$valor);
		$valor = str_ireplace("%","",$valor);
		$valor = str_ireplace("LIKE","",$valor);
		$valor = str_ireplace("--","",$valor);
		$valor = str_ireplace("^","",$valor);
		$valor = str_ireplace("[","",$valor);
		$valor = str_ireplace("]","",$valor);
		$valor = str_ireplace("\\","",$valor);
		$valor = str_ireplace("!","",$valor);
		$valor = str_ireplace("¡","",$valor);
		$valor = str_ireplace("?","",$valor);
		$valor = str_ireplace("=","",$valor);
		$valor = str_ireplace("&","",$valor);
		$valor = str_ireplace("<","",$valor);
		$valor = str_ireplace(">","",$valor);
		return $valor;
	}
	///////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////CALENDARIO//////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////
	function dia()//devuelve el dia actual
	{
		$fecha=date("Y-m-d");
		$fecha_mas=explode("-",$fecha);
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
			$mes++;
			$dias_mes= cal_days_in_month(CAL_GREGORIAN, ($mes-1), $anyo);
			$dia=$dia-$dias_mes;
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
	function calcularHoras($id_cliente){
		$contador=0;
		$sql="select count(id_reserva) from reservas where anyo<".anyo()." and cliente=".$id_cliente;
		//echo $sql;
		$c=ordensql($sql);
		if($c!=false)
		{
			while ($reg = $c->fetch_array()) {

				$contador=$contador+$reg[0];
				$edad=$reg[1];
			}
		}
		$sql="select count(id_reserva) from reservas where anyo=".anyo()." and mes <".mes()." and cliente=".$id_cliente;
		//echo $sql;
		$c=ordensql($sql);
		if($c!=false)
		{
			while ($reg = $c->fetch_array()) {

				$contador=$contador+$reg[0];
				$edad=$reg[1];
			}
		}
		$sql="select count(id_reserva) from reservas where anyo=".anyo()." and mes <=".mes()." and dia<=".dia()." and cliente=".$id_cliente;

		$c=ordensql($sql);
		if($c!=false)
		{
			while ($reg = $c->fetch_array()) {

				$contador=$contador+$reg[0];
				$edad=$reg[1];
			}
		}
		return $contador;
	}
	function sumarSemana($anyo,$mes,$dia)//suma 7 dias a la semana actual
	{
		/**
		*Calcula la fecha dentro de una semana(fecha introducida por parámetros)
		*/

		$dias_mes= cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
		$resultado="";
		if($dias_mes<($dia+7))
		{
			$resta_dias=($dia+7)-$dias_mes;

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
		echo $clientes;

		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);
		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];


		$bandera=true;/*Para quitar el bucle cuando es el mismo mes y el dia final es menor que el dia de la siguiente semana*/
		$fecha_mas[0]= $anyo_inicio;
		$fecha_mas[1]= $mes_inicio;
		$fecha_mas[2]=$dia_inicio;
		while( $bandera==true)
		{

			if($fecha_mas[0]==anyo() && $fecha_mas[1]==mes() && $fecha_mas[2]<dia() )
			{

			}
			else
			{	$StringDia=diaDeLaSemana("".$fecha_mas[0]."-".$fecha_mas[1]."-".$fecha_mas[2]);
				$orden="insert into reservas(cliente,anyo,mes,dia, hora, semana , pagada) values(".$cliente.", $fecha_mas[0] , $fecha_mas[1] ,$fecha_mas[2]  ,".$hora.",'".$StringDia."',0);";

				ordensqlupdate($orden);
			}
			$fecha=sumarSemana($fecha_mas[0],$fecha_mas[1],$fecha_mas[2]);
			$fecha_mas=explode("-",$fecha);
			if($anyo_fin==$fecha_mas[0] && $mes_fin==$fecha_mas[1] && $dia_fin<$fecha_mas[2])
			{
				$bandera=false;
			}
		}
		$StringDia=diaDeLaSemana("".$fecha_mas[0]."-".$fecha_mas[1]."-".$fecha_mas[2]);
		$orden="insert into reservasmultiples(anyo_inicio,mes_inicio,dia_inicio,anyo_fin,mes_fin,dia_fin,cliente,diaSemana,hora) values(".anyo().",".mes().",".dia().",".$anyo_fin.",".$mes_fin.",'".$fecha_fin[2]."','".$cliente."','".$StringDia."',".$hora.")";
		 //echo $orden;
		if($cliente!=0)
		ordensqlupdate($orden);
	}


	function horarioDia($dia_mas)//muesra el horario el dia elegido
	{
		$fecha1=date("Y-m-d");
		$fecha=strtotime($dia_mas.' day', strtotime($fecha1));
		$fecha=date("Y-m-d", $fecha);
		$fecha_mas=explode("-",$fecha);
		$dia=$fecha_mas[2];
		$mes=$fecha_mas[1];
		$anyo=$fecha_mas[0];
		echo "<table border=2 id=calendario>";
			echo "<tr><td  id=fechaActual colspan=2>".$dia."/".$mes."/".$anyo."</td></tr><tr>";

			for($hora=6;$hora<=23;$hora++ )
			{
				echo "<tr>";
				echo "<td id=horaDia>".$hora.":00-".($hora+1).":00</td>";
				if($fecha1>$fecha){
				$orden="select clientes.nombre from reservas , clientes  where reservas.cliente=clientes.id_cliente and  dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1" ;

							$cho=ordensql($orden);
							$bandera=false;
							$cliente="";
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {

									$cliente=$cliente.$regi[0]."<br>";
								}
							}
							if(strcmp($cliente,"")==0){
								$cliente=" ";
							}
						echo "<td class='pasado'>$cliente  </td>";
				}else{
					$orden="select dia, hora, cliente from reservas where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1,2,3" ;
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
								echo "<td  onClick=enviar('".$diaenviar."',".$hora.") id=campoDia>   </td>";
							}
							else
							{

								//mirar cuantos hay select count(cliente) from horario where anyo=2015 and mes=2 and dia=17
								$c=ordensql("select count(cliente) from reservas where anyo=$anyo and mes=$mes and dia=$dia and hora=$hora and cancelada=0");
								$cuantos=0;
								if($c!=false)
								{
									while ($reg = $c->fetch_array()) {

										$cuantos=$reg[0];
									}
								}

								$diaenviar="".$anyo."*".$mes."*".$dia;

								if($cuantos==1)
								{
									//orden sql para sacar los clientes
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";
									$c=ordensql($sql);

									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {

											$nombre=$reg[0];
											$edad=$reg[1];
										}
									}
									$edad=calcularEdad($edad);


									echo "<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoUno'> <div>$nombre: $edad</div>  </td>";
								}
								else
								{
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";

									$c=ordensql($sql);
									$conjunto_Datos=array();
									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {
											$arr= array();
											$arr['nombre']=$reg[0];
											$arr['edad']=calcularEdad($reg[1]);
											$conjunto_Datos[]=$arr;
										}
									}
									if($cuantos==2)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoDos'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].$conjunto_Datos[1]['edad']."</div> </td>";
										echo $cadena;
									}
									if($cuantos==3)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoTres'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].":".$conjunto_Datos[1]['edad']."</div><div> ".$conjunto_Datos[2]['nombre'].":".$conjunto_Datos[2]['edad']." </td>";
										echo $cadena;
									}
								}
								}
				echo "</tr>";
				}
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
			for($hora=6;$hora<=23;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora.":00-".($hora+1).":00</td>";
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
					if((($anyo<anyo())||($anyo==anyo() && $mes<mes())||($anyo==anyo() && $mes==mes() && $dia<dia())))
					{
						//echo"<script>alert('aasdasd');</script>";
						$orden="select clientes.nombre from reservas , clientes  where reservas.cliente=clientes.id_cliente and  dia =".$dia_mas." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1" ;

							$cho=ordensql($orden);
							$bandera=false;
							$cliente="";
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {

									$cliente=$cliente.$regi[0]."<br>";
								}
							}
							if(strcmp($cliente,"")==0){
								$cliente="";
							}
						echo "<td class='pasado'>$cliente  </td>";
					}
					else
					{
						if($banderaReserva==1)
						{
							$orden="select dia, hora, cliente from reservas where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1,2,3" ;
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
								echo "<td  onClick=enviar('".$diaenviar."',".$hora.") id=campoDia>   </td>";
							}
							else
							{

								//mirar cuantos hay select count(cliente) from horario where anyo=2015 and mes=2 and dia=17
								$c=ordensql("select count(cliente) from reservas where anyo=$anyo and mes=$mes and dia=$dia and hora=$hora and cancelada=0");
								$cuantos=0;
								if($c!=false)
								{
									while ($reg = $c->fetch_array()) {

										$cuantos=$reg[0];
									}
								}

								$diaenviar="".$anyo."*".$mes."*".$dia;

								if($cuantos==1)
								{
									//orden sql para sacar los clientes
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";
									$c=ordensql($sql);

									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {

											$nombre=$reg[0];
											$edad=$reg[1];
										}
									}
									$edad=calcularEdad($edad);


									echo "<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoUno'> <div>$nombre: $edad</div>  </td>";
								}
								else
								{
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";

									$c=ordensql($sql);
									$conjunto_Datos=array();
									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {
											$arr= array();
											$arr['nombre']=$reg[0];
											$arr['edad']=calcularEdad($reg[1]);
											$conjunto_Datos[]=$arr;
										}
									}
									if($cuantos==2)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoDos'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].$conjunto_Datos[1]['edad']."</div> </td>";
										echo $cadena;
									}
									if($cuantos==3)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoTres'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].":".$conjunto_Datos[1]['edad']."</div><div> ".$conjunto_Datos[2]['nombre'].":".$conjunto_Datos[2]['edad']." </td>";
										echo $cadena;
									}
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
				echo "<td ></td>";
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
			for($hora=6;$hora<=23;$hora++ )
			{
				echo "<tr>";
				echo "<td id=hora>".$hora.":00-".($hora+1).":00</td>";
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

					// ((($anyo<anyo())||($anyo==anyo() && $mes<mes())||

					if((($anyo<anyo())||($anyo==anyo() && $mes<mes())||($anyo==anyo() && $mes==mes() && $dia<dia())))
					{
						//echo"<script>alert('aasdasd');</script>";
						$orden="select clientes.nombre from reservas , clientes  where reservas.cliente=clientes.id_cliente and dia =".$dia_mas." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1" ;

							$cho=ordensql($orden);
							$bandera=false;
							$cliente="";
							if($cho!=false)
							{
								while ($regi = $cho->fetch_array()) {

									$cliente=$cliente.$regi[0]."<br>";
								}
							}
							if(strcmp($cliente,"")==0){
								$cliente="";
							}

						echo "<td class='pasado'>$cliente  </td>";
					}
					else
					{
						for($i=1;$i<sizeof($horass);$i++ ) {
							if(!empty($diass[$i]))
							{
								$d=explode("*",$diass[$i]);
								if($horass[$i]==$hora && $d[0]==$anyo && $d[1]==$mes && $d[2]==$dia  )
								{
									$banderaReserva=0;
								}
							}

						}
						if($banderaReserva==1)
						{
							$orden="select dia, hora, cliente from reservas where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 order by 1,2,3" ;
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
								echo "<td  onClick=enviar('".$diaenviar."',".$hora.") id=campoDia>   </td>";
							}
							else
							{

								//mirar cuantos hay select count(cliente) from horario where anyo=2015 and mes=2 and dia=17
								$c=ordensql("select count(cliente) from reservas where anyo=$anyo and mes=$mes and dia=$dia and hora=$hora and cancelada=0");
								$cuantos=0;
								if($c!=false)
								{
									while ($reg = $c->fetch_array()) {

										$cuantos=$reg[0];
									}
								}

								$diaenviar="".$anyo."*".$mes."*".$dia;

								if($cuantos==1)
								{
									//orden sql para sacar los clientes
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";
									$c=ordensql($sql);

									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {

											$nombre=$reg[0];
											$edad=$reg[1];
										}
									}
									$edad=calcularEdad($edad);


									echo "<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoUno'> <div>$nombre: $edad</div>  </td>";
								}
								else
								{
									$sql="select nombre, fecha_nacimiento from reservas, clientes   where dia =".$dia." and mes=".$mes."  and anyo =".$anyo." and hora=".$hora." and cancelada=0 and reservas.cliente=clientes.id_cliente";

									$c=ordensql($sql);
									$conjunto_Datos=array();
									if($c!=false)
									{
										while ($reg = $c->fetch_array()) {
											$arr= array();
											$arr['nombre']=$reg[0];
											$arr['edad']=calcularEdad($reg[1]);
											$conjunto_Datos[]=$arr;
										}
									}
									if($cuantos==2)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoDos'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].$conjunto_Datos[1]['edad']."</div> </td>";
										echo $cadena;
									}
									if($cuantos==3)
									{
										$cadena="<td onClick=canceladaCalen($hora,'$diaenviar') id='ocupadoTres'> ";
										$cadena=$cadena."<div>".$conjunto_Datos[0]['nombre']." :".$conjunto_Datos[0]['edad']." </div><div> ".$conjunto_Datos[1]['nombre'].":".$conjunto_Datos[1]['edad']."</div><div> ".$conjunto_Datos[2]['nombre'].":".$conjunto_Datos[2]['edad']." </td>";
										echo $cadena;
									}
								}
							 }
						}
						else
						{
							$diaenviar="".$anyo."*".$mes."*".$dia;
							echo "<td id=campoRes onClick= eliminar('".$diaenviar."',".$hora.")>Reservado </td>";
						}
					}

				}
				echo "</tr>";
			}
		echo "</table>";
	}
	function horarioReservaM($horas, $dias)//saca el horario multiple
	{


		$horass=explode("*", $horas);
		$diass=explode("*", $dias);
		$anyo_inicio=anyo();
		$mes_inicio=mes();
		$dia_inicio=dia();

		$fecha_fin=sumar6Meses($anyo_inicio,$mes_inicio,$dia_inicio);

		$anyo_fin=$fecha_fin[0];
		$mes_fin=$fecha_fin[1];
		$dia_fin=$fecha_fin[2];
		$arrayDias= array("lunes", "martes","miercoles", "jueves","viernes","sabado","domingo");
		$arrayFech=array();
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
					$diaenviar="".$anyo."/".$mes."/".$dia;
					array_push($arrayFech, $diaenviar);
					echo "<td id=diaSemana>".diaDeLaSemana("".$anyo."-".$mes."-".$dia)."<br></td>";
				}
			echo "</tr>";

		for($hora=6;$hora<=23;$hora++) {

			echo "<td id=hora>".$hora.":00-".($hora+1).":00</td>";
			for($key=0;$key<sizeof($arrayDias);$key++ )
			{
				$value=$arrayFech[$key];
				$banderaReserva=1;
					for($i=0;$i<sizeof($diass);$i++ ) {

						if(!empty($diass))
						{
							if( $horass[$i]==$hora && $diass[$i]==$value )
							{
								$banderaReserva=0;
							}
						}
					}
				if($banderaReserva==1)
				{
					$diaSemana=diaDeLaSemana("".$value);
					$bandera=true;
					$orden="select distinct  hora from reservas where mes>=".($mes_inicio+1)." and mes<=".($mes_fin-1)."  and Semana='".$diaSemana."' and hora=".$hora." and cancelada=0";
					//echo $orden;
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
						//$dia12=$value;
						$diaSemana=diaDeLaSemana("".$value);
						//Ahora mirar las otras dos condiciones
						//sí el mes actual tiene alguna (dia de hoy hasta final de mes)
						$orden="select distinct  hora from reservas where mes=".($mes_inicio)." and dia>=".($dia_inicio)."  and Semana='".$diaSemana."' and hora=".$hora." and cancelada=0";
						//echo $orden;
						//$value=$dia12;

						$chos=ordensql($orden);
						if($chos!=false)
						{
							while ($regi = $chos->fetch_array()) {
								$bandera=false;
							}
						}
						if($bandera==true)
						{
							$diaenviar=$value;
							echo "<td id=campoDia onClick=enviar('".$diaenviar."',".$hora.")>   </td>";
						}
						else
						{
							$orden="select distinct  hora from reservas where mes=".($mes_fin)." and dia<=".($dia_fin)."  and Semana='".$diaSemana."' and hora=".$hora." and cancelada=0";
							//echo $orden;

							$chorizo=ordensql($orden);
							if($chorizo!=false)
							{
								while ($regi = $chorizo->fetch_array()) {
									$bandera=false;
								}
							}
							if($bandera==true)
							{
								$diaenviar=$value;
								$diaenviar="".$anyo."*".$mes."*".$dia;
								echo "<td id=campo onClick=enviar('".$diaenviar."',".$hora.")>  </td>";
							}
							else
							{
								echo "<td class=ocupadoM> ocupado</td>";
							}
						}
					}
					else
					{
						echo "<td class=ocupadoM> ocupado</td>";
					}
				}
				else
				{
					//eliminar
					$diaenviar=$value;
					echo "<td id=campoRes onClick=eliminar('".$diaenviar."',".$hora.")>Reservado</td>";
				}
			}
			echo "</tr>";
		}
	}
	function comprobarpagos(){
		//primero hay que mirar si en la tabla pagos hay entrada para este mes y este año
		$anyo=date("Y");
		$mes=date("m");
		$lista = ordensql("SELECT * from pagos where mes=".$mes." and anyo=".$anyo.";");

		if (!($lista->fetch_array())){
			//EMISIÓN DE PAGOS
			//1. Calcular cada factura por cada cliente que haya tenido reservas sin pagar de ese mes o anteriores
				//1.1. Mirar clientes con reservas sin pagar
			$listaclientes=ordensql("SELECT id_cliente FROM clientes, reservas WHERE pagada =0 and (cancelada=0 or cancelada=2) AND cliente = id_cliente and mes<=".$mes." and anyo=".$anyo." GROUP BY id_cliente;");
			while ($resultadoclientes=$listaclientes->fetch_array()){
				//1.2. En los clientes que las tengan, empezar una nueva factura (que empieza como emitida, 0)
				ordensqlupdate("INSERT INTO facturas (cliente, fecha, estado,valor,descuento) VALUES (".$resultadoclientes[0].", now(), 0, 0, 0);");
				$listaid=ordensql("SELECT MAX(id_factura) FROM facturas");
				$resultadoid=$listaid->fetch_array();
				//1.3. Añadir cada clase como línea de factura y marcarla como pagada en reservas
				$listaclases=ordensql("SELECT id_reserva FROM reservas WHERE pagada=0 and (cancelada=0 or cancelada=2) and ((mes<=".$mes." and anyo=".$anyo.") or (anyo<".$anyo.")) AND cliente =".$resultadoclientes[0].";");
				while ($resultadoclases=$listaclases->fetch_array()){
					ordensqlupdate("INSERT into lineas_factura VALUES(".$resultadoid[0].", ".$resultadoclases[0].", 1);");
					ordensqlupdate("UPDATE reservas set pagada=1 where id_reserva=".$resultadoclases[0].";");
				}
				//1.4. Calcular el valor de la factura y meterlo
				$valorfactura=preciofactura($resultadoid[0]);
				ordensqlupdate("UPDATE facturas set valor=".$valorfactura." where id_factura=".$resultadoid[0].";");
			}
			//2. Meter en pagos el mes y el año, para que se sepa que ya se han metido las facturas de ese mes
			ordensqlupdate("INSERT INTO pagos VALUES(".$mes.",".$anyo.");");
		}
	}

	//SE LE PASA LA FACTURA Y CALCULA SU PRECIO
	function preciofactura($factura){
		$listaelementos=ordensql("SELECT producto from lineas_factura where factura=".$factura." and producto<200000;");
		$precio=0;
		while ($resultado=$listaelementos->fetch_array()){
			$listafecha=ordensql("SELECT anyo, mes, dia, cliente from reservas where id_reserva=".$resultado[0]);
			$fecha=$listafecha->fetch_array();
			if ($fecha[1]<10){
				if ($fecha[2]<10) {
					$dia=$fecha[0]."-0".$fecha[1]."-0".$fecha[2];
				}else{
					$dia=$fecha[0]."-0".$fecha[1]."-".$fecha[2];
				}
			}else{
				if ($fecha[2]<10) {
					$dia=$fecha[0]."-".$fecha[1]."-0".$fecha[2];
				}else{
					$dia=$fecha[0]."-".$fecha[1]."-".$fecha[2];
				}
			}
			$listavalor=ordensql("SELECT valor_sin_iva from precios_tarifas p,contratos c
							    	where c.tarifa=p.tarifa and cliente=".$fecha[3]."
							    	and fecha_inicial<'".$dia."'
							    	order by fecha_inicial desc limit 1;");
			$resultadoprecio=$listavalor->fetch_array();
			$precio=$precio+$resultadoprecio[0];
		}
		return $precio;
	}
	function calcularEdad($fecha_nacimiento)
	{
		$fecha_n=explode("-",$fecha_nacimiento);//anyo-mes-dia
		if($fecha_n[1]>mes())
		{
			return anyo()-$fecha_n[0]-1;
		}
		else
		{
			if($fecha_n[1]==mes()){
				if($fecha_n[1]<=dia())
				{
					return anyo()-$fecha_n[0];
				}
			}else{
				return anyo()-$fecha_n[0];
			}
		}
	}


	///////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////PARTES////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////


	function menu()
	{
		echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/trainningmanager/administrador.php">
                    <img src="http://localhost/trainningmanager/imagenes/e3.png" id="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="clientes.php" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/trainningmanager/clientes/clientes.php">Clientes</a></li>
                            <li><a href="http://localhost/trainningmanager/clientes/nuevoCliente.php">Nuevo Cliente</a></li>
                        </ul>
                    </li>';
                    include ('../../Mobile-Detect/Mobile_Detect.php');

                    $detect = new Mobile_Detect();
                    if ($detect->isMobile()) {

                    }else{
                    	echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
                        	<ul class="dropdown-menu">
                         		<li><a href="http://localhost/trainningmanager/reservas/individuales.php">Individuales</a></li>
                            	<li><a href="http://localhost/trainningmanager/reservas/multiples.php">Multiples</a></li>
                        	</ul>
                    	</li>';
                    }
                    $detect = new Mobile_Detect();
                    if ($detect->isMobile()) {
	                    echo '<li>
	                        <a href="http://localhost/trainningmanager/administrador.php">Calendario</a>
	                    </li>
	                    <li>';
                    }else{

	                    echo '<li>
	                        <a href="http://localhost/trainningmanager/reservas/calendario.php">Calendario</a>
	                    </li>
	                    <li>';
	                }
	                    echo'    <a href="http://localhost/trainningmanager/tarifas/tarifas.php">Tarifas</a>
	                    </li>';
                    $detect = new Mobile_Detect();
                    if ($detect->isMobile()) {

                    }else{
                    echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facturacion <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="http://localhost/trainningmanager/facturacion/facturacion/facturacion.php">Facturación</a></li>
                          <li><a href="http://localhost/trainningmanager/facturacion/pagos/pagos.php">Pagos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">TPV<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="http://localhost/trainningmanager/tpv/tpv.php">TPV</a></li>
                          <li><a href="http://localhost/trainningmanager/tpv/registroproducto.php">Registro Producto</a></li>
                          <li><a href="http://localhost/trainningmanager/tpv/registroproveedor.php">Registro Provedor</a></li>
                        </ul>
                    </li>';
                	}
                    echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Correo<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="http://localhost/trainningmanager/correo/configuraciones.php">Configuracion</a></li>
                          <li><a href="http://localhost/trainningmanager/correo/envio.php">Enviar Correo</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          	<li><a href="http://localhost/trainningmanager/configuracion/nuevapass.php">Cambiar contraseña</a></li>';
                    if ($detect->isMobile()) {

                    }else{
                      echo '<li><a href="http://localhost/trainningmanager/entrenadores/masEntrenador.php">Añadir entrenador</a></li>
                            <li><a href="http://localhost/trainningmanager/entrenadores/entrenadores.php">Listado de entrenadores</a></li>';
                    }

                     echo '<li role="presentation" class="divider"></li>
                     <li><form action="http://localhost/trainningmanager/index.php" method="POST"><input type="hidden" name="c" value="c"/><input type=submit name=cerrar class="btn btn-link cierra" value="Cerrar Sesión"/></form></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</nav>
';
	}

	function cabecera()
	{
	session_start();
	comprueba();

	echo '<!DOCTYPE html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
	<?php
 ?>
	<head>
		 <meta charset="utf-8">
		 <meta name="robots" content="noindex">
		 <meta name="googlebot" content="noindex">
		 <META NAME="Robots" CONTENT="No-Index,No-Follow">
		 <link rel="icon" type="image/png" href="http://localhost/trainningmanager/imagenes/ico.png" />
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		  <link rel="stylesheet" href="http://localhost/trainningmanager/css/bootstrap.css" type="text/css" />
		  <link rel="stylesheet" href="http://localhost/trainningmanager/css/bootstrap.min.css" type="text/css" />
		  <link rel="stylesheet" href="http://localhost/trainningmanager/style2.css"/>
	 <script src="http://localhost/trainningmanager/js/jquery.js"></script>
	<script src="http://localhost/trainningmanager/js/bootstrap.min.js"></script>
	<script src="http://localhost/trainningmanager/js/jquery-2.1.3.min.js"></script>
	<script src="http://localhost/trainningmanager/js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/trainningmanager/js/jquery.datetimepicker.js"></script>
    <link rel="stylesheet" href="http://localhost/trainningmanager/js/jquery.datetimepicker.css">
    <link rel="stylesheet" href="http://localhost/trainningmanager/js/jquery-ui-1.11.4.custom/jquery-ui.theme.css">
    <link rel="stylesheet" href="http://localhost/trainningmanager/js/jquery-ui-1.11.4.custom/jquery-ui.structure.css">


	<title>AC Wellness</title>
    <link href="http://localhost/trainningmanager/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/trainningmanager/bootstrap/logo-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/trainningmanager/estilos/stylesadmin.css">';

	}
?>
