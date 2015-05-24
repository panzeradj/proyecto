<?php  
require_once("../php/funciones/function.php");
include ('../Mobile-Detect/Mobile_Detect.php');
include('basededatos.php');
include('config.php');
cabecera();
?>
<style type="text/css">
	#control{

	width: 50em;
	}
	body{
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
	td, th{
		text-align: center;
		vertical-align: middle !important;
	}
</style>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<script type="text/javascript">
	function anadir(){
        alertify.success("Se a añadido la reserva correctamente"); 
        return false;
    }
</script>
<script>
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
	  initStatus: 'Selecciona la fecha', isRTL: true,

	};

	 $.datepicker.setDefaults($.datepicker.regional['es']);


	    $( "#datepicker" ).datepicker({ minDate: "-1Y", maxDate: "  +1Y" });
	    	$(document).ready(function(){

			$('#datepicker').datepicker();

	  });
</script>
</head>
<?php menu(); 
if(isset($_GET["mensaje"])){
	if($_GET["mensaje"]=='bien'){
		echo "<script>anadir();</script>";
	}
}	
?>
<body>
	<div id="control">
		<form method=POST id="form" class="form-horizontal center-block"  action="reserva.php">
			<div class="center-block">
			<div style="text-center"><h1>Añadir reservas externas&nbsp;&nbsp;<img class="img-rounded" src='../iconos/poli.png'></h1></div>
			<div  ><label>Cliente</label><?php
  				$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
  				$orden="SELECT id_cliente,nombre,apellido FROM clientes";
  				$resultadoInfo = consulta($orden,$conexion);
  				echo"<select required class='form-control' name=cliente>";
				while($registro = $resultadoInfo->fetch_array()){
					echo  '<option value=' . $registro[0]. '>' . $registro[1] .' ' . $registro[2] .'</option>';	
				}
				echo "</select>";

  			?>
  			</div>
  			<br/>
  			<div  ><label>Local</label><?php
  				$conexion = conexion(ipBaseDeDatos,usuarioBaseDeDatos,contrasenaBaseDeDatos,BaseDeDatos);
  				$orden="SELECT * FROM locales";
  				$resultadoInfo = consulta($orden,$conexion);
  				echo"<select required class='form-control' name=local>";
				while($registro = $resultadoInfo->fetch_array()){
					echo  '<option value=' . $registro[0]. '>' . $registro[1] .'</option>';	
				}
				echo "</select>";

  			?>
  			</div>
  			<br/>
  			<div><label>Dia</label>		<div  id="calendarioJQuery">
			<form class="form_login" id="cal"> <input required class='form-control' type="text" id="datepicker" name="dia" /></form>
			</div></div><br/>
  			<div><label>Hora</label><input required class='form-control' type="text" name="hora" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" id="24h"/></div><br/>
		  	<div><label>Horas</label><input required class='form-control' type="text" name="horas" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}"/></div><br/>
		  	<br/><br/><div><label>Precio total</label><div class="input-group"><span class="input-group-addon">Precio:</span><input required class='form-control' type="number" step="0.01" name="precio"/><span class="input-group-addon">€</span></div></div><br/>
  			<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Enviar" value="Añadir">
  			<br/><br/><br/>
  			</div>
	</div >
	
	</div>
</body>	
</html>