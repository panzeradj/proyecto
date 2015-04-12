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
	<link href="bootstrap/bootstrap.min.css"s rel="stylesheet">
    <link href="bootstrap/logo-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/stylesadmin.css">
	<script src="js/javaScript.js"></script>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	
	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="imagenes/e.png" id="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Clientes</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Individuales</a></li>
                          <li><a href="#">Multiples</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Calendario</a>
                    </li>
                    <li>
                        <a href="#">Tarifas y bonos</a>
                    </li>
                    <li>
                        <a href="#">Configuracion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
	            </div>
        </div>
    </div>
        <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>