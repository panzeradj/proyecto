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

function is_valid_dni_nie($string) {
    if (strlen($string) != 9 ||
        preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1) {
        return false;
    }

    $map = 'TRWAGMYFPDXBNJZSQVHLCKE';

    list(, $number, $letter) = $matches;

    return strtoupper($letter) === $map[((int) $number) % 23];
}	
	if(is_valid_dni_nie($dni)==1)
	{

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
		
	}
	else{
		$bandera=false;
		echo"hola mundo";
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