<?php
session_start();
	include('php/funciones/function.php');
	$us=$_POST['us'];
	$pass=$_POST['pass'];
	$_SESSION["login"]="yes";
	$_SESSION["us"] = $us;
	$envio=login($pass,$us);
	echo $envio;
	//echo "1";
?>