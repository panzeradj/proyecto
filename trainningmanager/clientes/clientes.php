<?php include("../php/funciones/function.php"); 
cabecera();
?>
		 <style>
		 	.contenedor{
		 		max-width: 60em;
		 		color:white;
		 	}
			.sombreado{
				background-color:#1D99D6;
				color:#fff;
			}
			.tamano{
				height: :2em;
			}
			.cabecera
			{
				background-color: #273481;
				height: 4em;
			}
			.letraOscura{
				color:black;
			}
			.busqueda{
				color:black;
			}
</style>
		<script src="http://localhost/trainningmanager/js/javaScript.js"></script>
</head>
<body>
<?php menu();?>
<div class="contenedor center-block ">
<?php
$banderaBaja=false; 

	if(!isset($_GET['baja'])  )
	{
		$banderaBaja=true;
		echo "<div class='letraOscura'><h1>Clientes activos</h1><form name='a' method=get action='http://localhost/trainningmanager/clientes/Clientes.php'><input type='hidden' name=baja value=a><input type=submit name=a value='Clientes inactivos'></form></div>";
		//echo "<form name='a' method=post action='Clientes.php'><input type=submit name=asd value='Clientes activos'></form>";

	}
	else
	{
		echo "<div class='letraOscura'><h1>Clientes inactivos</h1>";
			echo "<form name='a' method=post action='http://localhost/trainningmanager/clientes/Clientes.php'><input type=submit name=asd value='Clientes activos'></form></div>";
		//echo "<form name='a' method=get action='Clientes.php'><input type='hidden' name=baja value=a><input type=submit name=a value='Clientes inactivos'></form>";
	}
	

	

       
	if($banderaBaja )
	{
		echo "<div class='busqueda'><form action='http://localhost/trainningmanager/clientes/Clientes.php' method=POST name=buasdsqueda><input type=text name=busqueda ><input type=submit name=enviar></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email
        from clientes 
        where activo=1";
	}
	else
	{
		echo "<div class='busqueda'><form action='http://localhost/trainningmanager/clientes/Clientes.php?baja=a' method=POST name=buasdsqueda><input type=text name=busqueda > <input type=hidden name='noActivo' value='asd'><input type=submit name=enviar></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email
        from clientes 
        where activo=0";
	}
	echo "<div class='col-lg-4 cabecera'><h4>Nombre</h4></div>";
    echo "<div class='col-lg-4 cabecera'><h4>Genero</h4></div>";
    echo "<div class='col-lg-2 cabecera'><h4>Edad</h4></div>";
    echo "<div class='col-lg-2 cabecera'><h4>Correo electronico</h4></div>";

	if(isset($_POST['busqueda']) && $_POST['busqueda']!="")
	{
		  $cadenas= explode(" " , $_POST['busqueda']);
  		$sql="select   id_cliente , nombre, dni, genero, fecha_nacimiento , email
        from clientes
        where ";
	    $contador=0;
	    foreach($cadenas as $cadena )
	    {
	      if($contador!=0)
	      {
	        $sql=$sql." and ";
	      }
	      $sql=$sql."  ((clientes.nombre like '%".$cadena."%' or clientes.nombre like '".$cadena."%' or clientes.nombre like '%".$cadena."' ) 
						or (clientes.email like '%".$cadena."%' or clientes.email like '".$cadena."%' or clientes.email like '%".$cadena."' ) 
						or (clientes.genero like '%".$cadena."%' or clientes.genero like '".$cadena."%' or clientes.genero like '%".$cadena."' ))";
	      $contador++;
	    }
	    if( $banderaBaja)
	    {
	    	 $sql=$sql." and activo=1";
	    }
	    else
	    {
	    	 $sql=$sql." and activo=0";
	    }
	   
	
	}
	
	$cho=ordensql($sql);
	$contador=0;
	if($cho!=false)
	{
		while ($regi = $cho->fetch_array()) {
			if($contador%2==0)
			{
				$class="sombreado";
			}
			else
			{
				$class="letraOscura";
			}
			
			$genero=$regi[3];
			
			echo "<a href='clienteI.php?cliente=".$regi[0]."'><div class='col-lg-4 tamano ".$class."'>".$regi[1]."</div>";
	      	echo "<div class='col-lg-4 tamano ".$class."'>".$genero."</div>";
	      	echo "<div class='col-lg-2  tamano ".$class."'>".calcularEdad($regi[4])."</div>";
	      	echo "<div class='col-lg-2  tamano ".$class."'>".$regi[5]."</div></a>";
			$contador++;
		}
	}
?>
</div>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>