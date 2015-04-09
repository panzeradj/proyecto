<?php
	session_start();
	$_SESSION['hora']='';
	$_SESSION['dia']='';
	include("php/funciones/function.php");
	$Semana=$_GET['semana'];
	if(!empty($Semana))
	{
		$_SESSION['semanas']=$Semana;
	}
	else {
		$_SESSION['semanas']=0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="imagenes/logoTM.png" />
	<title>Calendario</title>
	<link rel="stylesheet" href="estilo.css"/>
	<script src="js/javaScript.js"></script>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	
	
</head>
<body>
	<header>
		<h1>Training manager</h1>
		<nav id="superior">
			<ul id="nav">
			<li id="two"><a href="#" class="one"><span>Clientes</span></a></li>
			<li id="two"><a href="#" class="one"><span>Reservas</span></a>
			<ul id="sub2">
	   			
	  		</ul>
	  		</li>
			<li id="two"><a href="calendario.php" class="one"><span>Calendario</span></a></li>
			<li id="two"><a href="#" class="one"><span>Tarifas y bonos</span></a></li>
			</ul>
		</nav>
	</header>
	<section id="cuerpo">
	<nav id="general">			
		<ul id='menu'>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/client.png" id="icon"/><span id="contenidoMenu"> Clientes</span></a></li>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/save.png" id="icon"/><span id="contenidoMenu"> Reservas</span></a>
				<ul id="submenu">
					<li class="liMenu"><a href='individuales.php' class="submenu"><img src="imagenes/individual2.png" id="icon"/><span id="contenidoMenu"> Individua</span></a>
					<li class="liMenu"><a href='#' class="submenu"><img src="imagenes/multiple2.png" id="icon" /><span id="contenidoMenu"> Multiples</span></a>
				</ul>
			</li>	
			<li class="liMenu"><a href='calendario.php' class="menu"><img src="imagenes/calendar.png" id="icon" /><span id="contenidoMenu"> Calendario</span></a></li>
			<li class="liMenu"><a href='#' class="menu"><img src="imagenes/tarifas.png" id="icon" /><span id="contenidoMenu"> Tarifas y bonos</span></a></li>
		</ul>
		<img src="../logo/logoTM.png" class="logo">
	</nav>
	<article id="zona">
		<button onClick=semanaMenos()>Semana menos</button>
		<form class="form_login"> <input type="text" id="datepicker" /></form>
		<button onClick=semanaMas()>Semana mas</button>
		<div id='calendario'></div></article>
	</section>
	<script type="text/javascript">

	 $.datepicker.regional['es'] = 
	  {
	  closeText: 'Cerrar', 
	  prevText: 'Previo', 
	  nextText: 'Próximo',
	   
	  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	  'Jul','Ago','Sep','Oct','Nov','Dic'],
	  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
	  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
	  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
	  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	  dateFormat: 'dd/mm/yy', firstDay: 1, 
	  initStatus: 'Selecciona la fecha', isRTL: false,
	  onSelect: function(dateText) { 
	          $('#fecha').val(dateText);
	          alert("enviar a un nuevo lugar");
	          alert( dateText);
	         	location="calcularSemanas.php?semana="+dateText;
	       
	      },
	  
	};

	 $.datepicker.setDefaults($.datepicker.regional['es']);
	  

	    $( "#datepicker" ).datepicker({ minDate: "-1Y", maxDate: "  +1Y" });
	    	$(document).ready(function(){
	
			$('#datepicker').datepicker();

	  });
	</script>
</body>
</html>