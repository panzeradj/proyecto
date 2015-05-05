
<?php 
include("../php/funciones/function.php");
if (isset($_POST['crear'])||isset($_POST['cambiar'])){
$nombreahora=$_POST['nombre'];
$descripcionahora=$_POST['descripcion'];
$valorahora=$_POST['valor'];			
if (isset($_POST['crear'])){
	ordensqlupdate("INSERT into tarifas (nombre, descripcion) VALUES ('".$nombreahora."', '".$descripcionahora."');");
	$listaid=ordensql("SELECT MAX(id_tarifa) from tarifas;");
	$resultadoid=$listaid->fetch_array();
	$id=$resultadoid[0];
	ordensqlupdate("INSERT into precios_tarifas (tarifa, fecha_inicial, valor_sin_iva) VALUES (".$id.",now(), '".$valorahora."');");
}
if (isset($_POST['cambiar'])){
	$idanterior=$_POST['anterior'];
	$lista=ordensql("SELECT valor_sin_iva from precios_tarifas where tarifa=".$idanterior." order by fecha_inicial desc;");
	$resultado=$lista->fetch_array();
	$valoranterior=$resultado[0];				
	ordensqlupdate("UPDATE tarifas set descripcion='".$descripcionahora."', nombre='".$nombreahora."' where id_tarifa='".$idanterior."';");
	if($valoranterior!=$valorahora){
		ordensqlupdate("INSERT into precios_tarifas (tarifa, fecha_inicial, valor_sin_iva) VALUES (".$idanterior.",now(), '".$valorahora."');");				
	}
}
header("location:tarifas.php"); 
}else{
header("Location:tarifas.php");
}
?>
		