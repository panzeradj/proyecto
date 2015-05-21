<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
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
	<script src="../js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu();
    ?>
    <div id="control">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	            <?php
				if(isset($_POST['cambiartarifa'])){
				$tarifa=$_POST['tarifa'];
				$lista=ordensql("select nombre, descripcion from tarifas where id_tarifa=".$tarifa.";");
				$listavalor=ordensql("select valor_sin_iva from precios_tarifas where tarifa=".$tarifa." order by fecha_inicial desc;");
				while ($resultado=$lista->fetch_array()){
					$resultadovalor=$listavalor->fetch_array();
					$id=$tarifa;
					$nombre=$resultado[0];
					$descripcion=$resultado[1];
					$valor=$resultadovalor[0];
				}

				?>
				<div style="text-center"><h2>Cambiar tarifa</h2></div>
				<form name="datostarifa" action="compruebatarifa.php" method="post">
					<fieldset>
						<label for="nombre">Nombre:</label> <input type='text' class="form-control  " name='nombre' value="<?php echo $nombre;?>" required/>
						<br/>
						<label for="descripcion">Descripción de la tarifa:</label> <input type='fieldtext' class="form-control  " name='descripcion' value="<?php echo $descripcion;?>" required/>
						<br/>
						<label for="valor">Precio por clase sin IVA:</label> <input type='text' class="form-control  " name='valor' value="<?php echo $valor;?>" id="valor" required/> <div id="precioconiva"> </div>
						<br/>
						<input type="hidden" name="anterior" value="<?php echo $tarifa;?>"/>
						<input type="submit" class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="cambiar" value="Guardar cambios"/>
					</fieldset>
				</form>
				<br/>
				<button class=" anchoMax  PATEON btn btn-primary btn-block  RESET" onclick="location.href='tarifas.php'">Volver</button>
				<?php
				}
				?>
	            </div>
	        </div>
	    </div>
	</div>
</html>