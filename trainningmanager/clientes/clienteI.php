<?php
	include("../php/funciones/function.php");
	cabecera();
?>

			 <style>
		 	.contenedor{
		 		max-width: 50em;
		 	}
		 </style>
		
	    <script src="js/javaScript.js"></script>
	</head>
	<body>
		<?php 
		$id_cliente=$_GET['cliente'];
		menu();
		
		$sql="select nombre, dni, genero,fecha_nacimiento, telefono, telefono2,email,fecha_alta, fecha_baja,objetivos,comentarios,medicacion  , activo
			  from clientes where id_cliente=".$id_cliente;
			
			$cho=ordensql($sql);
		
			$datos=array();
			if($cho!=false)
			{
				while ($regi = $cho->fetch_array()) {
					$datos['nombre']=$regi[0];
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
					
				}
			}

		?>
		
		<!-- Realizo busqueda por id del cliente y meto todo en un array -->
		<div class="contenedor center-block">
			<h1 >Ficha individual</h1>
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
			<div class='col-lg-6'>
				<label>fecha de nacimiento</label>
				<div><?php 
					echo $datos['fecha_nacimiento'];
				?></div>
			</div>
			<div class='col-lg-6'>
				<!-- Desplegable para cambiar -->
				<label>tarifa</label>
				<div><select></select></div>
			</div>
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
			<div class='col-lg-6'>
				<label>Horas totales</label>
				<!-- Select con las horas totales -->
			</div>
			<div class='col-lg-6'>
				<label>Estado</label>
				<?php 
					if($datos['activo']==1)
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
	<?php  if($datos['estado']==1){$datos['estado']=0; $boton='Dar de baja';}else{$datos['estado']=1; $boton='Dar de alta';} echo "<form action=clienteBaja.php method=post><input type=hidden name=cliente value=".$id_cliente."><input type=hidden name=estado value=".$datos['estado']."><input type=submit value='".$boton."'></form>";?>
</body>

</html>