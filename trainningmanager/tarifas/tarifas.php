<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();    
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible content=IE=edge">
    <meta name="viewport content=width=device-width, initial-scale=1">
    <meta name="description" content="AC Wellness">
    <link rel="icon" type="image/png" href="imagenes/ico.png" />
    <title>AC Wellness</title>

    <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
    <?php
    if(isset($_GET["mensaje"])){
        if($_GET['mensaje']=="okiva"){
            $mensaje = "El iva se a cambiado a ".$_GET['iva']."%";
        }
    }
    ?>
    <script type="text/javascript">
        function okiva(){
            alertify.success("<?php echo $mensaje; ?>"); 
            return false;
        }
        function erroriva(){
            alertify.error("Ha ocurrido un error inesperado"); 
            return false;
        }
        function okmodifica(){
            alertify.success("La tarifa ha sido modificada"); 
            return false;
        }
        function okcrea(){
            alertify.success("La tarifa ha sido creada"); 
            return false;
        }
        function errortarifa(){
            alertify.error("Ha ocurrido un error inesperado"); 
            return false;
        }
        function eliminada(){
            alertify.error("La tarifa ha sido eliminada"); 
            return false;
        }
    </script>
    <style type="text/css">
    .titulo{
        background-color: #eeeeee;
    } 
    td{
        background-color: #ffffff;
        vertical-align: middle !important;
    }  
</style>

</head>
<body>
    <?php 
    menu();

    if(isset($_GET["mensaje"])){
        if($_GET["mensaje"]=="okiva"){
    	   echo "<script type=text/javascript>okiva();</script>";
        }
        if($_GET["mensaje"]=="okcambio"){
           echo "<script type=text/javascript>okmodifica();</script>";
        }
        if($_GET["mensaje"]=="okcrea"){
           echo "<script type=text/javascript>okcrea();</script>";
        }
        if($_GET["mensaje"]=="errortarifa"){
           echo "<script type=text/javascript>errortarifa();</script>";
        }
        if($_GET["mensaje"]=="erroriva"){
           echo "<script type=text/javascript>erroriva();</script>";
        }
        if($_GET["mensaje"]=="eliminada"){
           echo "<script type=text/javascript>eliminada();</script>";
        }
	}

	?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div style="text-center"><h2>Tarifas&nbsp;&nbsp;<img class="img-rounded" src='../iconos/tarifas.png'></h2></div>
                <br/>
                <button class=" anchoMax  PATEON btn btn-success btn-block  RESET" onclick="location.href='nuevatarifa.php'">Crear nueva tarifa</button>
                <br/>
                <br/>
    			<table class='table table-hover'>
    			<tr><th class="titulo"><h4>Nombre</h4></th> 
    			<th class="titulo"><h4>Descripción</h4></th> 
    			<th class="titulo"><h4>Precio sin IVA</h4></th>
    			<th class="titulo"><h4>Precio con IVA</h4></th>
    			<th class="titulo"><h4>Acciones</h4></th></tr>		
    			<?php
    			$listatarifas=ordensql("SELECT * from tarifas where activa=1 order by nombre ;");
    			$lista=ordensql("SELECT * from iva;");
    			$resultado=$lista->fetch_array();
    			$iva=$resultado[0];
    			while ($resultadotarifas=$listatarifas->fetch_array()){
    				$listaprecio=ordensql("SELECT valor_sin_iva from precios_tarifas where tarifa=".$resultadotarifas[0]." order by fecha_inicial desc;");
    				$resultadoprecio=$listaprecio->fetch_array();
    				?>
    				<tr><td> <?php echo $resultadotarifas[1]?></td>
    				<td> <?php echo $resultadotarifas[2]?></td>
    				<td style="text-align:right"> <?php echo number_format($resultadoprecio[0],2)?>€</td>
    				<td style="text-align:right"> <?php echo number_format($resultadoprecio[0]*(($resultado[0]+100)/100),2)?>€</td>
    				<td style="text-align:right"> 
    					<form name="cambiartarifa" action="cambiartarifa.php" method="post" style="display:inline-block">
	                    	<input type="hidden" name="tarifa" value="<?php echo $resultadotarifas[0];?>"/>
	                    	<input type="submit" class=" anchoMax  PATEON btn btn-warning  RESET" name="cambiartarifa" value="Cambiar" />
	                	</form>
	    				<form name="eliminartarifa" action="eliminartarifa.php" method="post" style="display:inline-block">
	                    	<input type="hidden" name="tarifa" value="<?php echo $resultadotarifas[0];?>"/>
	                    	<input type="submit" class=" anchoMax  PATEON btn btn-danger  RESET" name="eliminartarifa" value="Eliminar" />
	                	</form>
	                </td></tr><?php
    			}
    			?>
    			</table>
    			<br/>			
    			<hr/>
    			<div style="text-center"><h2>IVA&nbsp;&nbsp;<img class="img-rounded" src='../iconos/iva.png'></h2></div>
    			<br/>
    			El IVA actualmente es del <?php echo $iva; ?>%.
    			<br/>
    			<br/>
    			<form name="cambioiva" action="cambiariva.php" method="post"> 
    				Introduce el nuevo valor: <input type="text" name="iva" class="form-control  " required/><br>
    				<input type="submit" class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="cambiariva" value="Cambiar IVA" />
    			</form>
    			<br/>
    			<br/>		
                </div>
            </div>
        </div>
    </div>
   </body>
</html>