<?php
	session_start();
	$_SESSION['hora']='';
	$_SESSION['dia']='';
	include("../php/funciones/function.php");
	$Semana=$_GET['semana'];
	if(!empty($Semana))
	{
		$_SESSION['semanas']=$Semana;
	}
	else {
		$_SESSION['semanas']=0;
	}
	cabecera();
?><script src="http://localhost/trainningmanager/js/javaScript.js"></script>
</head>
<body>
<?php menu();?>
<h1>Calendario</h1>
	<article id="zona">
		<button id="menos" onClick=semanaMenos()>Semana menos</button>
		<form class="form_login" id="cal"> <input type="text" id="datepicker" /></form>
		<button id="mas" onClick=semanaMas()>Semana mas</button>
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
	         	location="http://localhost/trainningmanager/reservas/calcularSemanas.php?semana="+dateText;
	       
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