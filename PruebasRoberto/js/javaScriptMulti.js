
var segundos = 10000000; 		// el tiempo en que se refresca
var divid = "calendario";	// el div que se actualiza
var objetoAjax;			// el objeto Ajax (XMLHttpRequest)
	 
function crearObjetoAjax(){
	try{
		objetoAjax=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
	}catch (e){
		try{
			objetoAjax=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}catch (e){
			try{
				objetoAjax=new ActiveXObject("Microsoft.XMLHTTP");
			}catch (e){
				alert("Tu explorador no soporta AJAX.");
				return false;
			}
		}
	}
}


function refresca(){
	// Timestamp para que IE no impida la recarga
	var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
	var url = "multi.php";

	// El código...
	objetoAjax.onreadystatechange=function(){
		// Si esta listo para recibir de nuevo la pagina, la refresca
		if(objetoAjax.readyState== 4 && objetoAjax.readyState != null){
			document.getElementById(divid).innerHTML=objetoAjax.responseText;
			setTimeout('refresca()',segundos*1000);
		}
	}
	objetoAjax.open("POST",url,true);
	objetoAjax.send(null);
//	alert("eee en ajax-");
}
function enviarCalen(dia, hora){
	// Datos para el envio por POST:
	//alert("melonazo");
	var misdatos="?hora="+hora+"&dia="+dia+"&calendario=1";
	location="individuales.php"+misdatos;
}
function enviar(dia, hora){
	// Datos para el envio por POST:
	//alert("Hola");
	var misdatos="hora="+hora+"&dia="+dia;	
	// Preparar el envio con Open
	objetoAjax.open("POST","multi.php",true);

	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");
	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}

function eliminar(dia, hora){
	// Datos para el envio por POST:
	//alert("Hola");
	var misdatos="hora="+hora+"&dia="+dia;
	// Preparar el envio con Open
	objetoAjax.open("POST","eliminar.php",true);

	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");

	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}
	 
// Comienzo: crea el objeto Ajax y empieza a refrescar
window.onload = function(){
	crearObjetoAjax();

	// Cada X segundos actualiza la pagina
	refresca();	
}