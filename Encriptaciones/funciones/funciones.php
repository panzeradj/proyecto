<?php
	//session_start();
	function conexion($ip,$usuario,$contrasena,$bd){
		$conexion = new mysqli($ip,$usuario,$contrasena,$bd);
		$conexion->SET_CHARSET("utf8");
		if(mysqli_connect_error()){
		 	echo 'Error de conexión a la base de datos';
		}else{
			// echo "SI";
			return $conexion;
		}
	}
	function consulta($consulta,$conexion){
		// Recibe: un string con el SQL y la conexion
		// Devuelve: un resultset
		// echo "Entrada funcion consulta";
		$resultado = $conexion->query($consulta);
		return $resultado;
	}
	function cantdatos($resconsult){
		// Recibe un resultset
		// Devuelve: nuemero de filas del resultset
		//echo "Entrada funcion cantdatos";
		$respuesta = $resconsult->num_rows;
		return $respuesta;
	}
	
	//require_once("funciones/funciones.php");
?>
