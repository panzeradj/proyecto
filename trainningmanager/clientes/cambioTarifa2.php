<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	//cabecera();
 //	var_dump($_GET['dom']);
	if(strcmp($_GET['dom'],'si')==0){
		$dom=1;
	}else{
		$dom=0;
	}

	$cliente=$_GET['cliente'];
	$tarifa=$_GET['tarifa'];
	$sql="update contratos set tarifa=".$tarifa.", domiciliado=".$dom." where cliente=".$cliente ;
//	echo $sql;
	ordensqlupdate($sql);
	$sql="update clientes set domiciliado=".$dom. " where id_cliente=".$cliente;
	ordensqlupdate($sql);

	$sql="select cliente from contratos where cliente=".$cliente." and tarifa=".$tarifa;
	//echo $sql;
	$cho=ordensql($sql);
	$ban=false;
	if($cho!=false)
	{
		while ($regi = $cho->fetch_array()) {
			$ban=true;

		}
	}
	if($ban){
		$sql="select id_cliente from clientes where id_cliente=".$cliente." and domiciliado=".$dom;
	//	echo $sql;
		$cho=ordensql($sql);
		$ban=false;
		if($cho!=false)
		{
			while ($regi = $cho->fetch_array()) {
				$ban=true;

			}
		}
	}
	if($ban){

		echo '<meta http-equiv="refresh" content="0; url=http://localhost/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=okcambio">';
	}else{

		echo '<meta http-equiv="refresh" content="0; url=http://localhost/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=errcambio">';
	}
?>
