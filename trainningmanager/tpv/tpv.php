<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();    
?>
<html>
<head>
<title>Tpv</title>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<meta charset='utf-8'>
<?php 

  $factura=$_POST['factura'];
  $nfactura=$_GET['nfactura'];
  $mensaje=$_GET['mensaje'];
  if($factura!=null){
    $nfactura=$factura;
  }
 


?>

</head>
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
	vertical-align: middle !important;
	background-color: #ffffff;
}	
thead td{
	background-color: #eeeeee;
}

</style>
<script type="text/javascript">
    function addproducto(){
        alertify.success("Producto añadido"); 
        return false;
    }
    function okconcep(){
        alertify.success("Concepto añadido"); 
        return false;
    }
    function descok(){
        alertify.success("Descuento aplicado"); 
        return false;
    }
    function errnocre(){
        alertify.error("No hay factura creada"); 
        return false;
    }
    function errcre(){
        alertify.error("Esta factura ya esta pagada y no se puede modificar"); 
        return false;
    }
    function eliminados(){
        alertify.error("Se han descartado los prouctos y los conceptos"); 
        return false;
    }
    function facturaok(){
        alertify.success("Factura pagada"); 
        return false;
    }
</script>
<body>
<?php menu();

if(isset($_POST["mensaje"])){
   echo "<script>new();</script>";
}
if(isset($_GET["mensaje"])){
  if($_GET["mensaje"]=="addproducto"){
   echo "<script type=text/javascript>addproducto();</script>";
  }
  if($_GET["mensaje"]=="okconcep"){
   echo "<script type=text/javascript>okconcep();</script>";
  }
  if($_GET["mensaje"]=="descok"){
   echo "<script type=text/javascript>descok();</script>";
  }
  if($_GET["mensaje"]=="errnocre"){
   echo "<script type=text/javascript>errnocre();</script>";
  }
  if($_GET["mensaje"]=="errcre"){
   echo "<script type=text/javascript>errcre();</script>";
  }
  if($_GET["mensaje"]=="eliminados"){
   echo "<script type=text/javascript>eliminados();</script>";
  }
 if($_GET["mensaje"]=="facturaok"){
   echo "<script type=text/javascript>facturaok();</script>";
  }

}
?>
<div id="control">
<div style="text-center"><h1>TPV</h1></div>
<div id="productos">
	<div style="text-center"><h2>Productos&nbsp;&nbsp;<img class="img-rounded" src='../iconos/producto.png'></h2></div>
	<form name="form1" method="post" action="anadir.php" >
	 <label for="sel1">Producto : </label>
	<?php 
	  include ("./funciones/funciones.php");
	  $conexion=abre();
	 listarproductos($conexion);
	?>
	<label for="sel1">Cantidad : </label>
	<input type="number" class="form-control" name="cantidad" required >
	<?php echo "<input type=hidden name=nfactura value=".$nfactura.">" ;?>
	<br/>
	<input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Agregar">
	<br/>
	<hr>
	</form>
	<?php imprimproductos($conexion,$nfactura);
	?>
</div>
<div id="otrosconceptos">
	<div style="text-center"><h2>Otros Conceptos&nbsp;&nbsp;<img class="img-rounded" src='../iconos/conceptos.png'></h2></div>
	<form name="form1" method="post" action="plibre.php" >
	 <label for="sel1">Concepto : </label>
	<input type="text" class="form-control" name="concepto" required maxlength="60">
	<label for="sel1">Importe a cobrar :</label>
	<input type="number" class="form-control" name="cantidad" required >
	<?php echo "<input type=hidden name=nfactura value=".$nfactura.">" ;?>
	<br/>
	<input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Añadir">
	<br/>
	<hr>
	</form>
	<?php imprimconceptos($conexion,$nfactura); ?>
</div>
<div id="descuento">
	<div style="text-center"><h2>Descuento&nbsp;&nbsp;<img class="img-rounded" src='../iconos/descuento.png'></h2></div>
	<form name="form1" method="post" action="descuento.php" >
	 <label for="sel1">% De descuento a aplicar: </label>
	<input type="number" class="form-control" name="descuento" required >
	<?php echo "<input type=hidden name=nfactura value=".$nfactura.">" ;?>
	<br/>
	<input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Aplicar">
	<br/>
	
	</form>
	<?php impritotales($conexion,$nfactura);?>

	<form name="form1" method="post" action="pagar.php" >
	<?php echo "<input type=hidden name=nfactura value=".$nfactura.">" ;?>
	<br/>
	<hr>
	<input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Pagar">
	<br/>
	</form>
</div>
<form name="form1" method="post" action="./facturas/facturas/facturas.php" >
<?php echo "<input type=hidden name=nfactura value=".$nfactura.">" ;?>
<input type="hidden" name="generar_factura" value="true">
<input type="submit" class=" anchoMax  PATEON btn btn-warning btn-block  RESET" name="Submit" value="Imprimir PDF">
</form>
</br>
<form name="form1" method="post" action="descartar.php" >
<?php echo "<input type=hidden name=nfactura value=".$nfactura.">";
cierra($conexion); ?>
<input type="submit" class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="Submit" value="Descartar">
<br/>
</form>
<form name="form1" method="post" action="tpv.php" >
<input type=hidden name="mensaje" value="nueva">
<input type="submit" class=" anchoMax  PATEON btn btn-info btn-block  RESET" name="Submit" value="Nueva factura">
<br/>
<br/>
</form>

</body>
</html>
