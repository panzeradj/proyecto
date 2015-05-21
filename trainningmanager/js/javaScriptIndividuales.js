
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
function canceladaCalen(hora, dia)
{
	
	var misdatos="?hora="+hora+"&dia="+dia;	
	if(confirm("Quieres cancelar"))
	{
		if(confirm("Quieres que se le aplique recargo"))
		{
			alert("cancelada con recargo");
			misdatos=misdatos+"&can=2";
			location="http://acwellness.es/trainningmanager/reservas/cancelarI.php"+misdatos;
		}
		else		
		{
			alert("cancelada sin recargo");
			misdatos=misdatos+"&can=1";
			location="http://acwellness.es/trainningmanager/reservas/cancelarI.php"+misdatos;
		}
	}
	else		
	{
		alert("No cancelada");
	}
}


function refresca(){
	// Timestamp para que IE no impida la recarga
	var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
	var url = "http://acwellness.es/trainningmanager/reservas/calen.php";
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
}
function enviarCalen(dia, hora){
	// Datos para el envio por POST:
	var misdatos="?hora="+hora+"&dia="+dia+"&calendario=1";
	location="http://acwellness.es/trainningmanager/reservas/individuales.php"+misdatos;
}
function enviar(dia, hora){
	// Datos para el envio por POST:
	var misdatos="hora="+hora+"&dia="+dia;	
	// Preparar el envio con Open
	objetoAjax.open("POST","http://acwellness.es/trainningmanager/reservas/calen.php",true);
	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");
	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}
function semanaMenos()
{
	// Datos para el envio por POST:
	var misdatos="semanaMenos=1";
	// Preparar el envio con Open
	objetoAjax.open("POST","http://acwellness.es/trainningmanager/reservas/calen.php",true);
	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");

	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}
function semanaMas()
{
	// Datos para el envio por POST:
	var misdatos="semanaMas=1";
	// Preparar el envio con Open
	objetoAjax.open("POST","http://acwellness.es/trainningmanager/reservas/calen.php",true);

	// Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Content-length", misdatos.length);
	objetoAjax.setRequestHeader("Connection", "close");

	// Pasar datos como parámetro
	objetoAjax.send(misdatos); 
}

function eliminar(dia, hora){
	// Datos para el envio por POST:
	var misdatos="hora="+hora+"&dia="+dia;
	// Preparar el envio con Open
	objetoAjax.open("POST","http://acwellness.es/trainningmanager/reservas/eliminar.php",true);
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
	refresca();	
}