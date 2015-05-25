<html>
<head>
<title>Stock</title>
<meta charset='utf-8'>
 
</head>

<body>
	<h1 align="center">Stock</h1>
<?php 
include ("./funciones/funciones.php");
	$producto=$_POST['producto'];
	$conexion=abre();
	//echo $producto;

	$existencias=totalstock($conexion,$producto);
	$nombre=nombreproducto($conexion,$producto);
	
?>
<h3 align="center"> En el almacen quedan: <?php echo $existencias." ".$nombre; ?></h2>
<h2 align="center">Regsitro de compra y venta</h2>
<?php
	vermovimientos($conexion,$producto);

?>
<h1 align="center">Ver otro producto</h1>
<form name="form1" method="post" action="stock.php">
<?php    
   listarproductostock($conexion,$producto);
   ?> 
<p><input type="submit" name="Submit" value="Ver"> </p>
</form>

<form name="form1" method="post" action="registroproducto.php">

<p><input type="submit" name="Submit" value="Ir a productos"> </p>
</form>
</body>
</html>