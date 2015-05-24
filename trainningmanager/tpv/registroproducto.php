<html>
<head>
<title>Registro Producto</title>
<meta charset='utf-8'>
 
  
</head>

<body>
<?php 
$mensaje=$_GET["mensaje"];
echo $mensaje;
?>
<header> 
<h1 align="center">Registro Producto</h1>

</header> <article> 
<form name="form1" method="post" action="verificarpro.php" >
  
   <p>Nombre : 
    <input type="text" name="nombre" required maxlength="45">
  </p>
  <p>Descrición: 
    <input type="text" name="des" maxlength="45" required>
    <br/>
  </p>
  <p>Proveedor: 
  <?php
    include ("./funciones/funciones.php");
    $conexion=abre();
    listarproveedores($conexion);
   ?> 
    <br/>
  </p>
  <p>Precio sin I.V.A.: 
    <input type="number" name="precio" required  >
  </p>
  
  
    <input type="submit" name="Submit" value="Registrar Producto">
  </p>
  <br/>
</form>

<h1 align="center">Añadir al almacén</h1>
<form name="form1" method="post" action="almacen.php">
<?php    
   listarproductos($conexion);
   ?> 
   <input type="number" name="cantidad" required >
<p><input type="submit" name="Submit" value="Añadir"> </p>
</form>

<h1 align="center">Ver stock</h1>
<form name="form1" method="post" action="stock.php">
<?php    
   listarproductos($conexion);
   ?> 
<p><input type="submit" name="Submit" value="Ver"> </p>
</form>

<h1 align="center">Borrado de productos</h1>
<form name="form1" method="post" action="borradoproductos.php">
<?php    
   listarproductos($conexion);
   ?> 
<p><input type="submit" name="Submit" value="Eliminar producto"> </p>
</form>
</article> 

</body>
</html>
