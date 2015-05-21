<?php
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
<style type="text/css">

#nomCli{
	margin-top: 1px;
	vertical-align: middle;
}
#conHora{
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
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
        function semanaMasN(){
            alertify.log("Semana mas");
            return false;
        }
        function semanaMenosN(){
            alertify.log("Semana menos");
            return false;
        }
</script>
<script src="http://acwellness.es/trainningmanager/js/javaScriptIndividuales.js"></script>
</head>
<body>
	<?php menu();?>


	<div id="control">
	<h1>Reserva individual</h1>
	<article id="zona">
		<div id="botones">
			<button id='baja' class="iz" onClick="semanaMenos();semanaMenosN()">Semana menos</button>
			<button id='baja' onClick="semanaMas();semanaMasN()">Semana mas</button>
		</div>

	<?php
		if(!empty($_GET['calendario']))
		{
			echo "<form name=a id=conHora method=post action=confirmarHora.php>";
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
			echo ' <div class="col-lg-4"><label>Cliente 3:</label> <input id ="cliente[2]" list="browsers" name="clientes[2]" class="form-control input-sm" >
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
				echo "<input type=submit id='baja' name=Aceptar value=Aceptar>";
			echo "</form>";
		}
		else
		{
			echo "<form name=a id=conHora method=post action=confirmarHora.php>";
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
			echo ' <div class="col-lg-4"><label>Cliente 3:</label> <input id ="cliente[2]" list="browsers" name="clientes[2]" class="form-control input-sm" >
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

					echo "<input type=hidden name=dia value=".$dia.">";
					echo "<input type=hidden name=hora value=$hora>&nbsp;";
					echo "<input type=submit id='baja' name=Aceptar value=Aceptar>
					<div id='calendario'></div> ";
				echo "</form>";
		}
	?>

</div>
</body>
</html>
<script type="text/javscript">
$(document).ready(function(){
$("@combobox").combobox()
});
</script>
