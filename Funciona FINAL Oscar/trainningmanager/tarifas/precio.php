<?php 
	session_start();
	include("../php/funciones/function.php");
	$lista=ordensql("select * from iva;");
	while ($resultado=$lista->fetch_array()){
		$iva=$resultado[0];
	}

	echo $iva;
?>