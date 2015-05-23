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
                if (isset($_POST["accion"])){
                    $factura=$_POST["factura"];
                    $accion=$_POST["accion"];
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
                        <?php } ?>
                     <button onclick="location.href='pagos.php'">No, deseo volver</button>
                <?php }else{
                    header("location:pagos.php");
                }
                ?>                
            </div>
        </div>
    </div>
</html>