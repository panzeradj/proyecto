<?php
	include("php/funciones/function.php");
	$nombre=$_POST['nombre'];
	$movil=$_POST['movil'];
	$otro=$_POST['otro'];
	$mail=$_POST['mail'];
	$genero=$_POST['genero'];
	$date=$_POST['date'];
	$direccion=$_POST['direccion'];
	$poblacion=$_POST['poblacion'];
	$provincia=$_POST['provincia'];
	$codPostal=$_POST['codPostal'];
	$dni=$_POST['dni'];
	$objetivos=$_POST['objetivos'];
	$comentarios=$_POST['comentarios'];
	$patologias=$_POST['patologias'];
	$medicacion=$_POST['medicacion'];

	//Aqui validamos lo que mandamos 
	//Insercción el la bbdd si todo esta correcto
	$sql="insert into clientes(nombre,dni,telefono,telefono2,email,genero,fecha_nacimiento,objetivos,comentarios,patologias,medicacion) values('".$nombre."','".$dni."','".$movil."','".$otro."','".$mail."','".$genero."','".$date."','".$objetivos."','".$comentarios."','".$patologias."','".$medicacion."');";
	
	ordensqlupdate($sql);

	$sql="select * from clientes where nombre='".$nombre."' and dni='".$dni."' and fecha_nacimiento='".$date."'";

	$cho=ordensql($sql);
	$bandera=false;
	if($cho!=false)
	{
		while ($regi = $cho->fetch_array()) {
			$bandera=true;
		}
	}
	if($bandera)
	{
		echo "Creacion de cliente correcta";
		header("refresh:3;url=clientes.php");
	}
	else
	{
		echo "Error en la creación de usuario";
		header("refresh:3;url=clientes.php");
	}
?>