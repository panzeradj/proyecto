<?php
include("../php/funciones/function.php"); 
comprueba();
if($_POST['iva']>=0 && is_numeric($_POST['iva'])){
	if(isset($_POST['cambiariva'])) {
		include ('../Mobile-Detect/Mobile_Detect.php');
		$ivaS=$_POST['iva'];
		$iva=(double)$ivaS;
		if($iva!=0){
			ordensqlupdate("DELETE from iva;");
	        ordensqlupdate("INSERT into iva (iva) VALUES (".$iva.");");
		}
	}
	header("Location:tarifas.php?mensaje=okiva&iva=".$ivaS."");
}else{
	header("Location:tarifas.php?mensaje=erroriva");
}
?>
		