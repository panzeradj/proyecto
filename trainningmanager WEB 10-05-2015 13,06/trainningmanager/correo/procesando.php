<?php
require_once("../php/funciones/function.php");
require_once("funcionesCorreo.php");
require_once('PHPMailer_5.2.4/class.phpmailer.php');
require_once("basededatos.php");
require_once("config.php");

$destinatario = comprobar_email($_POST['destino']);
echo $destinatario;
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
	
	 
	// Crear una nueva  instancia de PHPMailer habilitando el tratamiento de excepciones
	$mail = new PHPMailer(); 
	$mail->Mailer="smtp";
	$mail->Helo = "www.acwellness.es/"; //Muy importante para que llegue a hotmail y otros
	// Configuramos el protocolo SMTP con autenticación
	$mail->SMTPAuth = true;
	 
	// Configuración del servidor SMTP
	$mail->Host = $servidor;
	$mail->Port = 25;
	$mail->Username   = $remitente;
	$mail->Password = $pass;
	 
	// Configuración cabeceras del mensaje
	$mail->From = $remitente;
	$mail->FromName = $remitente;

	$mail->Timeout=60;
	$mail->IsHTML(true);

	$mail->AddAddress($destinatario,"Destinatario");
	 
	$mail->Subject = $asunto;
	 
	// Creamos en una variable el cuerpo, contenido HMTL, del correo
	$body  = "<h1>ACwellness</h1>";
	$body .= $mensaje;
	 
	$mail->Body = $body;
	 
	// Enviar el correo
	$exito = $mail->Send();
	if($exito){
	     $mail->ClearAddresses();
	     header("Location:envio.php?mensaje=correcto");
	} 
?>