<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
?>

			 <style>
		 	.contenedor{
		 		max-width: 50em;
		 	}
		 </style>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
	</head>
	<body>
		<?php
		$id_cliente=$_POST['cliente'];

		echo "<script> var id=".$id_cliente."</script>";
		menu();
		?>

		<div class="contenedor center-block">
			<label>Tarifa:</label>
				<select id='select' class="form-control" name="tarifa" size="1">
					<option  value="">Elige una tarifa</option>
					<?php
					$lista=ordensql("select id_tarifa, nombre from tarifas where activa=1 order by 1;");
					while ($resultado=$lista->fetch_array()){?>
	                    <option value='<?php echo $resultado[0];?>'><?php echo $resultado[1];?></option>
					<?php }?>
				</select>
    		<input type="radio"  id="dom"  name="dom" value="no" checked>Sin Domiciliar
    		<input type="radio" id="dom" name="dom" value="si">Domiciliado
    		<div><button onClick=aceptar() class="btn btn-primary btn-lng center-block"> Aceptar</button></div>
    	</div>

    <script>
    function aceptar(){
    	var valorTexto=$('#select option:selected').text();
    	var valor=$('#select ').val();
    	var valor2=$('#dom:checked').val()
    	//alert(valor2);
    	alertify.confirm("<p>Estás seguro que quiere cambiar a la tarifa "+valorTexto + " " +valor2+" dominciliado<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
					if (e) {

						var misdatos="?tarifa="+valor+"&cliente="+id+"&dom="+valor2;
						location="http://localhost/trainningmanager/clientes/cambioTarifa2.php"+misdatos;
					} else { alertify.error("Has cancelado la acción");
					}
				});

    };

   </script>
