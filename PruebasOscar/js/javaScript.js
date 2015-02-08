	function enviar(dia, hora){
	// Datos para el envio por POST:
	//alert("melonazo");
	var misdatos="?hora="+hora+"&dia="+dia;
	location="reservas.php"+misdatos;
}
function individuales(dia, hora)
{
	//alert("individuales");
	//alert(dia);
	var misdatos="?hora="+hora+"&dia="+dia;
	location="individuales.php"+misdatos;
	
}
function multiples(dia, hora)
{

	alert("multiples");
	var misdatos="?hora="+hora+"&dia="+dia;
	location="multiples.php"+misdatos;
	
}