<?php include("../../php/funciones/function.php");
cabecera();
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <script src="js/actualizarprecio.js" language="JavaScript"></script>
    <style type="text/css">
    #control{
        width: 50em;
    }
    body, h1, h2, h3{
        
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
</head>
<body>
    <?php menu(); ?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if(!isset($_POST["factura"])){
                        header("location:pagos.php");
                    }
                    $factura=$_POST["factura"];
                    ?>
                    <div style="text-center"><h3>Cambiar importe de la factura&nbsp;&nbsp;<img class="img-rounded" src='../../iconos/cambiarimporte.png'></h3></div>
                    <p>Si quieres devolver a la factura su valor por defecto, introduce 0.</p>
                    <form name="nuevovalor" action="edicion.php" method="post">
                        <fieldset>
                            <label for="valor">Nuevo importe sin IVA:</label> <input type='text' class="form-control  " name='valor' value="<?php echo $valor;?>" id="valor" required/> <div id="precioconiva"> </div>
                            <br/>
                            <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                            <input type="hidden" name="accion" value=3 />
                            <input type="submit" name="cambiar" class=" anchoMax  PATEON btn btn-success btn-block  RESET" value="Guardar cambios"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>