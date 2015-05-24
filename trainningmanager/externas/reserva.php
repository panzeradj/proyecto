<?php
require_once("basededatos.php");
require_once("config.php");

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$horas1 = explode( ':', $_POST['horas'] );
$horas2 = $horas1[0].','.$horas1[1];
//echo $horas2;

$dia1 = explode( '/', $_POST['dia'] );
$dia2 = $dia1[2].'/'.$dia1[1].'/'.$dia1[0];
//echo $dia2;


$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
$orden = "INSERT INTO externas(id_loca,cod_cliente,horas,precio,fecha,hora) VALUES (".$_POST['local'].",".$_POST['cliente'].",'".$horas2."',".$_POST['precio'].",'".$dia2."','".$_POST['hora']."')";
consulta($orden,$conexion);
header("location:reservaexterna.php?mensaje=bien");
?>