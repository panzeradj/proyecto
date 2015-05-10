<?php
	session_start();
	$_SESSION['hora']='';
	$_SESSION['dia']='';
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	$Semana=$_GET['semana'];
	if(!empty($Semana))
	{
		$_SESSION['semanas']=$Semana;
	}
	else {
		$_SESSION['semanas']=0;
	}
	cabecera();
?>
<style type="text/css">
	#control{
	
	}
	body, form, #zona, #cal{
		
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
<div style="text-align: center; width: 100%;"><h1>Calendario</h1></div>
	<?php
		$detect = new Mobile_Detect();
		if ($detect->isMobile()) {
			// Detecta si es un móvil
			horariodia();
			exit;
		}
	?>
	<script src="http://acwellness.es/trainningmanager/js/javaScript.js"></script>
	<article id="zona">
		<button id="menos" onClick=semanaMenos()>Semana menos</button>
		<form class="form_login" id="cal"> <input type="text" id="datepicker" /></form>
		<button id="mas" onClick=semanaMas()>Semana mas</button>
		<div id='calendario'></div>
	</article>
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
	         	location="http://acwellness.es/trainningmanager/reservas/calcularSemanas.php?semana="+dateText;
	       
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