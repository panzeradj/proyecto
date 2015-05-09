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
				return false;
			}
		}
	}
	return objetoAjax;
}

function refrescaprecio(){
	var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
	var url = "precio.php";
	
	//Este es el código que hará que se recargue el contenido
	objetoAjax1.onreadystatechange=function(){
		if(objetoAjax1.readyState== 4 && objetoAjax1.readyState != null){
			precio=document.getElementById("valor").value;
			iva=objetoAjax1.responseText;
			valor=precio*(1+iva/100);
			valorSalida=+(Math.round(valor + "e+2")  + "e-2");
			document.getElementById(zona).innerHTML="Valor con IVA: "+valorSalida+" €";
			setTimeout('refrescaprecio()',tiempo*1000);
		}
	}

	objetoAjax1.open("GET",url,true);
	objetoAjax1.send(null);
}


window.onload = function(){
	objetoAjax1=crearObjetoAjax();
	//Refresca el precio con IVA
	refrescaprecio();	
}