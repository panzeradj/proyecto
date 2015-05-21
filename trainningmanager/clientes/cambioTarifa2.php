<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	//cabecera();
	if(strcmp($_POST['dom'],'si')==0){
		$dom=1;
	}else{
		$dom=0;
	}
	$apellido=$_POST['apellido'];
	$movil=$_POST['movil'];
	$otro=$_POST['otro'];
	$mail=$_POST['mail'];
	$genero=$_POST['genero'];
	$date=$_POST['date'];
	$id_tarifa=$_POST['tarifa'];
	$direccion=$_POST['direccion'];
	$poblacion=$_POST['poblacion'];
	$provincia=$_POST['provincia'];
	$codPostal=$_POST['codPostal'];
	$dni=$_POST['dni'];
	$objetivos=$_POST['objetivos'];
	$comentarios=$_POST['comentarios'];
	$patologias=$_POST['patologias'];
	$medicacion=$_POST['medicacion'];


	$cliente=$_GET['cliente'];
	$tarifa=$_GET['tarifa'];
	$sql="update contratos set tarifa=".$tarifa." where cliente=".$cliente ;
	//echo $sql;
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
		//echo '<script>alert("CAMBIO CORRECTO");</script>';
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=okcambio">';
	}else{
		//echo '<script>alert("FALLO EN EL CAMBIO");</script>';
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=errcambio">';
	}
?>
