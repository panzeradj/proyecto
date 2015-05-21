<?php
session_start();
	include('php/funciones/function.php');
	$us=$_POST['us'];
	$pass=$_POST['pass'];
	$envio=login($pass,$us);
	echo $envio;
?>