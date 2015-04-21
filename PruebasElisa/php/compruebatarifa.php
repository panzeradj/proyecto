<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <meta name="author" content="Oscar Romero">
    <title>AC Wellness</title>
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
                        <a href="tarifas.php">Tarifas</a>
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
        <div class="row">
            <div class="col-lg-12">
            <?php
			include("funciones/function.php"); 
			if (isset($_POST['crear'])||isset($_POST['cambiar'])){
				$nombreahora=$_POST['nombre'];
				$descripcionahora=$_POST['descripcion'];
				$valorahora=$_POST['valor'];			
				if (isset($_POST['crear'])){
					ordensqlupdate("INSERT into tarifas (nombre, descripcion) VALUES ('".$nombreahora."', '".$descripcionahora."');");
					$listaid=ordensql("SELECT MAX(id_tarifa) from tarifas;");
					$resultadoid=$listaid->fetch_array();
					$id=$resultadoid[0];
					ordensqlupdate("INSERT into precios_tarifas (tarifa, fecha_inicial, valor_sin_iva) VALUES (".$id.",now(), '".$valorahora."');");
					echo "<h2>La tarifa ha sido creada satisfactoriamente</h2>
						A continuación se redirigirá a la página principal de tarifas. ";
				}
				if (isset($_POST['cambiar'])){
					$idanterior=$_POST['anterior'];
					$lista=ordensql("SELECT valor_sin_iva from precios_tarifas where tarifa=".$idanterior." order by fecha_inicial desc;");
					$resultado=$lista->fetch_array();
					$valoranterior=$resultado[0];				
					ordensqlupdate("UPDATE tarifas set descripcion='".$descripcionahora."', nombre='".$nombreahora."' where id_tarifa='".$idanterior."';");
					if($valoranterior!=$valorahora){
						ordensqlupdate("INSERT into precios_tarifas (tarifa, fecha_inicial, valor_sin_iva) VALUES (".$idanterior.",now(), '".$valorahora."');");				
					}
					echo "<h2>La tarifa ha sido cambiada satisfactoriamente</h2>
						A continuación se redirigirá a la página principal de tarifas. ";
				}
				header("Refresh: 5; url=tarifas.php"); 
			}else{
				header("Location:tarifas.php");
			}
			?>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
		