<?php
require_once("config.php");

function compruebaNotificaciones(){
	$vuelta = array();
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT * FROM clientes";
	$resultado = consulta($orden,$conexion);
	if(!($resultado==false)){
		$bandera = false;
		while($registro = $resultado->fetch_array(MYSQLI_ASSOC)){
			$porciones = explode("-", $registro['fecha_nacimiento']);
  			$Fecha=getdate(); 
			$Mes2=$Fecha["mon"]; 
			$Dia2=$Fecha["mday"];

			if($porciones[1]==$Mes2){
				if($porciones[2]==$Dia2){
					array_push($vuelta,$key2 = array(
						"nombre" => $registro['nombre'],
						"apellido" => $registro['apellido'],
						"email" => $registro['email']
						));
					$bandera = true;
				}
			}
		}
		if($bandera==false){
			return $vuelta;
		}else{
			return $vuelta;
		}
	}else{
		return "no";
	}
}
?>