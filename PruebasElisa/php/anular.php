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
    <script src="js/actualizarprecio.js" language="JavaScript"></script>
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
                if (isset($_GET["accion"])){
                    $factura=$_GET["factura"];
                    $accion=$_GET["accion"];
                    if($accion==0){?>
                        <h3>Estás a punto de anular una factura</h3>
                        <form name="nuevovalor" action="edicion.php" method="post">
                            <fieldset>
                                <p>¿Estás seguro?</p>
                                <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                                <input type="hidden" name="accion" value="<?php echo $accion;?>"/>
                                <input type="submit" name="cambiar" value="Sí, deseo anular la factura"/>
                            </fieldset>
                        </form>
                    <?php }else{
                        if ($accion==1) { ?>
                            <h3>Estás a punto de anular un pago</h3>
                            <form name="nuevovalor" action="edicion.php" method="post">
                                <fieldset>
                                    <p>La factura volverá a aparecer como emitida. ¿Estás seguro?</p>
                                    <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                                    <input type="hidden" name="accion" value="<?php echo $accion;?>"/>
                                    <input type="submit" name="cambiar" value="Sí, deseo anular el pago"/>
                                </fieldset>
                            </form>
                        <?php }else{?>
                            <h3>Vas a habilitar una factura anulada</h3>
                            <form name="nuevovalor" action="edicion.php" method="post">
                                <fieldset>
                                    <p>¿Estás seguro?</p>
                                    <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                                    <input type="hidden" name="accion" value="<?php echo $accion;?>"/>
                                    <input type="submit" name="cambiar" value="Sí, deseo habilitar la factura"/>
                                </fieldset>
                            </form>
                        <?php }} ?>
                     <button onclick="location.href='pagos.php'">No, deseo volver</button>
                <?php }else{
                    header("location:pagos.php");
                }
                ?>                
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>