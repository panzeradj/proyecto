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
				if(isset($_POST['eliminartarifa'])){
					$tarifa=$_POST['tarifa'];
					$listacuantos=ordensql("SELECT count(*) FROM clientes cl, tarifas t, contratos co WHERE cl.id_cliente=co.cliente and t.id_tarifa=co.tarifa and co.tarifa=".$tarifa." and fecha_fin=0000-00-00 and cl.activo=1");
					$resultadocuantos=$listacuantos->fetch_array();
					$clientes=$resultadocuantos[0];
					$listanombre=ordensql("SELECT nombre FROM tarifas WHERE id_tarifa=".$tarifa);
					$resultadonombre=$listanombre->fetch_array();
					?>
					<div style="text-center"><h2>Eliminar tarifa <?php echo $resultadonombre[0] ?></h2></div>
					<?php
					if ($clientes!=0){ ?>					
						<p>Antes de eliminar la tarifa debes cambiar el contrato de los siguientes clientes: </p>
						<ul>
						<?php 
						$lista=ordensql("SELECT cl.nombre, cl.apellido FROM clientes cl, tarifas t, contratos co WHERE cl.id_cliente=co.cliente and t.id_tarifa=co.tarifa and co.tarifa=".$tarifa." and fecha_fin=0000-00-00 and cl.activo=1");
						while ($resultado=$lista->fetch_array()){ ?>
							<li><?php echo $resultado[0]." ".$resultado[1];?></li>
						<?php } ?>
						</ul>					
					<?php }else{ ?>
						<p>No hay ningún cliente vinculado a esta tarifa, puedes eliminarla. Ten en cuenta que este proceso es irreversible.</p>
						<form name="datostarifa" action="compruebatarifa.php" method="post">
							<input type="hidden" name="tarifa" value="<?php echo $tarifa;?>"/>
							<input type="submit" class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="eliminar" value="Sí, la quiero eliminar"/>
						</fieldset>
					</form>
					<?php } ?>
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