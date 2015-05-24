<?php 
session_start();
	 include("../php/funciones/function.php");
	
	$id_cliente=$_POST['cliente'];
	$estado=$_POST['estado'];

	$sql="update clientes set activo=".$estado." where id_cliente=".$id_cliente;
	ordensqlupdate($sql);
	echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clientes.php">';
?>
