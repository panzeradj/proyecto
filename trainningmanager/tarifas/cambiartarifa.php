<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../php/funciones/function.php");
    cabecera();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <meta name="author" content="Oscar Romero">
    <title>AC Wellness</title>   
	<script src="../js/actualizarprecio.js" language="JavaScript"></script>
</head>
<body>
    <?php menu();
    ?>
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
			$listaiva=ordensql("select * from IVA;");
			while ($resultado=$listaiva->fetch_array()){
				$iva=$resultado[0];
			}
			?>
			<form name="datostarifa" action="compruebatarifa.php" method="post">
				<fieldset>
					<label for="nombre">Nombre:</label> <input type='text' name='nombre' value="<?php echo $nombre;?>" required/>
					<br/>
					<label for="descripcion">Descripción de la tarifa:</label> <input type='fieldtext' name='descripcion' value="<?php echo $descripcion;?>" required/>
					<br/>
					<label for="valor">Precio por clase sin IVA:</label> <input type='text' name='valor' value="<?php echo $valor;?>" id="valor" required/> <div id="precioconiva"> </div>
					<br/>
					<input type="hidden" name="anterior" value="<?php echo $tarifa;?>"/>
					<input type="submit" name="cambiar" value="Guardar cambios"/>

				</fieldset>
			</form>
			<button onclick="location.href='tarifas.php'">Volver</button>
			<?php
			}else{
				header("Location:tarifas.php");
			}
			?>
            </div>
        </div>
    </div>
</html>