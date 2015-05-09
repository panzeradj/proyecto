<?php 

	 session_destroy();
	 $_SESSION['hora']='';
	 $_SESSION['dia']='';
	include("../php/funciones/function.php");
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
	
	cabecera();
?>
<script src="http://localhost/trainningmanager/js/javaScriptIndividuales.js"></script>
</head>
<body>
	<?php menu();?>
	<h1>Reserva individual</h1>
	<article id="zona">
		<button onClick=semanaMenos()>Semana menos</button>
		<button onClick=semanaMas()>Semana mas</button>
		
	<?php
		if(!empty($_GET['calendario']))
		{
			echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
				echo '
			      <select name="cliente[0]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[1].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
	     				 echo '
			      <select name="cliente[1]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[1].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
	     				 echo '
			      <select name="cliente[2]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[1].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
				echo "<input type=hidden name=dia value=$dia>";
				echo "<input type=hidden name=hora value=$hora>";
				echo "<input type=submit name=Aceptar value=Aceptar>";
			echo "</form>";
		}
		else
		{

				echo "<form name=a method=post action=confirmarHora.php>Nombre del cliente:";
					echo '
			      <select name="cliente[0]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[0].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
	     				 echo '
			      <select name="cliente[1]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[0].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
	     				 echo '
			      <select name="cliente[2]" ><option>--</option>';
			      $sql="select id_cliente, nombre from clientes order by 2";
		     	 $cho=ordensql($sql);
					if($cho!=false)
					{
						while ($regi = $cho->fetch_array()) {
							echo "<option value=".$regi[0].">".$regi[1]."</option>";
						}
					}
					echo '  </select></input>
	     				 <div id="hidden"></div>';
					echo "<input type=hidden name=dia value=".$dia.">";
					echo "<input type=hidden name=hora value=$hora>";
					echo "<input type=submit name=Aceptar value=Aceptar>
					<div id='calendario'></div>";
				echo "</form>";			
		}		
	?>
	</article>
	</section>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>