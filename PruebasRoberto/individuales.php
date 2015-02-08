<html>
<head>
<script src="js/javaScript.js"></script>
</head>

<body>
	<?php

		$dia=$_GET['dia'];
		$hora=$_GET['hora'];
		if($hora!=null )
		{
			echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
				echo "<br><input type=text name=cliente[1]>";
				echo "<br><input type=text name=cliente[2]>";
				echo "<br><input type=text name=cliente[3]>";
				echo "<br><input type=hidden name=dia value=$dia>";
				echo "<input type=hidden name=hora value=$hora>";
				echo "<input type=submit name=Aceptar value=Aceptar>";
			echo "</form>";
		}
		else
		{
				echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
					echo "<br><input type=text name=cliente[1]>";
					echo "<br><input type=text name=cliente[2]>";
					echo "<br><input type=text name=cliente[3]>";
					echo "<br><input type=hidden name=dia value=$dia>";
					echo "<input type=hidden name=hora value=$hora>";
					echo "<input type=submit name=Aceptar value=Aceptar>";
				echo "</form>";
			echo "elegir dia y hora";
		}
		
	
?>
</body>
</html>