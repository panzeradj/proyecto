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
                comprobarpagos();
                ?>
                <h3>Pagos por cliente</h3>
                <p>En la tabla de abajo se encuentra el listado de los pagos, ordenados por fecha de la última acción realizada sobre ellos. </p>
                <p class="leyenda">Leyenda: 
                <span class="emitido">Emitido</span>, <span class="anulado">Anulado</span> y <span class="pagado">Pagado</span>.</p>
                <table>
                    <tr>
                        <th class="titulo"><h4>Cliente</h4></th> 
                        <th class="titulo"><h4>Fecha emisión</h4></th>
                        <th class="titulo"><h4>Precio sin IVA</h4></th>
                        <th class="titulo"><h4>Precio con IVA</h4></th>
                        <th class="titulo"><h4>Descuento</h4></th>
                        <th class="titulo"><h4>Estado</h4></th>
                        <th class="titulo"><h4>Acciones</h4></th>
                    </tr>
                        <?php 
                        $lista=ordensql("SELECT c.nombre, f.fecha, f.valor, f.valor*(1+iva/100), f.descuento, f.estado, id_factura
                                            from clientes c, facturas f,iva where c.id_cliente=f.cliente order by fecha desc;");
                        while($resultado=$lista->fetch_array()){ ?>
                            <tr><td><?php echo $resultado[0]?></td>
                                <td><?php echo date("d-m-Y",strtotime($resultado[1]));?></td>
                                <td><?php echo round($resultado[2],2)."€";?></td>
                                <td><?php echo round($resultado[3],2)."€";?></td>
                                <td><?php echo $resultado[4]."%";?></td>
                                <td><?php 
                                    switch ($resultado[5]) {
                                        case 0:
                                            ?><span class="emitido">Emitida</span></td>
                                            <td><button onclick="location.href='tpv.php?factura=<?php echo $resultado[6];?>'">Pagar</button>
                                            <button onclick="location.href='anular.php?factura=<?php echo $resultado[6];?>&accion=0'">Anular</button>
                                            <button onclick="location.href='editarfactura.php?factura=<?php echo $resultado[6];?>'">Editar</button>
                                            <?php
                                            break;
                                        case 1:
                                            ?><span class="pagado">Pagada</span></td>
                                            <td><button onclick="location.href='anular.php?factura=<?php echo $resultado[6];?>&accion=1'">Anular pago</button>
                                            <?php
                                            break;
                                        case 2:
                                            ?><span class="anulado">Anulada</span></td>
                                            <td><button onclick="location.href='anular.php?factura=<?php echo $resultado[6];?>&accion=2'">Habilitar</button>
                                            <?php
                                            break;
                                    }?></td>
                            </tr>
                        <?php } ;?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>