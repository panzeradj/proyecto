<?php include("../../php/funciones/function.php");
cabecera();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <script type="text/javascript" src="../../alertify/lib/alertify.js"></script>
    <link rel="stylesheet" href="../../alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../../alertify/themes/alertify.default.css" />
    <script src="../../js/actualizarprecio.js" language="JavaScript"></script>
    <style type="text/css">
    #control{
    
    }
    body, h1, h2, h3, p{
        
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
    .emitido{
        font-weight:bold;
        color: #52d053;
    }
    .pagado{
        font-weight:bold;
        color: #1D99D6;
    }
    .anulado{
        font-weight:bold;
        color: #d3290f;
    }
    td{
        background-color: #ffffff;
        vertical-align: middle !important;
    }
    </style>
    <script type="text/javascript">
        function okp(){
            alertify.success("Pago efectuado"); 
            return false;
        }
        function oka(){
            alertify.error("Factura anulada"); 
            return false;
        }
         function okh(){
            alertify.success("Factura habilitada"); 
            return false;
        }
        function oke(){
            alertify.success("Factura editada"); 
            return false;
        }
    </script>
</head>
<body>
<?php
if(isset($_GET["mensaje"])){
    if($_GET['mensaje']=="p"){
        echo "<script>okp();</script>";
    }
    if($_GET['mensaje']=="a"){
        echo "<script>oka();</script>";
    }
    if($_GET['mensaje']=="h"){
        echo "<script>okh();</script>";
    }
    if($_GET['mensaje']=="e"){
        echo "<script>oke();</script>";
    }
}
?>
    <?php menu(); ?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-center"><h1>Pagos por cliente&nbsp;&nbsp;<img class="img-rounded" src='../../iconos/pagosporcliente.png'></h1></div>
                    <p>En la tabla de abajo se encuentra el listado de los pagos, ordenados por la fecha en la que se emitieron. </p>
                    <p class="leyenda">Leyenda:&nbsp; 
                    <span class="emitido">Emitido&nbsp;</span>, <span class="anulado">&nbsp;Anulado</span>&nbsp;y&nbsp;<span class="pagado">Pagado </span>.</p>
                    <table class='table table-hover'>
                        <tr>
                            <th class="titulo"><h4>Cliente</h4></th> 
                            <th class="titulo"><h4>Fecha emisión</h4></th>
                            <th class="titulo"><h4>Nº clases</h4></th>
                            <th class="titulo"><h4>Subtotal</h4></th>
                            <th class="titulo"><h4>Descuento</h4></th>
                            <th class="titulo"><h4>Total (con IVA)</h4></th>
                            <th class="titulo"><h4>Estado</h4></th>
                            <th class="titulo"><h4>Acciones</h4></th>
                        </tr>
                            <?php 
                            $lista=ordensql("SELECT c.nombre, f.fecha, f.valor, f.valor*(1+iva/100)*(1-f.descuento/100), f.descuento, f.estado, id_factura,domiciliado, c.apellido
                                                from clientes c, facturas f,iva where c.id_cliente=f.cliente order by fecha desc;");
                            while($resultado=$lista->fetch_array()){ 
                            	$listaclases= ordensql("SELECT count(producto) from lineas_factura where producto<200000 and factura=".$resultado[6].";");
                            	$resultadoclases=$listaclases->fetch_array();
                            	?>
                                <tr><td valign="middle"><?php echo $resultado[0]." ".$resultado[8]?></td>
                                    <td valign="middle"><?php echo date("d-m-Y",strtotime($resultado[1]));?></td>                                    
                                    <td valign="middle"><?php echo $resultadoclases[0];?></td>
                                    <td valign="middle" style="text-align:right"><?php echo number_format(round($resultado[2],2),2)."€";?></td>
                                    <td valign="middle" style="text-align:right"><?php echo number_format($resultado[4],2)."%";?></td>
                                    <td valign="middle" style="text-align:right"><?php echo number_format(round($resultado[3],2),2)."€";?></td>
                                    <td id="acciones"><?php 
                                        switch ($resultado[5]) {
                                            case 0:
                                                if ($resultado[7]==0){?><span class="emitido">Emitida</span></td>
                                                <td>
                                                <form name="pago" action="../../tpv/tpv.php" method="post" style="display:inline-block"> 
                                                    <input class="btn btn-success" type="submit" name="pagar" value="Pagar"/>
                                                    <input  type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                </form>
                                                <form name="anular" action="anular.php" method="post" style="display:inline-block">
                                                    <input class="btn btn-danger" type="submit" name="anular" value="Anular"/>
                                                    <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                    <input type="hidden" name="accion" value="0"/>
                                                </form>
                                                <form name="editar" action="editarfactura.php" method="post" style="display:inline-block">
                                                    <input class="btn btn-info" type="submit" name="anular" value="Editar"/>
                                                    <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                </form>
                                                <?php }else{
                                                    ?><span class="emitido">Emitida</span></td>
                                                <td>
                                                <form name="pago" action="edicion.php" method="post" style="display:inline-block"> 
                                                    <input class="btn btn-success" type="submit" name="pagar" value="Está pagada"/>
                                                    <input type="hidden" name="accion" value="4"/>
                                                    <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                </form>
                                                <form name="anular" action="anular.php" method="post" style="display:inline-block">
                                                    <input class="btn btn-danger" type="submit" name="anular" value="Anular"/>
                                                    <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                    <input type="hidden" name="accion" value="0"/>
                                                </form>
                                                <form name="editar" action="editarfactura.php" method="post" style="display:inline-block">
                                                    <input class="btn btn-info" type="submit" name="anular" value="Editar"/>
                                                    <input type="hidden" name="factura" value="<?php echo $resultado[6];?>"/>
                                                </form>
                                                <?php }
                                                break;
                                            case 1:
                                                ?><span class="pagado">Pagada</span></td>
                                                <td>
                                                <form name="form1" method="post" action="../../tpv/facturas/facturas/facturas.php" >
                                                    <input type=hidden name=nfactura value="<?php echo $resultado[6];?>">
                                                    <input type="hidden" name="generar_factura" value="true">
                                                    <input type=hidden name="id_factura" value="<?php echo $resultado[6];?>">
                                                    <input type="submit" class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="Submit" value="Ver factura">
                                                    </form>
                                                <?php
                                                break;
                                            case 2:
                                                ?><span class="anulado">Anulada</span></td>
                                                <td>
                                                <form name="anular" action="anular.php" method="post">
                                                    <input type="submit" class="btn btn-success btn-block" name="anular" value="Habilitar"/>
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
    </div>
</body>
</html>