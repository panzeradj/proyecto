function enviar(dia, hora){
	// Datos para el envio por POST:
	alert("HOL");
	var misdatos="hora="+hora+"?dia="+dia;

	// Preparar el envio con Open
	objetoAjax.open("POST","reservas.php",true);

	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");

	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}