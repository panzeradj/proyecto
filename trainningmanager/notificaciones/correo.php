<?php
require_once("../php/funciones/function.php");
require_once('PHPMailer_5.2.4/class.phpmailer.php');
require_once('PHPMailer_5.2.4/class.smtp.php');
require_once("config.php");
require_once("basededatos.php");


/*if(empty($_POST['email'])){
	return 0;
}
if($_POST['email']==""){
	return 0;
}*/
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$notificacion = "TRUNCATE log_notificaciones";
	consulta($notificacion,$conexion);
	$fecha_actual=date("d/m/Y");
	$notificacion = "INSERT INTO log_notificaciones (id_log,fecha) VALUES (1,now());";
	consulta($notificacion,$conexion);

	$orden1 = "SELECT mensaje FROM notificaciones WHERE nombre='birthday'";
	$resultado1 = consulta($orden1,$conexion);
	$registro1 = $resultado1->fetch_array(MYSQLI_ASSOC);

	$destinatario = $_POST['email'];
	$asunto = "Felicidades";
	$mensaje = $registro1['mensaje'];

	$orden2 = "SELECT * FROM correo";
	$resultado2 = consulta($orden2,$conexion);
	$registro2 = $resultado2->fetch_array(MYSQLI_ASSOC);

	$remitente = $registro2['correo'];
	$pass = $registro2['pass'];
	$servidor = $registro2['servidor'];
	$puerto = intval($registro2['puerto']);

	/*$para      = $destinatario;
	$titulo    = $remitente;
	$mensaje   = $mensaje;
	$cabeceras = 'From: '.$remitente.'' . "\r\n" .
	    'Reply-To: adriansoria91@gmail.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($para, $titulo, $mensaje, $cabeceras);
	header("Location:envio.php?mensaje=correcto");*/
	
	// Crear una nueva  instancia de PHPMailer habilitando el tratamiento de excepciones
	$mail = new PHPMailer(); 
	$mail->IsSMTP();
	$mail->Mailer="smtp";
	$mail->Host = $servidor;
	$Mail->SMTPDebug = 2; //no olvides quitar el debug
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = 25;
	$mail->Username   = $remitente;
	$mail->Password = $pass;
	$mail->From = $remitente;
	$mail->FromName = $remitente; 
	$mail->Timeout=60;
	$mail->AddAddress($destinatario);
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;
	$mail->CharSet = 'UTF-8';
	$mail->AltBody =  $mensaje;
	$mail->IsSendmail() ;
	$exito = $mail->Send();
	$intentos=1; 
	if($exito){
	     $mail->ClearAddresses();
	     return 1;
	}
?>