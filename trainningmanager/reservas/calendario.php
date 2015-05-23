<?php
	session_start();
	include("../php/funciones/function.php");
	cabecera();
	$_SESSION['hora']='';
	$_SESSION['dia']='';

	include ('../Mobile-Detect/Mobile_Detect.php');
	if(isset($_GET['semana']))
	$Semana=$_GET['semana'];
	if(!empty($Semana))
	{
		$_SESSION['semanas']=$Semana;
	}
	else {
		$_SESSION['semanas']=0;
	}

?>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
    function alerta(){
        alertify.alert("(Notificación temporal)<br/>Leyenda:<span style=color:#ff34b3;font-size:160%>Uno</span>&nbsp;&nbsp;<span style=color:#ff3030;font-size:160%>Dos</span>&nbsp;&nbsp;<span style=color:#ffae1a;font-size:160%>Tres</span>", function () {
                //aqui introducimos lo que haremos tras cerrar la alerta.
            });
    }
</script>
<script type="text/javascript">
        function semanaMasN(){
            alertify.log("Semana mas");
            return false;
        }
        function semanaMenosN(){
            alertify.log("Semana menos");
            return false;
        }
       	function reservaOk(){
            alertify.success("Reserva efectuada");
            return false;
        }
        function reservaError(){
            alertify.error("Ha ocurrido un error al efectuar la reserva");
            return false;
        }
		function reservaCancelarM(){
				alertify.success("Reserva múltiple cancelada");
				return false;
		}
    </script>
</head>
<body>
<?php menu();
if(!(empty($_GET["mensaje"]))){
    if($_GET["mensaje"]=="bien"){
        echo "<script type=text/javascript>reservaOk();</script>";
    }
    if($_GET["mensaje"]=="mal"){
         echo "<script type=text/javascript>reservaError();</script>";
    }
		if($_GET["mensaje"]=="cancelarM"){
			echo "<script type=text/javascript>reservaCancelarM();</script>";
		}
}
?>
<div style="text-align: center; width: 100%;"><h1>Calendario&nbsp;&nbsp;<img class="img-rounded" src='../iconos/calendario.png'></h1></div>
<p id="leyenda">Leyenda:&nbsp;<span style=color:#ff34b3;>Uno</span>&nbsp;&nbsp;<span style=color:#ff3030;>Dos</span>&nbsp;&nbsp;<span style=color:#ffae1a;>Tres</span></p>

	<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
	<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />


	<script src="http://localhost/trainningmanager/js/javaScript.js"></script>
	<article id="zona">
		<div id="botones">
			<button id="menos" class="baja" onClick="semanaMenos();semanaMenosN();">Semana menos</button>
			<button id="mas" class="baja" onClick="semanaMas();semanaMasN();">Semana mas</button>
		</div>
		<div id="calendarioJQuery">
			<form class="form_login" id="cal"> <input type="text" id="datepicker" /></form>
		</div>
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
