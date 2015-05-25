<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();    
?>
<html>
<head>
<meta charset='utf-8'>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<meta charset='utf-8'>
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
#icono{
  width: 20px;
  height: 50px;
}
</style>
<script type="text/javascript">
    function okregpro(){
        alertify.success("Producto registrado"); 
        return false;
    }
    function okbogpro(){
        alertify.error("Producto Eliminado"); 
        return false;
    }
    function almacen(){
        alertify.success("Almacen actualizado"); 
        return false;
    }
</script>
  
</head>

<body>
  <?php menu();?>
<?php 
if(isset($_GET["mensaje"])){
  if($_GET["mensaje"]=="okregpro"){
   echo "<script type=text/javascript>okregpro();</script>";
  }
  if($_GET["mensaje"]=="okbogpro"){
   echo "<script type=text/javascript>okbogpro();</script>";
  }
  if($_GET["mensaje"]=="almacen"){
   echo "<script type=text/javascript>almacen();</script>";
  }
}
?>
<div id="control">
<div style="text-center"><h1>Registro Producto&nbsp;&nbsp;<img class="img-rounded" src="../iconos/producto.png"></h1></div>
<form name="form1" method="post" action="verificarpro.php" >
  
    <label for="sel1">Nombre : </label>
    <input type="text" class="form-control" name="nombre" required maxlength="45">
    <br/>

    <label for="sel1">Descrición: </label>
    <input type="text" class="form-control" name="des" maxlength="45" required>
    <br/>

    <label for="sel1">Proveedor: </label>
    <?php
      include ("./funciones/funciones.php");
      $conexion=abre();
      listarproveedores($conexion);
     ?> 
    <br/>

    <label for="sel1">Precio sin I.V.A.: </label>
    <input type="number" class="form-control" name="precio" required  ><br/>
    <input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Registrar Producto">

    <br/>
</form>
<hr>
<div style="text-center"><h1>Añadir al almacén&nbsp;&nbsp;<img class="img-rounded" src="../iconos/almacen.png"></h1></div>
<form name="form1" method="post" action="almacen.php">
<?php    
   listarproductos($conexion);
   ?> 
   <br/><input type="number" class="form-control" name="cantidad" required ><br/>
<br/><input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Añadir"> </p>
</form>
<hr>
<div style="text-center"><h1>Ver stock&nbsp;&nbsp;<img class="img-rounded" src="../iconos/stock.png"></h1></div>
<form name="form1"  method="post" action="stock.php">
<?php    
   listarproductos($conexion);
   ?> 
<br/><input type="submit" class=" anchoMax  PATEON btn btn-info btn-block  RESET" name="Submit" value="Ver"> </p>
</form>
<hr>
<div style="text-center"><h1>Borrado de productos&nbsp;&nbsp;<img class="img-rounded" src='../iconos/borrar.png'></h1></div>
<form name="form1" method="post" action="borradoproductos.php">
<?php    
   listarproductos($conexion);
   ?> 
<br/><input type="submit" class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="Submit" value="Eliminar producto"> </p><br/><br/>
</form>
</div>
</body>
</html>
