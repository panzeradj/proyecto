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


function multiples(dia, hora)
{
	//alert("multiples");
	var misdatos="?hora="+hora+"&dia="+dia;
	location="http://acwellness.es/trainningmanager/reservas/multiples.php"+misdatos;
}
function enviar(dia, hora)
{
	//alert("multiples");
	var misdatos="?hora="+hora+"&dia="+dia+"&calendario=1";
	location="http://acwellness.es/trainningmanager/reservas/individuales.php"+misdatos;
}
function diaMenos()
{
	//alert("DIA menos");
	// Datos para el envio por POST:
	//alert("Hola");
	var misdatos="dia=-1";
	// Preparar el envio con Open
	location="http://acwellness.es/trainningmanager/calcularDia.php?"+misdatos;
}
function diaMas()
{
	//alert("DIA mas");
	// Datos para el envio por POST:
	var misdatos="dia=1";
	// Preparar el envio con Open
	location="http://acwellness.es/trainningmanager/calcularDia.php?"+misdatos;
}
