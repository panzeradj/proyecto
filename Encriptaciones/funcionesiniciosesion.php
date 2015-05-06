<?php

require_once("funciones/funciones.php");

$conexion=conexion('127.0.0.1','root','root','trainningmanager');

$contrasena = "12345Adrian";

echo hash('md5',$contrasena);



?>