<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();    
?>
<html>
<head>
<meta charset='utf-8'>
 <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<style type="text/css">
#control{
  width: 50em;
}
hr {
  width: 100%;
  height: 2px;
  margin-left: auto;
  margin-right: auto;
  background-color:#1D99D6;
  color:#FF0066;
  border: 0 none;
}
td{
  text-align: center;
  background-color: #ffffff;
} 
thead td{
  background-color: #eeeeee;
}
</style>
<script type="text/javascript">
    function okprov(){
        alertify.success("Proveedor registrado"); 
        return false;
    }
    function errprov(){
        alertify.error("El Proveedor ya existe"); 
        return false;
    }
    function okborraprov(){
        alertify.error("Proveedor Eliminado"); 
        return false;
    }
</script>
</head>

<body>
<?php menu();?>
<div id="control">
<div style="text-center"><h1>Stock&nbsp;&nbsp;<img class="img-rounded" src="../iconos/stock.png"></h1></div>
<?php 
include ("./funciones/funciones.php");
	$producto=$_POST['producto'];
	$conexion=abre();
	//echo $producto;

	$existencias=totalstock($conexion,$producto);
	$nombre=nombreproducto($conexion,$producto);
	
?>
<div style="text-center"><h3> En el almacen quedan: <?php echo $existencias." ".$nombre; ?></h2></div>
<div style="text-center"><h2>Regsitro de compra y venta</h2></div>
<?php
	vermovimientos($conexion,$producto);

?><hr>
<div style="text-center"><h1>Ver otro producto&nbsp;&nbsp;<img class="img-rounded" src="../iconos/producto.png"></h1></div>
<form name="form1" method="post" action="stock.php">
<?php    
   listarproductostock($conexion,$producto);
   ?> 
<br/><input type="submit" class=" anchoMax  PATEON btn btn-info btn-block  RESET" name="Submit" value="Ver"> </p>
</form>

<form name="form1" method="post" action="registroproducto.php">

<p><input type="submit" class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="Submit" value="Volver a productos"> </p>
</form>
</body>
</html>