<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
?>

			 <style>
		 	.contenedor{
				margin-left: 28%;
		 		max-width: 50em;
		 	}
		 </style>

	    <script src="js/javaScript.js"></script>
	    <script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
	<script type="text/javascript">
	    function okcambio(){
	        alertify.success("Se han cambiado los datos");
	        return false;
	    }
	    function errcambio(){
	        alertify.error("Ha ocurrido un error inesperado");
	        return false;
	    }
    </script>
	</head>
	<body>
		<?php
		$id_cliente=$_GET['cliente'];
		menu();
		if(isset($_GET["mensaje"])){
			  if($_GET["mensaje"]=="okcambio"){
			   echo "<script type=text/javascript>okcambio();</script>";
			  }
			  if($_GET["mensaje"]=="errcambio"){
			   echo "<script type=text/javascript>errcambio();</script>";
			  }
		}
		
		$sql="select nombre, dni, genero,fecha_nacimiento, telefono, telefono2,email,fecha_alta, fecha_baja,objetivos,comentarios,medicacion  , activo , id_cliente ,apellido , patologias ,domiciliado,direccion, poblacion,provincia,c_p
			  from clientes  where id_cliente=".$id_cliente;
			//echo $sql;
			$cho=ordensql($sql);

			$datos=array();
			$datos['medicacion']="";
			$datos['objetivos']="";
			$datos['patologias']="";
			$datos['comentarios']="";
			if($cho!=false)
			{
				while ($regi = $cho->fetch_array()) {
					$datos['nombre']=$regi[0]." ".$regi[14];
					$datos['dni']=$regi[1];
					$datos['genero']=$regi[2];
					$datos['fecha_nacimiento']=$regi[3];
					$datos['telefono']=$regi[4];
					$datos['telefono2']=$regi[5];
					$datos['email']=$regi[6];
					$datos['fecha_alta']=$regi[7];
					$datos['fecha_baja']=$regi[8];
					$datos['objetivos']=$regi[9];
					$datos['comentarios']=$regi[10];
					$datos['mediccion']=$regi[11];
					$datos['estado']=$regi[12];
					$datos['id_cliente']=$regi[13];
					$datos['patologia']="".$regi[15];
					$datos['domiciliado']="".$regi[16];
					$datos['direccion']="".$regi[17];
					$datos['poblacion']="".$regi[18];
					$datos['provincia']="".$regi[19];
					$datos['cp']="".$regi[20];

				}
			}

		?>

		<!-- Realizo busqueda por id del cliente y meto todo en un array -->
		<div class="contenedor center-block">
			<h1 >Ficha individual</h1>
			<div class="col-lg-8"  >
			<div class='col-lg-12'>
				<div class='col-lg-6'>
					<label>Nombre</label>
					<div><?php
						echo $datos['nombre'];
					?></div>
				</div>
				<div class='col-lg-6'>
					<label>Telefono</label>
					<div><?php
						echo $datos['telefono'];
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-6'>
					<label>DNI</label>
					<div><?php
						echo $datos['dni'];
					?></div>
				</div>
				<div class='col-lg-6'>
					<label>Otro telefono</label>
					<div><?php
						echo $datos['telefono2'];
				?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-6'>
				<label>Genero</label>
				<div><?php
					echo $datos['genero'];
					?></div>
				</div>
				<div class='col-lg-6'>
					<label>email</label>
					<div><?php
						echo $datos['email'];
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>fecha de nacimiento</label>
						<div><?php
							echo calcularEdad($datos['fecha_nacimiento']);
						?></div>
				</div></div>
			<div class='col-lg-12'>

				<div class='col-lg-6'>
					<!-- Desplegable para cambiar -->
					<label>tarifa</label><div>
					<?php
					$sql="select tarifas.nombre from tarifas, contratos where tarifas.id_tarifa=contratos.tarifa and contratos.cliente=".$datos['id_cliente'];
					$nombre_tarifa="";
					//echo $sql;
						$cho=ordensql($sql);
						if($cho!=false)
						{
							while ($regi = $cho->fetch_array()) {
								$nombre_tarifa=$regi[0];

							}
						}
						echo $nombre_tarifa;
					 ?></div>
				</div>
				<div class='col-lg-6'>
					<label>Domiciliado</label>
						<div><?php
						if(strcmp($datos['domiciliado'],"1")==0){
							echo "DOMICILIADO";
						}else{
							echo " NO DOMICILIADO";
						}

						?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-6'>
					<label>Fecha alta</label>
					<div><?php
						echo $datos['fecha_alta'];
					?></div>
				</div>
				<div class='col-lg-6'>
					<label>Fecha de baja</label>
					<div><?php
						echo $datos['fecha_baja'];
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>Direccion:</label>
					<div><?php
						echo $datos['direccion'];
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-4'>
					<label>Población:</label>
					<div><?php
						echo $datos['poblacion'];
					?></div>
				</div>
				<div class='col-lg-4'>
					<label>Provincia:</label>
					<div><?php
						echo $datos['provincia'];
					?></div>
				</div>
				<div class='col-lg-4'>
					<label>C.Postal:</label>
					<div><?php
						echo $datos['cp'];
					?></div>
				</div>

			</div>
 
			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>Patologías:</label>
					<div><?php
				 
						if($datos['patologia']=="")
						{
							echo "--";
						}
						else
						{
							echo $datos['patologia'];
						}
					?></div>
				</div>
			</div>

			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>Objetivos</label>
					<div><?php 
						if($datos['objetivos']=="")
						{
							echo "--";
						}
						else
						{
							echo $datos['objetivos'];
						}
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>Comentarios</label>
					<div><?php
				 
						if($datos['comentarios']=="")
						{
							echo "--";
						}
						else
						{
							echo $datos['comentarios'];
						}
					?></div>
				</div>
			</div>


			<div class='col-lg-12'>
				<div class='col-lg-12'>
					<label>Medicación</label>
					<div><?php
					 
						if($datos['medicacion']=="")
						{
							echo "--";
						}
						else
						{
							echo $datos['medicacion'];
						}
					?></div>
				</div>
			</div>
			<div class='col-lg-12'>
				<div class='col-lg-6'>
					<label>Horas totales</label>
					<?php
						$horas=calcularHoras($id_cliente);
						echo $horas;
					?>
				</div>
				<div class='col-lg-6'>
						<label>Estado</label>
					<?php
						if($datos['estado']==1)
						{
							echo "Activo";
						}
						else
						{
							echo "Inactivo";
						}
					?>
				</div>
			</div>
		</div>
			<div class="col-lg-4" >

	<?php  if($datos['estado']==1){$datos['estado']=0; $boton='Dar de baja';}else{$datos['estado']=1; $boton='Dar de alta';} echo "<form action=clienteBaja.php method=post><input type=hidden name=cliente value=".$id_cliente."><input type=hidden name=estado value=".$datos['estado']."><input type=submit id='clibo' class='btn btn-danger' value='".$boton."'>&nbsp;&nbsp;</form>";?>
	<p><p>
	<form name=asd method=post action='cambioTarifa.php'><?php echo "<input type=hidden name=cliente value=$id_cliente >";?><input type=submit id='clibo' class="btn btn-info" name="Cambio de tarifa" value="Cambio de tarifa">&nbsp;&nbsp;</form>
<p><p>
	<form name=asd method=post action='cambioDatos.php'><?php echo "<input type=hidden name=cliente value=$id_cliente >";?><input type=submit id='clibo' class="btn btn-warning" name="Cambio de otros datos" value="Cambio de otros datos">&nbsp;&nbsp;</form>
</div></div>
<br/>
<br/>
<br/>
<br/>
</body>

</html>
