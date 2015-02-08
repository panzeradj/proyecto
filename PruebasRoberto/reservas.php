
<html>
<head>
	<script src="js/javaScript.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="estilo.css">
</head>

<body>
	<body>
	<?php

	$dia=$_GET['dia'];
	//echo $dia;
	$hora=$_GET['hora'];
	//echo $dia."<br>";
	//echo $hora;

	echo "<button onClick=individuales('$dia',$hora)>individuales</button>";
	echo "<button onClick=multiples('$dia',$hora)>multiples</button>";
?>

</body>
</html>