<?php
/*Eliminar WARNING*/ error_reporting(0);
	include("../php/funciones/function.php");

	cabecera();
	$_SESSION['hora']='';
	$_SESSION['dia']='';
	include ('../Mobile-Detect/Mobile_Detect.php');
	if(!empty($_GET['dia']) &&  !empty($_GET['hora']))
	{
		$dia=$_GET['dia'];
		$hora=$_GET['hora'];

		$_SESSION['hora']=''.$_SESSION['hora']."/".$hora;
		$_SESSION['dia']=''.$_SESSION['dia']."/".$dia;
	}
	else
	{

		$dia="";
		$hora="";
	}

		$_SESSION['semanas']=0;

?>
<script src="http://localhost/trainningmanager/js/javaScriptMulti.js"></script>
<style type="text/css">
	body, form, #zona{

	width: 100%;

	display: inline-flex;
		display: -webkit-inline-flex;
		display: -moz-inline-flex;
		display: -ms-inline-flex;

	justify-content:center;
    -webkit-justify-content:center;
    -moz-justify-content:center;
    -ms-justify-content:center;

    flex-wrap: wrap;
	-webkit-flex-wrap: wrap;
	-moz-flex-wrap: wrap;
	-ms-flex-wrap: wrap;
}
</style>
</head>
<body>

	<?php menu();?>
	<form method="post" action=cancelarM.php ><input id='baja' type=submit value="Cancelación multiple"></form>
	<h1>Reserva multiple</h1>
	<article id="zona">
	<?php


				echo "<form name=a method=post action=confirmarHoraM.php>";
								echo ' <div class="col-lg-4"><label>Cliente 1:</label> <input id ="cliente[0]" list="browsers" name="clientes[0]" class="form-control input-sm" >
				<datalist class="comboboxx" id="browsers">
				<SELECT id="combo" class="combobox" name="uid">
				<option>--</option>';
				$sql="select id_cliente, nombre, apellido from clientes order by 2,1";
				$cho=ordensql($sql);
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$variable="".$regi[1].",".$regi[2];
						echo "<option value='".$variable."'>".$variable."</option>";
					}
				}echo '
				</SELECT></div> ';
				echo ' <div class="col-lg-4"><label>Cliente 2:</label> <input id ="cliente[1]" list="browsers" name="clientes[1]" class="form-control input-sm" >
				<datalist class="comboboxx" id="browsers">
				<SELECT id="combo" class="combobox" name="uid">
				<option>--</option>';
				$sql="select id_cliente, nombre, apellido from clientes order by 3,2";
				$cho=ordensql($sql);
				if($cho!=false)
				{
					while ($regi = $cho->fetch_array()) {
						$variable="".$regi[1].",".$regi[2];
						echo "<option value='".$variable."'>".$variable."</option>";
					}
				}echo '
				</SELECT></div> ';
				echo ' <div class="col-lg-4"><label>Cliente 3:</label> <input id ="cliente[2]" list="browsers" name="clientes[2]" class="form-control input-sm" >
					<datalist class="comboboxx" id="browsers">
					<SELECT id="combo" class="combobox" name="uid">
					<option>--</option>';
					$sql="select id_cliente, nombre, apellido from clientes order by 3,2";
					$cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							$variable="".$regi[1].",".$regi[2];
							echo "<option value='".$variable."'>".$variable."</option>";
						}
					}echo '
					</SELECT></div> ';


					echo "<input type=hidden name=dia value=".$dia.">";
					echo "<input type=hidden name=hora value=$hora>&nbsp;";
					echo "<input type=submit id='baja' name=Aceptar value=Aceptar>
					<div id='calendario'></div>";
				echo "</form>";

	?>
	</article>
	</section>
</body>
</html>
