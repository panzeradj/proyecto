<?php
session_start();
include("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();
?>
<style>
	a:link {text-decoration: none }
	a:hover {text-decoration: none }
	a:visited {text-decoration: none }
	.letraOscura a:link, .letraOscura a:hover, .letraOscura a:visited{color:black;}
	.sombreado a:link, .sombreado a:hover, .sombreado a:visited{color:#fff;}
	.contenedor{
		max-width: 60em;
		color:white;
	}
	.sombreado{
		background-color:#1D99D6;
		color:#fff;
		text-decoration: none;
	}
	.tamano{
		height: :2em;
	}
	.cabecera{
		background-color: #273481;
		height: 4em;
	}
	.letraOscura{
		color:black;
		text-decoration: none;

	}
	.busqueda, .busqueda form{
		color:black;

		width: 100%;

		display: inline-flex;
	    display: -webkit-inline-flex;
	    display: -moz-inline-flex;
	    display: -ms-inline-flex;

	    justify-content:space-around;
	    -webkit-justify-content:space-around;
	    -moz-justify-content:space-around;
	    -ms-justify-content:space-around;

	    flex-wrap: wrap;
	    -webkit-flex-wrap: wrap;
	    -moz-flex-wrap: wrap;
	    -ms-flex-wrap: wrap;
	}
	#control{
		width: 50em;
	}
	body, h1{

	    width: 100%;

	    display: inline-flex;
	    display: -webkit-inline-flex;
	    display: -moz-inline-flex;
	    display: -ms-inline-flex;

	    justify-content:center;
	    -webkit-justify-content:center;
	    -moz-justify-content:center;
	    -ms-justify-content:center;

	    flex-wrap: wrap;
	    -webkit-flex-wrap: wrap;
	    -moz-flex-wrap: wrap;
	    -ms-flex-wrap: wrap;
	}
	<?php
	$detect = new Mobile_Detect();
    if ($detect->isMobile()) {
    ?>
    .sombreado, .letraOscura{
		font-size: 0.8em;
	}
	.cabecerac{
		font-size: 0.7em;
	}
	<?php
	}
	?>
</style>
<script src="http://acwellness.es/trainningmanager/js/javaScript.js"></script>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
	function errorCrear(){
	    alertify.error("Error datos mal introducidos");
	    return false;
	}
	function okCrear(){
	    alertify.success("Cliente creado correctamente");
	    return false;
	}
</script>
</head>

<body>
<?php menu();
if(!(empty($_GET["mensaje"]))){
        if($_GET["mensaje"]=="okCrear"){
        	echo "<script>okCrear();</script>";
        }
        if($_GET["mensaje"]=="errorCrear"){
        	echo "<script>errorCrear();</script>";
        }
}
?>

<div id="control">
<div class="contenedor center-block ">
<?php
$banderaBaja=false;

	if(!isset($_GET['baja'])  )
	{
		$banderaBaja=true;
		echo "<div class='letraOscura'><h1>Clientes activos  <img src='../iconos/clientesActivos.png'></h1><form name='a' method=get action='http://acwellness.es/trainningmanager/clientes/clientes.php'><input type='hidden' name=baja value=a><input class='btn btn-warning' type=submit name=a value='Clientes inactivos'></form></div>";
		//echo "<form name='a' method=post action='Clientes.php'><input type=submit name=asd value='Clientes activos'></form>";

	}
	else
	{
		echo "<div class='letraOscura'><h1>Clientes inactivos</h1>";
			echo "<form name='a' method=post action='http://acwellness.es/trainningmanager/clientes/clientes.php'><input class='btn btn-success' type=submit name=asd value='Clientes activos'></form></div>";
		//echo "<form name='a' method=get action='Clientes.php'><input type='hidden' name=baja value=a><input type=submit name=a value='Clientes inactivos'></form>";
	}

	if($banderaBaja )
	{
		echo "<br/><div class='busqueda'><form action='http://acwellness.es/trainningmanager/clientes/clientes.php' method=POST name=buasdsqueda><input type=text name=busqueda ><input id='baja' type=submit name=enviar value='Enviar consulta'></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email ,apellido
        from clientes
        where activo=1 and id_cliente>1";
	}
	else
	{
		echo "<br/><div class='busqueda'><form action='http://acwellness.es/trainningmanager/clientes/clientes.php?baja=a' method=POST name=buasdsqueda><input type=text name=busqueda > <input type=hidden name='noActivo' value='asd'><input id='baja' type=submit name=enviar></form></div>";
		$sql="select id_cliente , nombre, dni, genero, fecha_nacimiento , email , apellido
        from clientes
        where activo=0 and id_cliente>1";
	}
	echo '<br/><br/><br/> <table class="table">
                        <tr>
                            <th class=" cabecerac" ><h4>Nombre</h4></th>
                            <th class=" cabecerac"><h4>Genero</h4></th>
                            <th class=" cabecerac"><h4>Edad</h4></th>
                            <th class="cabecerac"><h4>Correo electrónico </h4></th>
                        </tr>';
	if(isset($_POST['busqueda']) && $_POST['busqueda']!="")
	{
		  $cadenas= explode(" " , $_POST['busqueda']);
  		$sql="select   id_cliente , nombre, dni, genero, fecha_nacimiento , email , apellido
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
	      				or (clientes.apellido like '%".$cadena."%' or clientes.apellido like '".$cadena."%' or clientes.apellido like '%".$cadena."' )
						or (clientes.email like '%".$cadena."%' or clientes.email like '".$cadena."%' or clientes.email like '%".$cadena."' )
						or (clientes.genero like '%".$cadena."%' or clientes.genero like '".$cadena."%' or clientes.genero like '%".$cadena."' ))";
	      $contador++;
	    }
	    if( $banderaBaja)
	    {
	    	 $sql=$sql." and activo=1 and id_cliente>1";
	    }
	    else
	    {
	    	 $sql=$sql." and activo=0 and id_cliente>1";
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
			echo "<tr><td class=' tamano ".$class."'><a href='clienteI.php?cliente=".$regi[0]."'>".$regi[1]." ".$regi[6]."</a></td>";
	      	echo "<td class=' tamano ".$class."'>".$regi[3]."</td>";
	      	echo "<td class=' tamano ".$class."'>".calcularEdad($regi[4])."</td>";
	      	echo "<td id='mail' class=' tamano ".$class."'>".$regi[5]."</td></tr>";
			$contador++;
		}
	}
?>
</div>
</div>
</body>
</html>
