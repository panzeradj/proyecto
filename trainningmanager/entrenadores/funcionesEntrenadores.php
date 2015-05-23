<?php
require_once("basededatos.php");
require_once("config.php");
require_once("email.php");

function listarEntrenadores(){
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT * FROM entrenadores";
	$resultadoInfo = consulta($orden,$conexion);
	$cuanto = cantdatos($resultadoInfo);
	if($cuanto>=1){

		echo "<table class='table table-hover'>";
		echo "<thead>
	        <tr>
	            <th>Usuario</th>
	            <th>Nombre</th>
	            <th>Apellidos</th>
	            <th>Email</th>
	            <th>Acción</th>
	        </tr>
	    </thead>
	    <tbody>";
		while ($resultado = $resultadoInfo ->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr>
	            <td>".$resultado['id_entrenador']."</td>
	            <td>".$resultado['nombre']."</td>
	            <td>".$resultado['apellidos']."</td>
	            <td>".$resultado['email']."</td>
	            <td><form name='borrar' action='borrarEntrenador.php' method='post' style='display:inline-block'><input class='btn btn-danger' type='submit' name='Borrar' value='borrar'/><input type='hidden' name='entrenador' value='".$resultado['id_entrenador']."''></form>&nbsp;<form name='modificar' action='modificarEntrenador.php' method='post' style='display:inline-block'><input class='btn btn-warning' type='submit' name='Modificar' value='modificar'/><input type='hidden' name='entrenador' value=".$resultado['id_entrenador']."></form>&nbsp;<form name='borrar' action='sesionentrenador.php' method='post' style='display:inline-block'><input type='hidden' name='entrenador' value=".$resultado['id_entrenador']."><input class='btn btn-info' type='submit' name='Sesión' value='Sesión'/</td>
	        </tr>";
		}
		echo "</tbody></table>";
	}else{
		header("Location: entrenadores.php?entrenadores=sin");
	}
}





?>