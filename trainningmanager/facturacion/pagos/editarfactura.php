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
    <?php include("../../php/funciones/function.php");
    cabecera();
    ?>    
    <script src="js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if(!isset($_POST["factura"])){
                    header("location:pagos.php");
                }
                $factura=$_POST["factura"];
                ?>
                <h3>Cambiar importe de la factura</h3>
                <p>Si quieres devolver a la factura su valor por defecto, introduce 0.</p>
                <form name="nuevovalor" action="edicion.php" method="post">
                    <fieldset>
                        <label for="valor">Nuevo importe sin IVA:</label> <input type='text' name='valor' value="<?php echo $valor;?>" id="valor" required/> <div id="precioconiva"> </div>
                        <br/>
                        <input type="hidden" name="factura" value="<?php echo $factura;?>"/>
                        <input type="hidden" name="accion" value=3 />
                        <input type="submit" name="cambiar" value="Guardar cambios"/>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>