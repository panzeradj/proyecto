<?php
require_once("../php/funciones/function.php");
require_once("funcionesCorreo.php");
require_once('PHPMailer_5.2.4/class.phpmailer.php');
require_once('PHPMailer_5.2.4/class.smtp.php');
require_once("basededatos.php");
require_once("config.php");

$destinatario = comprobar_email($_POST['destino']);

if($destinatario==0){
	$mensaje = "Mal";
	header("Location:envio.php?mensaje=mal");
}
	$destinatario = $_POST['destino'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
	$orden = "SELECT * FROM correo";
	$resultado = consulta($orden,$conexion);
	$registro = $resultado->fetch_array(MYSQLI_ASSOC);
	$remitente = $registro['correo'];
	$pass = $registro['pass'];
	$servidor = $registro['servidor'];
	$puerto = intval($registro['puerto']);
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
	$mail->isSMTP();
	$mail->Host = $servidor;
	$Mail->SMTPDebug = 2; //no olvides quitar el debug
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = $puerto;
	$mail->Username   = $remitente;
	$mail->Password = $pass;
	$mail->From = $remitente;
	$mail->FromName = $remitente; 
	$mail->Timeout=60;
	$mail->AddAddress($destinatario);
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;
	$mail->AltBody =  $mensaje;
	$exito = $mail->Send();
	$intentos=1; 
	if($exito){
	     $mail->ClearAddresses();
	     header("Location:envio.php?mensaje=correcto");
	}else{
		echo "Mailer Error: " . $mail->ErrorInfo;
	}
?>