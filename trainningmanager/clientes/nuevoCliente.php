<?php  include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
?>
<style type="text/css">
	#control{
		width: 50em;
	}
	body, h1{
		width: 100%;
		height: auto;
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
	h1{
		color:#000000;
	}
	img{
		height: auto;
	}
</style>
	</head>

<?php menu(); ?>
	<body>
	<div id="control">
		<div>
			<form method=POST id="form" class="form-horizontal center-block container "  action="validarCliente.php">
				<div class="contenedor center-block">
				<div style=text-center><h1>Nuevo Cliente&nbsp;&nbsp;<img src='../iconos/masCliente.png' class="img-rounded"></h1></div>
				<div  > <div class="col-lg-6"><label>Nombre</label><input required  class="form-control  " title="Se necesita un nombre " type=text name=nombre /></div>
						<div class="col-lg-6"><label>Apellidos</label><input required  class="form-control  " title="Apellido " type=text name=apellido /></div>
				</div>
				<div  ><label>DNI:</label><input   class="form-control  "   id='dni' type=text name=dni /></div>
				<div  ><label>Télefono movil:</label><input     class="form-control  "  type=text name=movil /></div>
				<div  ><label>Otro telefono:</label><input   class="form-control  " type=text name=otro ></div>
				<div  ><label>Email:</label><input   class="form-control  " type='email' name=mail  /></div>
				<div  > </div> <label>Genero:</label><select   class="form-control  " name=genero> <option value=''>--</option><option value='Mujer'>Mujer</option><option value='Hombre'>Hombre</option></select></div>
				<div  ><label>Fecha de nacimiento:</label><input   class="form-control  " type=date name=date></div>
				<div><label>Tarifa:</label><select required class="form-control" name="tarifa" size="1">
        				<option  value="">Elige una tarifa</option>
        				<?php
        				$lista=ordensql("select id_tarifa, nombre from tarifas where activa=1 order by 1;");
        				while ($resultado=$lista->fetch_array()){?>
                            <option value='<?php echo $resultado[0];?>'><?php echo $resultado[1];?></option>
        				<?php }?>
    				</select>
    			</div>

    			<input type="radio" name="dom" value="no" checked>Sin Domiciliar
    			<input type="radio" name="dom" value="si">Domiciliado
				<div  ><label>Dirección:</label><input   class="form-control  "  type=text name=direccion ></div>
				<div  ><label>Población:</label><input   class="form-control  "   type=text name=poblacion ></div>
				<div  ><label>Provincia:</label><input   class="form-control  "   type=text name=provincia ></div>
				<div  ><label>Codigo postal:</label><input  pattern='[0-9]{5}'  class="form-control  " type=text name=codPostal></div>
				<div><label>Objetivos:</label> <textarea class="form-control" name=objetivos></textarea></div>
				<div><label>Comentarios:</label> <textarea class="form-control" name=comentarios></textarea></div>
				<div><label>Patologias:</label> <textarea class="form-control" name=patologias></textarea></div>
				<div><label>Medicación:</label> <textarea class="form-control" name=medicacion></textarea></div>
				<br/>
				<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" id='boton' name="Enviar" value="Confirmar">
				<br/>
      </div>
			</div >
			</form>

		</div>
	</div>
	<script>
 		$('#boton').attr('disabled','disabled');
		$('#dni').keyup(function(){
			var valor=$('#dni').val();
			if(valor.length==9){
				 numero = valor.substr(0,valor.length-1);
			  let = valor.substr(valor.length-1,1);
				let=let.toUpperCase();
			  numero = numero % 23;
			  letra='TRWAGMYFPDXBNJZSQVHLCKET';
			  letra=letra.substring(numero,numero+1);
			  if (letra!=let){
					alert("ERROR en el dni");
					$('#boton').attr('disabled','disabled');
				}else{
					$('#boton').removeAttr('disabled');
				}

			}else {
				$('#boton').attr('disabled','disabled');
			}
		});
	//	alert("hola mundo");
	</script>
	</body>


</html>
