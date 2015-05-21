<?php 
 include ("./funciones/funciones.php");
$conexion=abre();
$nfactura=$_POST["nfactura"];
$producto=$_POST["producto"];


$conexion=abre();
$orden="select estado from facturas WHERE id_factura=".$nfactura.";";
$conexion->query($orden);
$chorizo = $conexion->query($orden);
$registro = $chorizo->fetch_array();

if($registro[0]==0){
    $orden="delete FROM lineas_factura  where producto=$producto and factura=$nfactura;";
	
	$conexion->query($orden);
fijartotal($conexion,$nfactura);
}else{
	$mensaje="Esta factura ya esta pagada y no se puede modificar";
}
header ("Location: tpv.php?nfactura=$nfactura&mensaje=$mensaje");
?>