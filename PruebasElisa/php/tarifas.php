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
            <h3>TARIFAS</h3>
            <br/>
            <button onclick="location.href='nuevatarifa.php'">Crear nueva tarifa</button>
            <br/>
            <br/>
			<table>
			<tr><th class="titulo"><h4>Nombre</h4></th> 
			<th class="titulo"><h4>Descripción</h4></th> 
			<th class="titulo"><h4>Precio sin IVA</h4></th>
			<th class="titulo"><h4>Precio con IVA</h4></th></tr>		
			<?php
			include("funciones/function.php"); 
			$listatarifas=ordensql("select * from tarifas;");
			$lista=ordensql("select * from iva;");
			$resultado=$lista->fetch_array();
			$iva=$resultado[0];
			while ($resultadotarifas=$listatarifas->fetch_array()){
				$listaprecio=ordensql("select valor_sin_iva from precios_tarifas where tarifa=".$resultadotarifas[0]." order by fecha_inicial desc;");
				$resultadoprecio=$listaprecio->fetch_array();
				?>
				<tr><td> <?php echo $resultadotarifas[1]?></td>
				<td> <?php echo $resultadotarifas[2]?></td>
				<td> <?php echo number_format($resultadoprecio[0],2)?>€</td>
				<td> <?php echo number_format($resultadoprecio[0]*(($resultado[0]+100)/100),2)?>€</td>
				</tr><?php
			}
			?>
			</table>
			<br/>			
			<form name="cambiotarifa" action="cambiartarifa.php" method="post">
				<select name="tarifa" size="1" required>
    				<option value="">Elige una tarifa para modificar</option>
    				<?php			
    				$lista=ordensql("select id_tarifa, nombre from tarifas order by 1;");
    				while ($resultado=$lista->fetch_array()){?>
                        <option value='<?php echo $resultado[0];?>'><?php echo $resultado[1];?></option>
    				<?php }?>				
				</select>
				<input type="submit" name="cambiartarifa" value="Cambiar tarifa" />
			</form>
			<br/>
			<br/>
			<hr/>
			<h3>IVA</h3>
			<br/>
			El IVA actualmente es del <?php echo $iva; ?>%.
			<br/>
			<br/>
			<form name="cambioiva" action="cambiariva.php" method="post"> 
				Introduce el nuevo valor: <input type="text" name="iva" required/>
				<input type="submit" name="cambiariva" value="Cambiar IVA" />
			</form>
			<br/>
			<br/>		
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>