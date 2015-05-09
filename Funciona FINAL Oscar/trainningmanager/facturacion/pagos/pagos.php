<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../../php/funciones/function.php");
    cabecera();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <meta name="author" content="Oscar Romero">
    <title>AC Wellness</title>
    <script src="../../js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
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
                                <td id="acciones"><?php 
                                    switch ($resultado[5]) {
                                        case 0:
                                            ?><span class="emitido">Emitida</span></td>
                                            <td>
                                            <form name="cambioiva" action="tpv.php" method="post" style="display:inline-block"> 
                                                <input type="submit" name="pagar" value="Pagar"/>
                                                <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                            </form>
                                            <form name="anular" action="anular.php" method="post" style="display:inline-block">
                                                <input type="submit" name="anular" value="Anular"/>
                                                <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                <input type="hidden" name="accion" value="0"/>
                                            </form>
                                            <form name="anular" action="editarfactura.php" method="post" style="display:inline-block">
                                                <input type="submit" name="anular" value="Editar"/>
                                                <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                            </form>
                                            <?php
                                            break;
                                        case 1:
                                            ?><span class="pagado">Pagada</span></td>
                                            <td>
                                            <?php
                                            break;
                                        case 2:
                                            ?><span class="anulado">Anulada</span></td>
                                            <td>
                                            <form name="anular" action="anular.php" method="post">
                                                <input type="submit" name="anular" value="Habilitar"/>
                                                <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                <input type="hidden" name="accion" value="2"/>
                                            </form>
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
</html>