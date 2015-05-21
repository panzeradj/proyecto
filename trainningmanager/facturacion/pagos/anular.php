<?php include("../../php/funciones/function.php");
cabecera();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <style type="text/css">
    #control{
        width: 50em;
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
</style>
    <script src="../../js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu(); ?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($_POST["accion"])){
                        $factura=$_POST["factura"];
                        $accion=$_POST["accion"];
                        if($accion==0){?>
                           <div style="text-center"><h3>Estás a punto de anular una factura&nbsp;&nbsp;<img class="img-rounded" src='../../iconos/anularfactura.png'></h3></div>
                            <form name="nuevovalor" action="edicion.php" method="post">
                                <fieldset>
                                    <div style="text-center"><p>¿Estás seguro?</p></div>
                                    <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                                    <input type="hidden" name="accion" value="<?php echo $accion;?>"/>
                                    <input type="submit" class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="cambiar" value="Sí, deseo anular la factura"/>
                                </fieldset>
                            </form>
                        <?php }else{?>
                               <div style="text-center"><h3>Vas a habilitar una factura anulada</h3></div>
                                <form name="nuevovalor" action="edicion.php" method="post">
                                    <fieldset>
                                        <div style="text-center"><p>¿Estás seguro?</p></div>
                                        <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                                        <input type="hidden" name="accion" value="<?php echo $accion;?>"/>
                                        <input type="submit" class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="cambiar" value="Sí, deseo habilitar la factura"/>
                                    </fieldset>
                                </form>
                            <?php } ?>
                            <br/>
                         <button class=" anchoMax  PATEON btn btn-success btn-block  RESET" onclick="location.href='pagos.php'">No, deseo volver</button>
                    <?php }else{
                        header("location:pagos.php");
                    }
                    ?>                
                </div>
            </div>
        </div>
    </div>
</body>
</html>