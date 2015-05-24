<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	//cabecera();
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$movil=$_POST['movil'];
	$otro=$_POST['otro'];
	$mail=$_POST['mail'];
	$direccion=$_POST['direccion'];
	$poblacion=$_POST['poblacion'];
	$provincia=$_POST['provincia'];
	$cp=$_POST['codPostal'];
	$dni=$_POST['dni'];
	$objetivos=$_POST['objetivos'];
	$comentarios=$_POST['comentarios'];
	$patologias=$_POST['patologias'];
	$medicacion=$_POST['medicacion'];

	$cliente=$_POST['cliente'];

	$sql="update clientes set  nombre='".$nombre."' ,  apellido='".$apellido."' ,telefono='".$movil."',telefono2='".$otro."',email='".$mail."',direccion='".$direccion."',poblacion='".$poblacion."',provincia='".$provincia."',c_p='".$cp."',dni='".$dni."',objetivos='".$objetivos."',comentarios='".$comentarios."',patologias='".$patologias."',
	medicacion='".$medicacion."' where id_cliente=".$cliente ;

	ordensqlupdate($sql);
	$sql="select id_cliente from clientes where nombre='".$nombre."' and  apellido='".$apellido."' and telefono='".$movil."' and telefono2='".$otro."' and email='".$mail."'and direccion='".$direccion."' and poblacion='".$poblacion."' and provincia='".$provincia."' and c_p='".$cp."' and dni='".$dni."' and objetivos='".$objetivos."' and comentarios='".$comentarios."' and patologias='".$patologias."' and medicacion='".$medicacion."'";
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

		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=okcambio">';
	}else{
	 	echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clienteI.php?cliente='.$cliente.'&mensaje=errcambio">';
	}
?>
