<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
	<script src="../js/actualizarprecio.js" language="JavaScript"></script>
    <style type="text/css">
    #control{
        width: 50em;
    }
    body, h1{
        
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
    <?php menu();
    ?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div style="text-center"><h1>Nueva tarifa</h1></div>
    			<br/>
    			<br/>
    			<form name="datostarifa" action="compruebatarifa.php" method="post">
    				<fieldset>
    					<label for="nombre">Nombre:</label> <input type="text" class="form-control  " name="nombre" required/>
    					<br/>
    					<label for="descripcion">Descripción de la tarifa:</label> <input type="fieldtext" class="form-control  " name="descripcion" required/>
    					<br/>
    					<label for="valor">Precio por clase sin IVA:</label> <input type="text" class="form-control  " name="valor" id="valor" required/> <div id="precioconiva"> </div>
    					<br/>
    					<input type="submit" class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="crear" value="Crear tarifa">
    				</fieldset>
    			</form>
                <br>
    			<button class=" anchoMax  PATEON btn btn-primary btn-block  RESET" onclick="location.href='tarifas.php'">Volver</button>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>