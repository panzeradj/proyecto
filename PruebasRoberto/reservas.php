<html>
<head>
<script src="js/javaScript.js"></script>
</head>

<body>
	<?php
	$dia=$_GET['dia'];
	$hora=$_GET['hora'];


	echo "<button onClick=individuales('$dia',$hora)>individuales</button>";
	echo "<button onClick=multiples('$dia',$hora)>multiples</button>";
?>
</body>
</html>