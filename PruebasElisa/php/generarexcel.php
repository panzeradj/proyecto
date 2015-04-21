<?php
include("funciones/function.php");
$fp = fopen("datos.csv","w");
$salida_csv = "Nombre,Genero,edad,horas totales,tarifa,fecha alta,fecha baja,domiciliado,telefono,email";
$salida_csv .= "\n";
$listacliente=ordensql("SELECT nombre, genero, fecha_alta, fecha_baja, domiciliado, telefono, email,id_cliente from clientes;");
while ($resultado=$listacliente->fetch_array()){
	if($resultado[4]==0){
		$domiciliado='NO';
	}
	if($resultado[4]==1){
		$domiciliado='SI';
	}
	$listatarifa=ordensql("SELECT nombre from contratos, tarifas where cliente=".$resultado[7].";");
	$resultadotarifa=$listatarifa->fetch_array();
	$salida_csv .= $resultado[0].", "; //nombre
	$salida_csv .= $resultado[1].", "; //genero
	$salida_csv .= /*$resultado[1].*/"Edad, "; //edad
	$salida_csv .= /*$resultado[1].*/"Horas totales, "; //horas que ha hecho a esta fecha
	$salida_csv .= $resultadotarifa[0].", "; //nombre de la tarifa actual
	$salida_csv .= $resultado[2].", "; //fecha en la que se dio de alta
	$salida_csv .= $resultado[3].", "; //fecha en la que se dio de baja
	$salida_csv .= $domiciliado.", "; //si está domiciliado
	$salida_csv .= $resultado[5].", "; //teléfono 
	$salida_csv .= $resultado[6]." "; //email
	$salida_csv .= "\n";
}

fwrite($fp,$salida_csv); 
fclose($fp);
header("location:facturacion.php?generado=s");
?>