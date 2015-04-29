<?php
if(isset($_POST['cambiariva'])) {
	include("funciones/function.php");
	$ivaS=$_POST['iva'];
	$iva=(double)$ivaS;
	if($iva!=0){
		ordensqlupdate("DELETE from iva;");
        ordensqlupdate("INSERT into iva (iva) VALUES (".$iva.");");
	}
}
header("Location:tarifas.php");
?>
		