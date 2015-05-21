<?php
session_start();
//comprueba();
	include("../php/funciones/function.php");
	$nombre=$_POST['nombre'];
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
	$cp=$_POST['codPostal'];
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

		$sql="insert into clientes(nombre,dni,telefono,telefono2,email,genero,fecha_nacimiento,objetivos,comentarios,patologias,medicacion, domiciliado, apellido,direccion , poblacion , provincia, c_p) values('".$nombre."','".$dni."','".$movil."','".$otro."','".$mail."','".$genero."','".$date."','".$objetivos."','".$comentarios."','".$patologias."','".$medicacion."',".$dom.",'".$apellido."','".$direccion."' , '".$poblacion."', '".$provincia."', '".$cp."');";
	//echo $sql;
		ordensqlupdate($sql);
		//creamos la factur
		

		$sql="select id_cliente from clientes where nombre='".$nombre."' and dni='".$dni."' and fecha_nacimiento='".$date."'";
		//echo $sql;
		$cho=ordensql($sql);
		$bandera=false;
		if($cho!=false)
		{
			while ($regi = $cho->fetch_array()) {
				$bandera=true;
				$id_cli=$regi[0];
			}

		}
		$sql="insert into contratos(cliente, tarifa,fecha_inicio) values(".$id_cli.",".$id_tarifa.",now())";
		//echo $sql;
		ordensqlupdate($sql);
	}
	else{
		$bandera=false;
	}

	if($bandera)
	{
		//echo "Creacion de cliente correcta";
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clientes.php?mensaje=okCrear">';
		//header("refresh:2;url=http://acwellness.es/trainningmanager/clientes/clientes.php");
	}
	else
	{
		//echo "Error en la creación de usuario";
		echo '<meta http-equiv="refresh" content="0; url=http://acwellness.es/trainningmanager/clientes/clientes.php?mensaje=errorCrear">';
	}?>