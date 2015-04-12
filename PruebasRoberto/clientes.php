
<!DOCTYPE html>
<html lang='es' xml:lang='es' xmlns="http://www.w3.org/1999/xhtml">
	<head>
		 <meta charset="utf-8">
		 <link rel="icon" type="image/png" href="imagenes/ico.png" />
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		 
		  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		 <style>
		 	.container{
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
	<link rel="stylesheet" href="style2.css"/>
	<script src="js/javaScript.js"></script>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<title>AC Wellness - Clientes</title>
    <link href="bootstrap/bootstrap.min.css"s rel="stylesheet">
    <link href="bootstrap/logo-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/stylesadmin.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                <a class="navbar-brand" href="administrador.php">
                    <img src="imagenes/e.png" id="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="clientes.php" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="individuales.php">Individuales</a></li>
                          <li><a href="multiples.php">Multiples</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendario.php">Calendario</a>
                    </li>
                    <li>
                        <a href="#">Tarifas y bonos</a>
                    </li>
                    <li>
                        <a href="#">Configuracion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</nav>
<div class="container">
<?php
$banderaBaja=false; 
	if(!isset($_GET['baja'])  )
	{
		$banderaBaja=true;
	}
	

	include("/php/funciones/function.php");

       
	if($banderaBaja )
	{
		echo "<div class='busqueda'><form action='Clientes.php' method=POST name=buasdsqueda><input type=text name=busqueda ><input type=submit name=enviar></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email
        from clientes 
        where activo=1";
	}
	else
	{
		echo "<div class='busqueda'><form action='Clientes.php?baja=a' method=POST name=buasdsqueda><input type=text name=busqueda > <input type=hidden name='noActivo' value='asd'><input type=submit name=enviar></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email
        from clientes 
        where activo=0";
	}
	echo "<div class='col-lg-4 cabecera'><h4>Nombre</h4></div>";
    echo "<div class='col-lg-4 cabecera'><h4>Genero</h4></div>";
    echo "<div class='col-lg-2 cabecera'><h4>Fecha de nacimiento</h4></div>";
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
			if($regi[3]=="H")
			{
				$genero="Hombre";
			}
			else if ($regi[3]=="M"){
				$genero="Mujer";
			}
			echo "<a href='clienteI.php?cliente=".$regi[0]."'><div class='col-lg-4 tamano ".$class."'>".$regi[1]."</div>";
	      	echo "<div class='col-lg-4 tamano ".$class."'>".$genero."</div>";
	      	echo "<div class='col-lg-2  tamano ".$class."'>".$regi[4]."</div>";
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