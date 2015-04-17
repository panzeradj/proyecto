//Primero el tiempo en el que se va refrescado la página, en este caso será 1 segundo
var tiempo = 1;
var zona = "precioconiva";
var objetoAjax1;

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
	return objetoAjax;
}

function refrescaprecio(){
	// Timestamp para que pueda recargarse periódicamente
	var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
	//url es la página en donde está el forulario que se irá actualizando segundo a segundo
	var url = "precio.php";
	
	//Este es el código que hará que se recargue el contenido
	objetoAjax1.onreadystatechange=function(){
		if(objetoAjax1.readyState== 4 && objetoAjax1.readyState != null){
			precio=document.getElementById("valor").value;
			iva=objetoAjax1.responseText;
			valor=precio*(1+iva/100);
			document.getElementById(zona).innerHTML="Valor con IVA: "+valor+" €";
			setTimeout('refrescaprecio()',tiempo*1000);
		}
	}

	//a nuestra "conexión" se le pedirán ciertos datos
	objetoAjax1.open("GET",url,true);
	objetoAjax1.send(null);
}


window.onload = function(){
	objetoAjax1=crearObjetoAjax();
	//Refresca el precio con IVA
	refrescaprecio();	
}