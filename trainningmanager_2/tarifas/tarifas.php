<?php

?>
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
</head>
<body>
    <?php menu();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <h3>TARIFAS</h3>
            <br/>
            <button onclick="location.href='nuevatarifa.php'">Crear nueva tarifa</button>
            <br/>
            <br/>
			<table>
			<tr><th class="titulo"><h4>Nombre</h4></th> 
			<th class="titulo"><h4>Descripción</h4></th> 
			<th class="titulo"><h4>Precio sin IVA</h4></th>
			<th class="titulo"><h4>Precio con IVA</h4></th></tr>		
			<?php
			$listatarifas=ordensql("select * from tarifas;");
			$lista=ordensql("select * from iva;");
			$resultado=$lista->fetch_array();
			$iva=$resultado[0];
			while ($resultadotarifas=$listatarifas->fetch_array()){
				$listaprecio=ordensql("select valor_sin_iva from precios_tarifas where tarifa=".$resultadotarifas[0]." order by fecha_inicial desc;");
				$resultadoprecio=$listaprecio->fetch_array();
				?>
				<tr><td> <?php echo $resultadotarifas[1]?></td>
				<td> <?php echo $resultadotarifas[2]?></td>
				<td> <?php echo number_format($resultadoprecio[0],2)?>€</td>
				<td> <?php echo number_format($resultadoprecio[0]*(($resultado[0]+100)/100),2)?>€</td>
				</tr><?php
			}
			?>
			</table>
			<br/>			
			<form name="cambiotarifa" action="cambiartarifa.php" method="post">
				<select name="tarifa" size="1" required>
    				<option value="">Elige una tarifa para modificar</option>
    				<?php			
    				$lista=ordensql("select id_tarifa, nombre from tarifas order by 1;");
    				while ($resultado=$lista->fetch_array()){?>
                        <option value='<?php echo $resultado[0];?>'><?php echo $resultado[1];?></option>
    				<?php }?>				
				</select>
				<input type="submit" name="cambiartarifa" value="Cambiar tarifa" />
			</form>
			<br/>
			<br/>
			<hr/>
			<h3>IVA</h3>
			<br/>
			El IVA actualmente es del <?php echo $iva; ?>%.
			<br/>
			<br/>
			<form name="cambioiva" action="cambiariva.php" method="post"> 
				Introduce el nuevo valor: <input type="text" name="iva" required/>
				<input type="submit" name="cambiariva" value="Cambiar IVA" />
			</form>
			<br/>
			<br/>		
            </div>
        </div>
    </div>
</html>