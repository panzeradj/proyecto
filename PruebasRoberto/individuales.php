<html>
<head>
<script src="js/javaScript.js"></script>
</head>

<body>
	<?php

	$dia=$_GET['dia'];
	$hora=$_GET['hora'];
	echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
		echo "<input type=text name=cliente>";
		echo "<input type=hidden name=dia value=$dia>";
		echo "<input type=hidden name=hora value=$hora>";
		echo "<input type=submit name=Aceptar value=Aceptar>";
	echo "</form>";
	//	echo "<button onClick=individuales($dia,$hora,$cliente)>Confirmar</button>";
	
?>
</body>
</html>