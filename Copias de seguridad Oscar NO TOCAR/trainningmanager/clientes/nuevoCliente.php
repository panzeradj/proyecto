<?php  include("../php/funciones/function.php");
	cabecera();
?>
	</head>
<?php menu(); ?>
	<body>
	<h1>Nuevo Cliente</h1>
		<div>
			<form method=POST id="form" class="form-horizontal center-block container "  action="validarCliente.php">
				<div class="contenedor center-block">
				<div  ><label>Nombre y Apellidos: </label><input required  class="form-control  "  type=text name=nombre placeholder='Adrian Carnicero'/></div>
				<div  ><label>DNI:</label><input required  class="form-control  "  type=text name=dni placeholder="666666666"/></div>
				<div  ><label>Télefono movil:</label><input required  class="form-control  "  type=text name=movil placeholder="666666666"/></div>
				<div  ><label>Otro telefono:</label><input required  class="form-control  " type=text name=otro placeholder="9999999"/></div>
				<div  ><label>Email:</label><input required  class="form-control  " type=mail name=mail placeholder="ejemplo@hotmail.es"/></div>
				<div  > </div> <label>Genero:</label><select required  class="form-control  " name=genero> <option value=''>--</option><option value='Mujer'>Mujer</option><option value='Hombre'>Hombre</option></select></div>
				<div  ><label>Fecha de nacimiento:</label><input required  class="form-control  " type=date name=date></div>
				<!-- Tipo:(TARIFA) -->
				<div  ><label>Dirección:</label><input required  class="form-control  " type=text name=direccion placeholder="SORIA"></div>
				<div  ><label>Población:</label><input required  class="form-control  " type=text name=poblacion placeholder="Soria"></div>
				<div  ><label>Provincia:</label><input  required class="form-control  " type=text name=provincia placeholder="Soria"></div>
				<div  ><label>Codigo postal:</label><input required  class="form-control  " type=text name=codPostal placeholder="42003"></div>
				<div><label>Objetivos:</label> <textarea class="form-control" name=objetivos></textarea></div>
				<div><label>Comentarios:</label> <textarea class="form-control" name=comentarios></textarea></div>
				<div><label>Patologias:</label> <textarea class="form-control" name=patologias></textarea></div>
				<div><label>Medicación:</label> <textarea class="form-control" name=medicacion></textarea></div>
				<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="Enviar" value="Confirmar">
      </div>
			</div >
			</form>

		</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
		

</html>